<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Fit Fab | Exercises</title>
    @include('global.header-links')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
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
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Exercises</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->

                            <!--end::Actions-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-xxl">
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1"
                                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                    <path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" data-kt-user-table-filter="search"
                                                class="form-control form-control-solid w-250px ps-14"
                                                placeholder="Search Exercise" />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                            <!--begin::Add user-->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_add_user">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                                            rx="1" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Add Exercise</button>
                                            <!--end::Add user-->
                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Group actions-->
                                        <div class="d-flex justify-content-end align-items-center d-none"
                                            data-kt-user-table-toolbar="selected">
                                            <div class="fw-bolder me-5">
                                                <span class="me-2"
                                                    data-kt-user-table-select="selected_count"></span>Selected
                                            </div>
                                            <button type="button" class="btn btn-danger"
                                                data-kt-user-table-select="delete_selected">Delete Selected</button>
                                        </div>
                                        <!--end::Group actions-->
                                        <!--begin::Modal - Add task-->
                                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1"
                                            aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header" id="kt_modal_add_user_header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bolder">Add Exercise</h2>
                                                        <!--end::Modal title-->
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                            data-bs-dismiss="modal">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137"
                                                                        width="16" height="2" rx="1"
                                                                        transform="rotate(-45 6 17.3137)"
                                                                        fill="currentColor" />
                                                                    <rect x="7.41422" y="6" width="16"
                                                                        height="2" rx="1"
                                                                        transform="rotate(45 7.41422 6)"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                        <!--begin::Form-->
                                                        <form id="kt_modal_add_user_form" class="form"
                                                            action="/admin/exercise-store" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <!--begin::Scroll-->
                                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                                data-kt-scroll-max-height="auto"
                                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                                data-kt-scroll-offset="300px">
                                                                <!--begin::Input group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="d-block fw-bold fs-6 mb-5">Thumbnail</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Image input-->
                                                                    <div class="image-input image-input-outline"
                                                                        data-kt-image-input="true"
                                                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                                        <!--begin::Preview existing avatar-->
                                                                        <div class="image-input-wrapper w-125px h-125px"
                                                                            style="background-image: url(assets/media/avatars/300-6.jpg);">
                                                                        </div>
                                                                        <!--end::Preview existing avatar-->
                                                                        <!--begin::Label-->
                                                                        <label
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="change"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Change thumbnail">
                                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" name="thumbnail"
                                                                                accept=".png, .jpg, .jpeg" required />
                                                                            <input type="hidden"
                                                                                name="thumbnail_remove" />
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Cancel-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="cancel"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Cancel thumbnail">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Cancel-->
                                                                        <!--begin::Remove-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="remove"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Remove thumbnail">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Remove-->
                                                                    </div>
                                                                    <!--end::Image input-->
                                                                    <!--begin::Hint-->
                                                                    <div class="form-text">Allowed file types: png,
                                                                        jpg, jpeg.</div>
                                                                    <!--end::Hint-->
                                                                </div>
                                                                <!--end::Input group-->

                                                                <!--begin::Title-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Title</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="title"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="title" value="" required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Title -->

                                                                <!--begin::Description-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Description</label>
                                                                    <!--end::Label-->
                                                                    <textarea name="description" rows="3" class="form-control form-control-solid mb-3 mb-lg-0">
                                      </textarea>
                                                                </div>
                                                                <!--end::Description-->

                                                                <!--begin::Reps-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Reps</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="reps"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="reps" value="" required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Reps-->

                                                                <!--begin::Sets-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Sets</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="sets"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="sets" value="" required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Sets-->

                                                                <!--begin::Note-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Notes</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="note"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="note" value="" required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Note-->

                                                                <!--begin::Duration-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Duration</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="duration"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="duration" value=""
                                                                        required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Duration-->

                                                                <!--begin::Media-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Media</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="file" name="media"
                                                                        id="media"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="upload image"
                                                                        accept="image/png, image/jpeg" value=""
                                                                        required />
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
                                                    <!--end::Modal body-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                        <!--end::Modal - Add task-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-4">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @elseif(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->

                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

                                                <th class="min-w-125px">Name</th>
                                                <th class="min-w-125px">Description</th>
                                                <th class="min-w-125px">Duration</th>
                                                <th class="min-w-125px">Reps</th>
                                                <th class="min-w-125px">Sets</th>
                                                <th class="min-w-125px">Note</th>
                                                {{-- <th class="min-w-125px">Status</th> --}}
                                                <th class="text-end min-w-100px">Actions</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->

                                        <tbody class="text-gray-600 fw-bold">
                                            @if ($exercise != null)
                                                @foreach ($exercise as $item)
                                                    <tr>
                                                        <!--begin::User=-->
                                                        <td class="d-flex align-items-center">
                                                            <!--begin:: Avatar -->
                                                            <div
                                                                class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                <a href="">
                                                                    <div class="symbol-label">
                                                                        <img src="{{ $item->thumbnail ?? asset('/uploads/profile/user-default.png') }}"
                                                                            alt="{{ $item->title }}"
                                                                            class="w-100" />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::User details-->
                                                            <div class="d-flex flex-column">
                                                                {{-- <a href="" class="text-gray-800 text-hover-primary mb-1">{{ucfirst($item->title)}}</a> --}}
                                                                <span>{{ $item->title ?? '--' }}</span>
                                                            </div>
                                                            <!--begin::User details-->
                                                        </td>
                                                        <!--end::User=-->
                                                        <!--begin::Role=-->
                                                        <td>
                                                            <span>{{ Str::of($item->description)->words(10, ' ...') ?? '--' }}</span>
                                                        </td>
                                                        <!--end::Role=-->

                                                        <!--begin::Last login=-->
                                                        <td>
                                                            <span>{{ $item->duration ?? '--' }}</span>
                                                        </td>
                                                        <!--end::Last login=-->

                                                        <!--begin::Two step=-->
                                                        <td>
                                                            <span>{{ $item->reps ?? '--' }}</span>
                                                        </td>
                                                        <!--end::Two step=-->

                                                        <!--begin::Joined-->
                                                        <td>
                                                            <span>{{ $item->sets ?? '--' }}</span>
                                                        </td>

                                                        <td>
                                                            <span>{{ $item->note ?? '--' }}</span>
                                                        </td>
                                                        <!--begin::Joined-->

                                                        <!--begin::Action=-->
                                                        <td class="text-end">
                                                            <a href="#"
                                                                class="btn btn-light btn-active-light-primary btn-sm"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">Actions
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon--></a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="/admin/exercise-edit/{{ $item->id }}"
                                                                        class="menu-link px-3">Edit</a>
                                                                    <a href="/admin/exercise-delete/{{ $item->id }}"
                                                                        class="menu-link px-3">Delete</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <!--end::Table row-->
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
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
