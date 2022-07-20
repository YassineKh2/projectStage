@extends('bo.layouts.master')
@section('bodycontent')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">

        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{$title}}</h3>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('roles.update', $role->id)}}" method="POST" id="Roleform">
                	<input name="_method" value="PUT" type="hidden">
	                {{ csrf_field() }}
	                <div class="box-body">
	                    <div class="form-group row">
	                        <label for="name" class="col-2 control-label">Name*</label>
	                        <div class="col-10">
	                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="name" name="name" value="{{$role->name}}" required>
	                            @if ($errors->has('name'))
	                                 <div class="invalid-feedback">{{ $errors->first('name') }}</div>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-5">
	                            <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
	                                @foreach ($permissions as $perm)
	                                    <option value="{{$perm->name}}">{{$perm->name}}</option>
	                                @endforeach
	                            </select>
	                        </div>

	                        <div class="col-2">
	                            <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="fas fa-angle-double-right icon-3x"></i></button>
	                            <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="fas fa-angle-right icon-3x"></i></button>
	                            <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="fas fa-angle-left icon-3x"></i></button>
	                            <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="fas fa-angle-double-left icon-3x"></i></button>
	                        </div>

	                        <div class="col-5">
	                            <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
		                            @foreach ($ownedperms as $ownedperm)
		                                <option value="{{$ownedperm->name}}">{{$ownedperm->name}}</option>
		                            @endforeach
		                        </select>
	                        </div>
	                    </div>
	                <!-- /.box-footer -->
	                <div class="hr-line-dashed"></div>
	                <div class="form-group row justify-content-center">
	                    <a href="{{ route('roles.index')}}" class="btn btn-default">Cancel</a>
	                    <button type="submit" class="ml-4 btn btn-info pull-right">Save</button>
	                </div>
	                <!-- /.box-footer -->
	            </form>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('js')

<script src="{{ asset('assets/js/multiselect.js') }}"></script>
<script>
	$(document).ready(function() {
		$('#multiselect').multiselect({
            search: {
                left: '<input type="text" name="qleft" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="qright" class="form-control" placeholder="Search..." />',
            }
        });
	});
</script>
@endsection