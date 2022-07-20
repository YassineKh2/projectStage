@extends('bo.layouts.table')
@section('table')
	<table class="table table-separate table-head-custom table-checkable" id="user_2">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
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
            title: "Etes vous certain?",
            text: "Cette action est irréversible!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ff0000",
            confirmButtonText: "Oui!",
            cancelButtonText: "Non",
            showClass: {
              popup: 'animate__animated animate__wobble'
            },
        }).then(function(result) {
            if (result.value) {
                var token = $("meta[name='csrf-token']").attr("content");
                var url = '{{route('users.destroy', ':id')}}';
                url = url.replace(':id', delItem);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": delItem,
                        "_token": token,
                    },
                    success: function (){
                        $('#user_2').DataTable().row($(this).parents('tr')).remove().draw();
                        Swal.fire(
                            "Supprimer!",
                            "La ligne a été supprimer.",
                            "success"
                        )
                    },
                    error: function(){
                        Swal.fire(
                            "Erreur!",
                            "Une erreur s'est produite",
                            "error"
                        )
                    }
                });
            }
        });
    }
    $(document).ready(function(){
        $('#user_2').DataTable({

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
            ajax: '{{ route('userdatatable/getdata') }}',

            buttons: [
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'}
            ],
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action', searchable: false , orderable: false},
            ]
        });
    });
</script>
@endsection
