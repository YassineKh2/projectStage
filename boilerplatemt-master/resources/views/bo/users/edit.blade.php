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
            	<form class="form-horizontal" action="{{route('users.update', $user->id)}}" method="POST">
	                <input name="_method" value="PUT" type="hidden">
	                {{ csrf_field() }}

	                <div class="form-group row">
	                    <label for="name" class="col-2 control-label">Name*</label>
	                    <div class="col-10">
	                        <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$user->name}}" {{ $errors->has('name') ? ' is-invalid' : '' }}>
	                        @if ($errors->has('name'))
	                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
	                        @endif
	                    </div>
	                </div>


	                <div class="form-group row">
	                    <label for="email" class="col-2 control-label">Email*</label>
	                    <div class="col-10">
	                        <input type="email" class="form-control" id="email" placeholder="email" name="email" value="{{$user->email}}" {{ $errors->has('email') ? ' is-invalid' : '' }}>
	                        @if ($errors->has('email'))
	                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
	                        @endif
	                    </div>
	                </div>


	                <div class="form-group row">
	                    <label for="password" class="col-2 control-label">Password*</label>
	                    <div class="col-10">
	                        <input id="password" type="password" class="form-control" name="password" placeholder="password" {{ $errors->has('password') ? ' is-invalid' : '' }}>
	                        @if ($errors->has('password'))
	                            <div class="invalid-feedback">{{ $errors->first('password') }}/<div>
	                        @endif
	                    </div>
	                </div>



	                <div class="form-group row {{ $errors->has('password-confirm') ? ' has-error' : '' }}">
	                    <label for="password-confirm" class="col-2 control-label">Retype password*</label>
	                    <div class="col-10">
	                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
	                        @if ($errors->has('password-confirm'))
	                            <span class="help-block text-danger">
	                                <strong>{{ $errors->first('password-confirm') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="password-confirm" class="col-2 control-label">Role</label>
	                    <div class="col-10">
	                        <select class="form-control select2" style="width: 100%;" name="role">
	                            @foreach ($roles as $role)
	                                <option value="{{$role->id}}" @if($user->hasRole($role->name))selected="true" @endif>{{$role->name}}</option>
	                            @endforeach

	                        </select>
	                    </div>
	                </div>
	                <div class="hr-line-dashed"></div>
	                <div class="form-group row justify-content-center">
	                    <a href="{{ route('users.index')}}" class="btn btn-default">Cancel</a>
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
<script>
	$(document).ready(function() {
		$('.select2').select2({
            placeholder: 'Select a role'
        });
	});
</script>
@endsection