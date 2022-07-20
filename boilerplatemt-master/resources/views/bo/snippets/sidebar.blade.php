<!--begin::Aside-->
<div class="aside aside-left d-flex aside-fixed" id="kt_aside">
	<!--begin::Primary-->
	<div class="aside-primary d-flex flex-column align-items-center flex-row-auto">
		<!--begin::Brand-->
		<div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-5 py-lg-12">
			<!--begin::Logo-->
			<a href="{{route('home')}}">
				<img alt="Logo" src="{{asset('assets/img/kpmg.svg')}}" class="max-h-30px" />
			</a>
			<!--end::Logo-->
		</div>
		<!--end::Brand-->
        <!--Including FontAwesome Icons-->
        <script src="https://kit.fontawesome.com/56a94e38db.js" crossorigin="anonymous"></script>
		<!--begin::Nav Wrapper-->
		<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid py-5 scroll scroll-pull">
			<!--begin::Nav-->
			<ul class="nav flex-column" role="tablist">
				<!--begin::Item-->
				<li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Menu">

					<a href="#" id="kt_aside_toggle2" class="nav-link btn btn-icon btn-clean btn-lg @if(request()->route()->getName() != 'profil') active @endif" data-toggle="tab" data-target="kt_aside_tab_1" role="tab">
						<span class="svg-icon svg-icon-xl">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
									<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</a>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Mon profile">
					<a href="{{route('profil')}}" class="nav-link btn btn-icon btn-clean btn-lg @if(request()->route()->getName() == 'profil') active @endif" >
						<span class="fas fa-user-edit icon-lg"></span>
					</a>
				</li>
				<!--end::Item-->
			</ul>
			<!--end::Nav-->
		</div>
		<!--end::Nav Wrapper-->
		<!--begin::Footer-->
		<div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-4 py-lg-10">
			<!--begin::Aside Toggle-->
			<span class="aside-toggle btn btn-icon btn-primary btn-hover-primary shadow-sm " id="kt_aside_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Menu">
				<i class="ki ki-bold-arrow-back icon-sm"></i>
			</span>
			<!--end::Aside Toggle-->



			<!--begin::Logout-->
			<a href="{{ route('logout') }}" class="btn btn-icon btn-clean btn-lg w-40px h-40px" id="logout" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Déconnexion" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
				<span class="symbol symbol-30 symbol-lg-40">
					<span class="svg-icon svg-icon-xl">
						<i class="flaticon-logout"></i>
					</span>
				</span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
			<!--end::Logout-->
		</div>
		<!--end::Footer-->
	</div>
	<!--end::Primary-->
	<!--begin::Secondary-->
	<div class="aside-secondary d-flex flex-row-fluid">
		<!--begin::Workspace-->
		<div class="aside-workspace scroll scroll-push my-2">
			<!--begin::Tab Content-->
			<div class="tab-content">
				<!--begin::Tab Pane-->
				<div class="tab-pane  show active " id="kt_aside_tab_1">
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid px-3 px-lg-10 py-5" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item @if(request()->route()->getName() == 'home') menu-item-active @endif" aria-haspopup="true">
									<a href="{{route('home')}}" class="menu-link">
										<i class="menu-icon fas fa-home"></i>
										<span class="menu-text">{{ __('menu.dashboard') }}</span>
									</a>
								</li>
								@if(Auth::user()->can('user.list') || Auth::user()->can('app.list') || Auth::user()->can('role.list') )
									<li class="menu-section">
										<h4 class="menu-text">{{ __('menu.administration') }}</h4>
										<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
									</li>
									@can('user.list')
									<li class="menu-item menu-item-submenu @if(Request::is('users*')) menu-item-active @endif" aria-haspopup="true" data-menu-toggle="hover">
										<a href="{{route('users.index')}}" class="menu-link">
											<i class="menu-icon fas fa-user"></i>
											<span class="menu-text">{{ __('menu.user') }}</span>
										</a>
									</li>
									@endcan
									@can('app.list')
									<li class="menu-item menu-item-submenu @if(Request::is('apps*')) menu-item-active @endif" aria-haspopup="true" data-menu-toggle="hover">
										<a href="{{route('apps.index')}}" class="menu-link">
											<i class="menu-icon fa fa-cog"></i>
											<span class="menu-text">{{ __('menu.app') }}</span>
										</a>
									</li>
									@endcan
									@can('role.list')
									<li class="menu-item menu-item-submenu @if(Request::is('role*')) menu-item-active @endif" aria-haspopup="true" data-menu-toggle="hover">
										<a href="{{route('roles.index')}}" class="menu-link">
											<i class="menu-icon fas fa-users"></i>
											<span class="menu-text">{{ __('menu.role') }}</span>
										</a>
									</li>
									@endcan
								@endif


                                @if(Auth::user()->can('resume.list'))
                                    <li class="menu-section">
                                        <h4 class="menu-text">{{ __('menuEng.resume') }}</h4>
                                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                    </li>
                                    @can('resume.list')
                                        <li class="menu-item menu-item-submenu @if(Request::is('resume*')) menu-item-active @endif" aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="{{route('resume.index')}}" class="menu-link">
                                                <i class="menu-icon fas fa-file"></i>
                                                <span class="menu-text">{{ __('menuEng.ResumeManger') }}</span>
                                            </a>
                                        </li>
                                    @endcan
                                @endif
							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Tab Pane-->
			</div>
			<!--end::Tab Content-->
		</div>
		<!--end::Workspace-->
	</div>
	<!--end::Secondary-->
</div>
<!--end::Aside-->
