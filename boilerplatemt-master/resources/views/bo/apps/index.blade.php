@extends('bo.layouts.table')
@section('table')
	<table class="table table-separate table-head-custom table-checkable" id="apps">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
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
                var url = '{{route('apps.destroy', ':id')}}';
                url = url.replace(':id', delItem);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": delItem,
                        "_token": token,
                    },
                    success: function (){
                        $('#apps').DataTable().row($(this).parents('tr')).remove().draw();
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
        $('#apps').DataTable({

			// DOM Layout settings
			dom: '<"html5buttons"B>lTfgitp',
            processing: true,

        	language: {
                url: '{{ asset('assets/plugins/custom/datatables/french.json') }}',
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> '
            },
            pageLength: 10,
            responsive: true,
            serverSide: true,
            "bLengthChange": false,
            ajax: '{{ route('appdatatable/getdata') }}',

            buttons: [
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'}
            ],
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action', searchable: false , orderable: false},
            ]
        });
    });
</script>
@endsection