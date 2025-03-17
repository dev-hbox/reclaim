<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>{{ config('app.name') }} | Registered Users</title>
    @include('global.header-links')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    @include('partials.sidebar')
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->

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
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Registered Users
                                </h1>
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
                                                placeholder="Search user" />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                            <!--begin::Add user-->
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal"
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
                                                <!--end::Svg Icon-->Add User</button>
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
                                        <!--begin::Modal - Adjust Balance-->

                                        <!--end::Modal - New Card-->
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
                                                        <h2 class="fw-bolder">Add User</h2>
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
                                                            action="/admin/register-new-user" method="POST"
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
                                                                        class="d-block fw-bold fs-6 mb-5">Avatar</label>
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
                                                                            title="Change avatar">
                                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                                            <!--begin::Inputs-->
                                                                            <input type="file" name="avatar"
                                                                                accept=".png, .jpg, .jpeg" required />
                                                                            <input type="hidden"
                                                                                name="avatar_remove" />
                                                                            <!--end::Inputs-->
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Cancel-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="cancel"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Cancel avatar">
                                                                            <i class="bi bi-x fs-2"></i>
                                                                        </span>
                                                                        <!--end::Cancel-->
                                                                        <!--begin::Remove-->
                                                                        <span
                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                            data-kt-image-input-action="remove"
                                                                            data-bs-toggle="tooltip"
                                                                            title="Remove avatar">
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
                                                                <!--begin::User Name-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-bold fs-6 mb-2">User
                                                                        Name</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="username"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="Username" value=""
                                                                        required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::User Name-->

                                                                <!--begin::First Name-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-bold fs-6 mb-2">First
                                                                        Name</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="first_name"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="First name" value=""
                                                                        required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::First Name-->

                                                                <!--begin::Last Name-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-bold fs-6 mb-2">Last
                                                                        Name</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="last_name"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="Last name" value=""
                                                                        required />
                                                                    <!--end::Input -->
                                                                </div>
                                                                <!--end::Last Name-->

                                                                <!--begin::Email group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Email</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="email" name="email"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="example@domain.com"
                                                                        value="" required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Email group-->

                                                                <!--begin::password group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Password</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="password" name="password"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="*********" value=""
                                                                        required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::password group-->

                                                                <!--begin::DOB group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-bold fs-6 mb-2">Date Of
                                                                        Birth</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="date" name="date_of_birth"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="MM/DD/YYYY" value=""
                                                                        required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::DOB group-->

                                                                <!--begin::Phone group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Phone</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="phone"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="Phone" value="" required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Phone group-->

                                                                <!--begin::Weight group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Weight</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="weight"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="weight" value=""
                                                                        required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Weight  group-->

                                                                <!--begin::Weight Unit group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-bold fs-6 mb-2">Weight
                                                                        Unit</label>
                                                                    <!--end::Label-->
                                                                    <select class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        name="weight_unit">
                                                                        <option>Kg</option>
                                                                        <option>Pound</option>

                                                                    </select>
                                                                </div>
                                                                <!--end::Weight Unit group-->


                                                                <!--begin::Weight group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label
                                                                        class="required fw-bold fs-6 mb-2">Height</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="text" name="height"
                                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                                        placeholder="Height" value=""
                                                                        required />
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Weight  group-->

                                                                <!--begin::Weight Unit group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-bold fs-6 mb-2">Height
                                                                        Unit</label>
                                                                    <!--end::Label-->
                                                                    <select class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        name="weight_unit">
                                                                        <option>Feet </option>
                                                                        <option>Meters</option>

                                                                    </select>
                                                                </div>
                                                                <!--end::Weight Unit group-->


                                                                <!--begin::Fitness group-->
                                                                <div class="fv-row mb-7">
                                                                    <!--begin::Label-->
                                                                    <label class="required fw-bold fs-6 mb-2">Fitness
                                                                        Experience</label>
                                                                    <!--end::Label-->
                                                                    <select class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        name="fitness_experience">
                                                                        <option>New To Fitness</option>
                                                                        <option>Have some Experience</option>
                                                                        <option>Have a lot of Experience</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--end::Fitness group-->


                                                            <!--begin::Difficulties group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="required fw-bold fs-6 mb-2">Difficulties</label>
                                                                <!--end::Label-->
                                                                <select
                                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                                    id="exampleFormControlSelect1"
                                                                    name="difficulties">
                                                                    <option>Beginner</option>
                                                                    <option>Intermediate</option>
                                                                    <option>Advanced</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Difficulties group-->

                                                            <!--begin::Interest group-->

                                                            <div class="fv-row mb-7">

                                                                <!--begin::Label-->
                                                                <label><strong>Interests :</strong></label><br><br>
                                                                @if ($interests != null)
                                                                    @foreach ($interests as $interest)
                                                                        <label>
                                                                            <input type="checkbox" name="interests[]"
                                                                                value="{{ $interest->id }}">
                                                                            {{ $interest->name }}
                                                                        </label><br>
                                                                    @endforeach
                                                                @endif

                                                                {{-- <label><input type="checkbox" name="Interest[]"
                                                                                value="Squat"> Squat</label>
                                                                    <label><input type="checkbox" name="Interest[]"
                                                                            value="Deadlift"> Deadlift</label>
                                                                    <label><input type="checkbox" name="Interest[]"
                                                                            value="Dips"> Dips</label>
                                                                    <label><input type="checkbox" name="Interest[]"
                                                                            value="Bench_Press"> Bench Press</label>
                                                                    <label><input type="checkbox" name="Interest[]"
                                                                            value="Reverse_bent_over_row">Reverse bent
                                                                        over
                                                                        row</label>
                                                                    <label><input type="checkbox" name="Interest[]"
                                                                            value="pull_ups">pull-ups</label>
                                                                    <label><input type="checkbox" name="Interest[]"
                                                                            value="military_press">Military
                                                                        Press</label> --}}

                                                            </div>

                                                            <!--end::Interest group-->


                                                            <!--begin::Role group-->
                                                            <div class="mb-7">
                                                                <!--begin::Label-->
                                                                <label class="required fw-bold fs-6 mb-5">Role</label>
                                                                <!--end::Label-->
                                                                <!--begin::Roles-->
                                                                <!--begin::Input row-->
                                                                <div class="d-flex fv-row">
                                                                    <!--begin::Radio-->
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid">
                                                                        <!--begin::Input-->
                                                                        <input class="form-check-input me-3"
                                                                            name="user_role" type="radio"
                                                                            value="Admin"
                                                                            id="kt_modal_update_role_option_0"
                                                                            checked='checked' />
                                                                        <!--end::Input-->
                                                                        <!--begin::Label-->
                                                                        <label class="form-check-label"
                                                                            for="kt_modal_update_role_option_0">
                                                                            <div class="fw-bolder text-gray-800">
                                                                                Administrator</div>
                                                                            <div class="text-gray-600">Admin Panel all
                                                                                rights.</div>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                    </div>
                                                                    <!--end::Radio-->
                                                                </div>
                                                                <!--end::Input row-->
                                                                <div class='separator separator-dashed my-5'></div>
                                                                <!--begin::Input row-->
                                                                <div class="d-flex fv-row">
                                                                    <!--begin::Radio-->
                                                                    <div
                                                                        class="form-check form-check-custom form-check-solid">
                                                                        <!--begin::Input-->
                                                                        <input class="form-check-input me-3"
                                                                            name="user_role" type="radio"
                                                                            value="User"
                                                                            id="kt_modal_update_role_option_1" />
                                                                        <!--end::Input-->
                                                                        <!--begin::Label-->
                                                                        <label class="form-check-label"
                                                                            for="kt_modal_update_role_option_1">
                                                                            <div class="fw-bolder text-gray-800">User
                                                                            </div>
                                                                            <div class="text-gray-600">Mobile App User.
                                                                            </div>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                    </div>
                                                                    <!--end::Radio-->
                                                                </div>
                                                                <!--end::Input row-->
                                                                <!--end::Roles-->
                                                            </div>
                                                            <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
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
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox"
                                                            data-kt-check="true"
                                                            data-kt-check-target="#kt_table_users .form-check-input"
                                                            value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-125px">User</th>
                                                <th class="min-w-125px">Name</th>
                                                <th class="min-w-125px">Weight</th>
                                                <th class="min-w-125px">Height</th>
                                                <th class="min-w-125px">Phone</th>
                                                <th class="min-w-125px">Difficulties</th>
                                                <th class="min-w-125px">Status</th>
                                                <th class="text-end min-w-100px">Actions</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->

                                        <tbody class="text-gray-600 fw-bold">
                                            @foreach ($users as $user)
                                                @if ($user->roles[0]->name == 'User')
                                                    <tr>
                                                        <!--begin::Checkbox-->
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" />
                                                            </div>
                                                        </td>
                                                        <!--end::Checkbox-->

                                                        <!--begin::User=-->
                                                        <td class="d-flex align-items-center">
                                                            <!--begin:: Avatar -->
                                                            <div
                                                                class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                <a
                                                                    href="{{ $user->hasRole('User') ? '/admin/user-overview/' . $user->id : '#' }}">
                                                                    <div class="symbol-label">
                                                                        <img src="{{ $user->profile->avatar ?? asset('/uploads/profile/user-default.png') }}"
                                                                            alt="{{ $user->username ?? '--' }}"
                                                                            class="w-100" />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::User details-->
                                                            <div class="d-flex flex-column">
                                                                <a href="{{ $user->hasRole('User') ? '/admin/user-overview/' . $user->id : '#' }}"
                                                                    class="text-gray-800 text-hover-primary mb-1">{{ ucfirst($user->username ?? '--') }}</a>
                                                                <span>{{ $user->email }}</span>
                                                            </div>
                                                            <!--begin::User details-->
                                                        </td>
                                                        <!--end::User=-->

                                                        <!--begin::Role=-->
                                                        <td>
                                                            {{ ucfirst($user->profile->first_name ?? '--') }}
                                                            {{ $user->profile->last_name ?? '--' }}
                                                            {{-- {{ date('F d, Y', strtotime($user->profile->date_of_birth ?? '--')) }} --}}
                                                        </td>
                                                        <!--end::Role=-->

                                                        <!--begin::Last login=-->
                                                        <td>
                                                            {{ $user->profile->weight ?? '--' }}
                                                            {{ $user->profile->weight_unit ?? '--' }}
                                                            {{-- <div class="badge badge-light fw-bolder">
                                                            {{ $user->last_login ? Carbon\Carbon::parse($user->last_login)->diffForHumans() : 'Not logged-in yet' }}
                                                        </div> --}}
                                                        </td>
                                                        <!--end::Last login=-->

                                                        <!--begin::Two step=-->
                                                        <td> {{ $user->profile->height ?? '--' }}
                                                            {{ $user->profile->height_unit ?? '--' }}
                                                        </td>
                                                        <!--end::Two step=-->

                                                        <!--begin::Two step=-->
                                                        <td>{{ $user->profile->phone ?? '--' }}</td>
                                                        <!--end::Two step=-->

                                                        <!--begin::Joined-->
                                                        <td>{{ $user->profile->difficulties ?? '--' }}</td>

                                                        <td>
                                                            @if ($user->otp_status == 1)
                                                                @if ($user->status == 1)
                                                                    <div class="badge badge-light-success">Activate
                                                                    </div>
                                                                @else
                                                                    <div class="badge badge-light-danger">Inactive
                                                                    </div>
                                                                @endif
                                                            @elseif($user->otp_status == 0)
                                                                <div class="badge badge-light-warning">OTP not verified
                                                                </div>
                                                            @endif
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
                                                                    @if (!$user->hasRole('Admin'))
                                                                        @if ($user->otp_status == 1)
                                                                            @if ($user->status == 1)
                                                                                <a href="/admin/registered-users-status/{{ $user->id }}"
                                                                                    class="menu-link px-3">Inactive</a>
                                                                            @else
                                                                                <a href="/admin/registered-users-status/{{ $user->id }}"
                                                                                    class="menu-link px-3">Activate</a>
                                                                            @endif
                                                                        @elseif($user->otp_status == 0)
                                                                            <a href="#"
                                                                                class="menu-link px-3 not-allowed">Inactive</a>
                                                                        @endif
                                                                    @else
                                                                        <a href="#"
                                                                            class="menu-link px-3 not-allowed">Inactive</a>
                                                                    @endif
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                                                @endif
                                            @endforeach
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
