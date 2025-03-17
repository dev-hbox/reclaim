<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Fit Fab | Edit Exercises</title>
		@include('global.header-links')
		<!--end::Global Stylesheets Bundle-->
	</head>
    <!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				@include('partials.sidebar')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('partials.header')
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Exercises</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
						</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
					    <div class="post d-flex flex-column-fluid" id="kt_post">
							<div id="kt_content_container" class="container-xxl">
									<div class="card">
                                    <!--begin::Card body-->
									<div class="card-body py-4">
										@if(session()->has('message'))
											<div class="alert alert-success">
												{{ session()->get('message') }}
											</div>
										@elseif(session()->has('error'))
											<div class="alert alert-danger">
												{{ session()->get('error') }}
											</div>
										@endif
										<!--begin::Form-->
										<form id="kt_modal_add_user_form" class="form" action="/admin/exercise-update/{{$exercise->id}}" method="POST" enctype="multipart/form-data">
											@csrf
											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="d-block fw-bold fs-6 mb-5">Thumbnail</label>
													<!--end::Label-->
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{$exercise->thumbnail}}')">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-125px h-125px" style="background-image: url({{$exercise->thumbnail}});"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change thumbnail">
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" name="thumbnail" accept=".png, .jpg, .jpeg"/>
															<input type="hidden" name="thumbnail_remove" />
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel thumbnail">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove thumbnail">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Remove-->
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
													<!--end::Hint-->
												</div>
												<!--end::Input group-->

												<!--begin::Title-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Title</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="title" value="{{$exercise->title}}" required/>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Title -->

                                                <!--begin::Description-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fw-bold fs-6 mb-2">Description</label>
                                                    <!--end::Label-->
                                                    <textarea name="description" rows="6" class="form-control form-control-solid mb-3 mb-lg-0" >{{ old('description', $exercise->description) }}</textarea>
                                                </div>
                                                <!--end::Description-->

												<!--begin::Reps-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="required fw-bold fs-6 mb-2">Reps</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" name="reps" class="form-control form-control-solid mb-3 mb-lg-0"     placeholder="reps" value="{{$exercise->reps}}" required/>
													<!--end::Input-->
												</div>
												<!--end::Reps-->

												<!--begin::Sets-->
											<div class="fv-row mb-7">
												<!--begin::Label-->
												<label class="required fw-bold fs-6 mb-2">Sets</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input type="text" name="sets" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="sets" value="{{$exercise->sets}}" required/>
												<!--end::Input-->
											</div>
											<!--end::Sets-->

                                            <!--begin::Note-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">Notes</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="note" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="note" value="{{$exercise->note}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Note-->

                                            <!--begin::Duration-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">Duration</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="duration" class="form-control form-control-solid mb-3 mb-lg-0"     placeholder="duration" value="{{$exercise->duration}}" required/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Duration-->

                                                <!--begin::Media-->
                                                <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-bold fs-6 mb-2">Media</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="file" name="media"  id="media" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="upload image" accept="image/png,image/jpeg" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Media-->

											<!--begin::Actions-->
											<div class="text-center pt-15">
												<button type="submit" class="btn btn-primary">
													<span class="indicator-label">Submit</span>
												</button>
											</div>
											<!--end::Actions-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Card body-->
                                </div>
                            </div>
                        </div>
                    </div>
					<!--begin::Footer-->
					@include('partials.footer')
					<!--end::Footer-->
                </div>
            </div>
        </div>
        @include('global.footer-links')
    </body>
</html>
