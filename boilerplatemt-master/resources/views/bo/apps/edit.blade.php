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
            	<form class="form-horizontal" action="{{route('apps.update', $app->id)}}" method="POST">
	                <input name="_method" value="PUT" type="hidden">
	                {{ csrf_field() }}

	                <div class="form-group row">
	                    <label for="name" class="col-2 control-label">Name*</label>
	                    <div class="col-10">
	                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$app->name}}" {{ $errors->has('name') ? ' is-invalid' : '' }}>
	                        @if ($errors->has('name'))
	                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
	                        @endif
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group row justify-content-center">
	                    <a href="{{ route('apps.index')}}" class="btn btn-default">Cancel</a>
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
