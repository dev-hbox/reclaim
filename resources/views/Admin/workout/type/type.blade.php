<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
        <title>Workout Category Types</title>
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
									<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Add Category Type</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
              </div>
							<!--end::Container-->
						</div>
            <div id="kt_content_container" class="container-xxl">
              <form class="form" action="/admin/store-type" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-custom">
                    <div class="card-body">
                          <!--begin::Status group-->
                          <div class="mb-7 mt-2">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                          </div>
                          <!--end::Status group-->

                            <!--begin::Input group-->
                           <div class="fv-row mb-7">
                             <!--begin::Label-->
                             <label class="required fw-bold fs-6 mb-2">Type Name</label>
                             <!--end::Label-->
                            <input type="text" name="type" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="type name" value="" required/>
                          </div>
                      <!--end::Input group-->

                        <div class="d-flex justify-content-start mt-2">
                           <!--begin::Button-->
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Action buttons-->

                    </div>
                </div>

            </form>
            </div>
						<!--end::Toolbar-->


          {{-- Show Types Here  Start  --}}
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
  <!--begin::Category-->
  <div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
      <!--begin::Card title-->
      <div class="card-title">

      </div>
      <!--end::Card title-->

    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
      @if(session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
        </div>
      @elseif(session()->has('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}
        </div>
      @endif
      <!--begin::Table-->
      <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
        <!--begin::Table head-->
        <thead>
          <!--begin::Table row-->
          <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="">ID</th>
            <th class="min-w-250px">Type</th>
            <th class="text-end min-w-70px">Actions</th>
          </tr>
          <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="fw-bold text-gray-600">
          <!--begin::Table row-->
          @foreach ($type as $item)
          <tr>
            <!--begin::Category=-->
            <td>
              <div class="d-flex">
              <div class="ms-5">
                  <!--begin::Title-->
                  <span class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="">{{$item->id}}</span>
                  <!--end::Title-->
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex">
              <div class="ms-5">
                  <!--begin::Title-->
                  <span class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="type">{{$item->type}}</span>
                  <!--end::Title-->
                </div>
              </div>
            </td>
            <!--end::Category=-->
            <td class="text-end">
              <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="/admin/type-edit/{{$item->id}}" class="menu-link px-3">Edit</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="/admin/type-delete/{{$item->id}}" class="menu-link px-3">Delete</a>
                </div>
                <!--end::Menu item-->
              </div>
              <!--end::Menu-->
            </td>
            <!--end::Action=-->
          </tr>
          @endforeach
          <!--end::Table row-->
        </tbody>
        <!--end::Table body-->
      </table>
      <!--end::Table-->
    </div>
    <!--end::Card body-->
  </div>
  <!--end::Category-->
</div>
<!--end::Container-->
          {{-- Show Types Here  End  --}}


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
