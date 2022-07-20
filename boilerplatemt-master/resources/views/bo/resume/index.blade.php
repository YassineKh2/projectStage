@extends('bo.layouts.table')
@section('table')
    <table class="table table-separate table-head-custom table-checkable" id="resume_2">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Activity Area</th>
            <th>Actions</th>
        </tr>
        </thead>

    </table>
@endsection

@section('js')
    <script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script>
        function deleteFunction(item){
            var delItem = item.name.split("-");
            delItem = delItem[delItem.length - 1];

            Swal.fire({
                title: "Are you sure?",
                text: "This action is irreversible!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff0000",
                confirmButtonText: "Yes!",
                cancelButtonText: "No",
                showClass: {
                    popup: 'animate__animated animate__wobble'
                },
            }).then(function(result) {
                if (result.value) {
                    var token = $("meta[name='csrf-token']").attr("content");
                    var url = '{{route('resume.destroy', ':id')}}';
                    url = url.replace(':id', delItem);
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "id": delItem,
                            "_token": token,
                        },
                        success: function (){
                            $('#resume_2').DataTable().row($(this).parents('tr')).remove().draw();
                            Swal.fire(
                                "Delete!",
                                "The line has been deleted.",
                                "success"
                            )
                        },
                        error: function(){
                            Swal.fire(
                                "Error!",
                                "An error has occurred",
                                "error"
                            )
                        }
                    });
                }
            });
        }
        $(document).ready(function(){
            $('#resume_2').DataTable({

                // DOM Layout settings
                dom: 'r <"html5buttons"B>lTfgitp',
                searchDelay: 3500,
                processing: true,

                language: {
                    url: '{{ asset('assets/plugins/custom/datatables/french.json') }}'
                },
                pageLength: 10,
                responsive: true,
                serverSide: true,
                "bLengthChange": false,
                ajax: '{{ route('resumedatatable/getdata') }}',

                buttons: [
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'}
                ],
                columns: [
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'activity_area', name: 'activity_area'},
                    { data: 'action', name: 'action', searchable: false , orderable: false},
                ]
            });
        });
    </script>
@endsection
