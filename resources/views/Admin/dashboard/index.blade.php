<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>{{ config('app.name') }} | Dasboard</title>
    <style>
        .bg-custom-color {
            background-color: #1f1d2d !important
        }
    </style>
    @include('global.header-links')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    @include('partials.sidebar')
    <!--begin::Root-->

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
                            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Page title-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <div class="row g-5 g-xl-8">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <div class="col-xl-4">

                                <a href="#" class="card bg-custom-color hoverable card-xl-stretch mb-xl-8">

                                    <div class="card-body">

                                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                        fill="currentColor"></path>
                                                    <rect opacity="0.3" x="8" y="3" width="8" height="8"
                                                        rx="4" fill="currentColor"></rect>
                                                </svg>
                                            </span>
                                        </span>
                                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">12</div>
                                        <div class="fw-bold text-gray-100">Users</div>
                                    </div>

                                </a>

                            </div>

                            <iv class="col-xl-4">

                                <a href="#" class="card bg-custom-color hoverable card-xl-stretch mb-xl-8">

                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                        <span class="svg-icon svg-icon-3x svg-icon-3x d-block my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">15</div>
                                        <div class="fw-bold text-white">Workouts</div>
                                    </div>

                                </a>

                            </iv>


                            <div class="col-xl-4">

                                <a href="#" class="card bg-custom-color hoverable card-xl-stretch mb-xl-8">

                                    <div class="card-body">

                                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">20</div>
                                        <div class="fw-bold text-gray-100">Workout Categories</div>
                                    </div>

                                </a>

                            </div>

                            <div class="col-xl-4">

                                <a href="#" class="card bg-custom-color hoverable card-xl-stretch mb-xl-8">

                                    <div class="card-body">

                                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.3"
                                                    d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">65</div>
                                        <div class="fw-bold text-gray-100">Workout Levels</div>
                                    </div>

                                </a>

                            </div>

                            <div class="col-xl-4">

                                <a href="#" class="card bg-custom-color hoverable card-xl-stretch mb-xl-8">

                                    <div class="card-body">

                                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.3"
                                                    d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">66</div>
                                        <div class="fw-bold text-gray-100">Exercises</div>
                                    </div>

                                </a>

                            </div>


                            <div class="col-xl-4">

                                <a href="#" class="card bg-custom-color hoverable card-xl-stretch mb-xl-8">

                                    <div class="card-body">

                                        <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.3"
                                                    d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">65</div>
                                        <div class="fw-bold text-gray-100">Achievements</div>
                                    </div>

                                </a>

                            </div>

                        </div>

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            @include('partials.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    @include('global.footer-links')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
<script>
