@extends('bo.layouts.master')
@section('bodycontent')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
    	<!--begin::Card-->
		<div class="card card-custom">
			<!--begin::Card header-->
			<div class="card-header card-header-tabs-line nav-tabs-line-3x">
				<!--begin::Toolbar-->
				<div class="card-toolbar">
					<ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
						<!--begin::Item-->
						<li class="nav-item mr-3">
							<a class="nav-link {{ $errors->has('password') ? '' : 'active' }}" data-toggle="tab" href="#kt_user_edit_tab_1">
								<span class="nav-icon">
									<span class="svg-icon">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
												<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
								<span class="nav-text font-size-lg">Profile</span>
							</a>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="nav-item mr-3">
							<a class="nav-link {{ $errors->has('password') ? 'active' : '' }}" data-toggle="tab" href="#kt_user_edit_tab_3">
								<span class="nav-icon">
									<span class="svg-icon">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
												<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
												<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
								<span class="nav-text font-size-lg">Changer votre mot de passe</span>
							</a>
						</li>
						<!--end::Item-->
					</ul>
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<div class="tab-content">
					<!--begin::Tab-->
					<div class="tab-pane {{ $errors->has('password') ? '' : 'active' }} {{ $errors->has('password') ? '' : 'show' }} px-7" id="kt_user_edit_tab_1" role="tabpanel">
						<form class="form" method="POST" action="{{route('updateprofil')}}">
							{{ csrf_field() }}
							<!--begin::Row-->
							<div class="row">
								<div class="col-xl-2"></div>
								<div class="col-xl-7 my-2">
									<!--begin::Row-->
									<div class="row">
										<label class="col-3"></label>
										<div class="col-9">
											<h6 class="text-dark font-weight-bold mb-10">Customer Info:</h6>
										</div>
									</div>
									<!--end::Row-->
									<!--begin::Group-->
									<div class="form-group row">
										<label class="col-form-label col-3 text-lg-right text-left">Avatar</label>
										<div class="col-9">
											<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url({{$avatar}})">
												<div class="image-input-wrapper"></div>
											</div>
										</div>
									</div>
									<!--end::Group-->
									<!--begin::Group-->
									<div class="form-group row">
										<label class="col-form-label col-3 text-lg-right text-left">Nom</label>
										<div class="col-9">
											<input class="form-control form-control-lg form-control-solid {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" value="{{$user->name}}" name="name"/>
											@if ($errors->has('name'))
				                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
				                            @endif
										</div>
									</div>
									<!--end::Group-->

									<!--begin::Group-->
									<div class="form-group row">
										<label class="col-form-label col-3 text-lg-right text-left">Email</label>
										<div class="col-9">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$user->email}}" placeholder="Email" name="email" readonly/>
												@if ($errors->has('email'))
					                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
					                            @endif
											</div>
										</div>
									</div>
									<!--end::Group-->

								</div>
							</div>
							<!--end::Row-->
							<!--begin::Footer-->
							<div class="card-footer pb-0">
								<div class="row">
									<div class="col-xl-2"></div>
									<div class="col-xl-7">
										<div class="row">
											<div class="col-3"></div>
											<div class="col-9">
												<button type="submit" class="btn btn-light-primary font-weight-bold">Enregistrer</button>
												<a href="{{route('home')}}" class="btn btn-clean font-weight-bold">Annuler</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end::Footer-->
						</form>
					</div>
					<!--end::Tab-->

					<!--begin::Tab-->
					<div class="tab-pane px-7 {{ $errors->has('password') ? 'active' : '' }} {{ $errors->has('password') ? 'show' : '' }}" id="kt_user_edit_tab_3" role="tabpanel">
						<form class="form" method="POST" action="{{route('updatepassword')}}">
							{{ csrf_field() }}
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Row-->
								<div class="row">
									<div class="col-xl-2"></div>
									<div class="col-xl-7">
										<!--begin::Row-->
										<div class="row mb-5">
											<label class="col-3"></label>
											<div class="col-9">
												<div class="alert alert-custom alert-light-danger fade show py-4" role="alert">
													<div class="alert-icon">
														<i class="flaticon-warning"></i>
													</div>
													<div class="alert-text font-weight-bold">Veuillez changer votre mot de passe une fois par an</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">
																<i class="la la-close"></i>
															</span>
														</button>
													</div>
												</div>
											</div>
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="row">
											<label class="col-3"></label>
											<div class="col-9">
												<h6 class="text-dark font-weight-bold mb-10">Changer votre mot de passe:</h6>
											</div>
										</div>
										<!--end::Row-->
										<!--begin::Group-->
										<div class="form-group row">
											<label class="col-form-label col-3 text-lg-right text-left">New Password</label>
											<div class="col-9">
												<input class="form-control form-control-lg form-control-solid {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password"/>
												@if ($errors->has('password'))
					                                 <div class="invalid-feedback">{{ $errors->first('password') }}</div>
					                            @endif
											</div>
										</div>
										<!--end::Group-->
										<!--begin::Group-->
										<div class="form-group row">
											<label class="col-form-label col-3 text-lg-right text-left">Verify Password</label>
											<div class="col-9">
												<input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" />
											</div>
										</div>
										<!--end::Group-->
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Body-->
							<!--begin::Footer-->
							<div class="card-footer pb-0">
								<div class="row">
									<div class="col-xl-2"></div>
									<div class="col-xl-7">
										<div class="row">
											<div class="col-3"></div>
											<div class="col-9">
												<button type="submit" class="btn btn-light-primary font-weight-bold">Enregistrer</button>
												<a href="{{route('home')}}" class="btn btn-clean font-weight-bold">Annuler</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end::Footer-->
						</form>
					</div>
					<!--end::Tab-->
				</div>
			</div>
			<!--begin::Card body-->
		</div>
		<!--end::Card-->

    </div>
</div>

@endsection


@section('js')
	<script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
	<script>
		@if(isset($password))
		$(document).ready(function() {
			Swal.fire(
  				'mot de passe à jour!',
  				'Votre mot de passe a été modifier!',
				'success'
			);
		});
		@endif

		@if(isset($profil))
		$(document).ready(function() {
			Swal.fire(
  				'profil à jour!',
  				'Votre profil a été modifier!',
				'success'
			);
		});
		@endif
	</script>
@endsection