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
                <form class="form-horizontal" action="{{route('users.store')}}" method="POST" id="Userform">
	                {{ csrf_field() }}
	                <div class="box-body">
	                    <div class="form-group row">
	                        <label for="name" class="col-2 control-label">Name*</label>
	                        <div class="col-10">
	                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="name" name="name" value="{{old('name')}}" >
	                            @if ($errors->has('name'))
	                                 <div class="invalid-feedback">{{ $errors->first('name') }}</div>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="email" class="col-2 control-label">Email*</label>
	                        <div class="col-10">
	                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="email" name="email" value="{{old('email')}}" >
	                            @if ($errors->has('email'))
	                                 <div class="invalid-feedback">{{ $errors->first('email') }}</div>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="password" class="col-2 control-label">Password*</label>
	                        <div class="col-10">
	                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="password" >
	                            @if ($errors->has('password'))
	                                 <div class="invalid-feedback">{{ $errors->first('password') }}</div>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="password-confirm" class="col-2 control-label">Retype password*</label>
	                        <div class="col-10">
	                            <input id="password-confirm" type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Retype password" >
	                            @if ($errors->has('password_confirmation'))
	                                <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
	                            @endif
	                        </div>
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="password-confirm" class="col-2 control-label">Role*</label>
	                    <div class="col-10">
	                        <select class="form-control select2 {{ $errors->has('role') ? ' is-invalid' : '' }}" style="width: 100%;" name="role">
	                        		<option></option>
	                            @foreach ($roles as $role)
	                                <option value="{{$role->id}}">{{$role->name}}</option>
	                            @endforeach
	                        </select>
	                        @if ($errors->has('role'))
                                <div class="invalid-feedback">{{ $errors->first('role') }}</div>
                            @endif
	                    </div>
	                </div>


	                <!-- /.box-footer -->
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
            placeholder: 'Select a role',
            allowClear: true
        });

		var formulaire = document.getElementById('Userform');
		var FormControls = FormValidation.formValidation(
			formulaire,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Le champ Nom est obligatoire.'
							}
						}
					},

					email: {
						validators: {
							notEmpty: {
								message: 'Le champ email est obligatoire.'
							},
							emailAddress: {
								message: 'Veuillez saisir un email valide'
							}
						}
					},

					password: {
						validators: {
							notEmpty: {
								message: 'Le champ mot de passe est obligatoire.'
							}
						}
					},
					password_confirmation: {
	                    validators: {
	                        identical: {
	                            compare: function() {
	                                return form.querySelector('[name="password"]').value;
	                            },
	                            message: 'Le champ mot de passe est obligatoire.'
	                        }
	                    }
	                },
					role: {
						validators: {
							notEmpty: {
								message: 'Le champ role est obligatoire.'
							}
						}
					},
				},

				plugins: { //Learn more: https://formvalidation.io/guide/plugins
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap(),
					// Validate fields when clicking the Submit button
					submitButton: new FormValidation.plugins.SubmitButton(),
            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
				}
			}
		);


		//FormControls.init();

		// Revalidate the confirmation password when changing the password
	    // formulaire.querySelector('[name="password"]').addEventListener('input', function() {
	    //     FormControls.revalidateField('confirmPassword');
	    // });
	});
</script>
@endsection
