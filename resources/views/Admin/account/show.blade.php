<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Fit Fab | Overview </title>
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
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User Details</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <!-- EXERCISE EQUIPMENTS -->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            <!--begin::Navbar-->
                            <div class="card mb-5 mb-xl-10">
                                <div class="card-body pt-9 pb-0">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @elseif(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <!--begin::Details-->
                                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                        <!--begin: Pic-->
                                        <div class="me-7 mb-4">
                                            <div
                                                class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                                <img src="{{ $user->profile->avatar ?? '--' }}"
                                                    alt="{{ $user->profile->first_name ?? '--' }}" />
                                                <div
                                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Pic-->
                                        <!--begin::Info-->
                                        <div class="flex-grow-1">
                                            <!--begin::Title-->
                                            <div
                                                class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                <!--begin::User-->
                                                <div class="d-flex flex-column">
                                                    <!--begin::Name-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span
                                                            class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">
                                                            {{ ucfirst($user->profile->first_name ?? '--') }}
                                                            {{ $user->profile->last_name ?? '--' }} </span>
                                                    </div>
                                                    <!--end::Name-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                                        {{-- <a href="#"
                                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512"
                                                                class="svg_custom_icon"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                <path
                                                                    d="M352 96h64c17.7 0 32 14.3 32 32V384c0 17.7-14.3 32-32 32H352c-17.7 0-32 14.3-32 32s14.3 32 32 32h64c53 0 96-43 96-96V128c0-53-43-96-96-96H352c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-7.5 177.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H160v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" />
                                                            </svg>
                                                            <!--end::Svg Icon-->{{ $user->last_login ? Carbon\Carbon::parse($user->last_login)->diffForHumans() : 'Not logged-in yet' }}
																													</a> --}}
                                                        <a href="#"
                                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 384 512"
                                                                class="svg_custom_icon"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                <path
                                                                    d="M178.3 5.7L40.3 143.7C35 149 32 156.2 32 163.7C32 179.3 44.7 192 60.3 192H144V400c0 8.8-7.2 16-16 16H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h96c61.9 0 112-50.1 112-112V192h83.7c15.6 0 28.3-12.7 28.3-28.3c0-7.5-3-14.7-8.3-20L205.7 5.7C202 2 197.1 0 192 0s-10 2-13.7 5.7z" />
                                                            </svg>
                                                            <!--end::Svg Icon--></a>
                                                        <a href="#"
                                                            class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 512"
                                                                class="svg_custom_icon"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                <path
                                                                    d="M112 96c0-17.7 14.3-32 32-32h16c17.7 0 32 14.3 32 32V224v64V416c0 17.7-14.3 32-32 32H144c-17.7 0-32-14.3-32-32V384H64c-17.7 0-32-14.3-32-32V288c-17.7 0-32-14.3-32-32s14.3-32 32-32V160c0-17.7 14.3-32 32-32h48V96zm416 0v32h48c17.7 0 32 14.3 32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32v64c0 17.7-14.3 32-32 32H528v32c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32V288 224 96c0-17.7 14.3-32 32-32h16c17.7 0 32 14.3 32 32zM416 224v64H224V224H416z" />
                                                            </svg>
                                                            <!--end::Svg Icon--></a>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Actions-->
                                                <div class="d-flex my-4">
                                                    @if ($user->status == 1)
                                                        <a href="/admin/registered-users-status/{{ $user->id }}"
                                                            class="btn btn-sm btn-danger me-2">Deactivate Account</a>
                                                    @else
                                                        <a href="/admin/registered-users-status/{{ $user->id }}"
                                                            class="btn btn-sm btn-success me-2">Activate Account</a>
                                                    @endif
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Stats-->
                                            <div class="d-flex flex-wrap flex-stack">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                                    <!--begin::Stats-->
                                                    <div class="d-flex flex-wrap">

                                                        <!--begin::Stat Current Weight-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-175px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            <div class="d-flex align-items-center">
                                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                                    data-kt-countup-value="{{ $user->profile->weight ?? 'N/A' }}"
                                                                    data-kt-countup-suffix=" {{ ucfirst($user->profile->weight_unit ?? 'N/A') }}">
                                                                    {{ $user->profile->weight ?? 'N/A' }}
                                                                </div>
                                                            </div>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-bold fs-6 text-gray-400">Weight</div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Stat Current Weight-->

                                                        <!--begin::Stat Goal Weight-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-175px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            <div class="d-flex align-items-center">
                                                                <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                                    data-kt-countup-value="{{ $user->profile->height ?? 'N/A' }}"
                                                                    data-kt-countup-suffix=" {{ ucfirst($user->profile->height_unit ?? 'N/A') }}">
                                                                    {{ $user->profile->height ?? 'N/A' }}</div>
                                                            </div>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-bold fs-6 text-gray-400">Height</div>
                                                            <!--end::Label-->

                                                        </div>
                                                        <!--end::Stat Goal Weight-->

                                                        <!--begin::Stat Goal Type-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-175px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            <div class="d-flex align-items-center">
                                                                <div class="fs-2 fw-bolder" data-kt-countup-value=""
                                                                    data-kt-countup-suffix="">
                                                                    {{ $user->profile->fitness_experience ?? 'N/A' }}
                                                                </div>
                                                            </div>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-bold fs-6 text-gray-400">Fitness Experience
                                                            </div>
                                                            <!--end::Label-->

                                                        </div>
                                                        <!--end::Stat Goal Type-->

                                                        <!--begin::Stat Weight Difference-->
                                                        <div
                                                            class="border border-gray-300 border-dashed rounded min-w-175px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            <div class="d-flex align-items-center">

                                                                <div class="fs-2 fw-bolder" data-kt-countup-value=""
                                                                    data-kt-countup-suffix="">
                                                                    {{ $user->profile->difficulties ?? 'N/A' }}
                                                                </div>

                                                            </div>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-bold fs-6 text-gray-400">Difficulty Level
                                                            </div>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Stat Weight Difference-->

                                                        <!--begin::Stat No Of Meals-->
                                                        {{-- <div
                                                            class="border border-gray-300 border-dashed rounded min-w-175px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            @if ($user->profile->userinterest)
                                                                @foreach ($user->profile->userinterest as $intrest)
                                                                    <div class="broker-tag">
                                                                        {{ ucfirst($intrest->interest->name ?? '--') }}
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <p>--</p>
                                                            @endif

                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-bold fs-6 text-gray-400">Interests</div>
                                                            <!--end::Label-->

                                                        </div> --}}
                                                        <!--end::Stat No Of Meals-->

                                                        <!--begin::Stat Activity Level-->
                                                        {{-- <div  class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                            <!--begin::Number-->
                                                            <div class="d-flex align-items-center">
                                                                <div class="fs-2 fw-bolder" data-kt-countup-value=""
                                                                    data-kt-countup-suffix="">
                                                                    {{ $user->goal->activity_level ?? 'N/A' }}</div>
                                                            </div>
                                                            <!--end::Number-->
                                                            <!--begin::Label-->
                                                            <div class="fw-bold fs-6 text-gray-400">Activity Level
                                                            </div>
                                                            <!--end::Label-->

                                                        </div> --}}
                                                        <!--end::Stat Activity Level-->
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Navs-->
                                    <ul
                                        class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->segment(2) == 'user-overview' ? 'active' : '' }}"
                                                href="/admin/user-overview/{{ $user->id }}">Overview</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->segment(2) == 'my-workouts' ? 'active' : '' }}"
                                                href="/admin/my-workouts/{{ $user->id }}">My Workouts</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->segment(2) == 'user-meal' ? 'active' : '' }}"
                                                href="/admin/user-meal/{{ $user->id }}">Daily Meals</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->segment(2) == 'user-statistics-leucine' ? 'active' : '' }}"
                                                href="/admin/user-statistics-leucine/{{ $user->id }}">Statistics
                                                Leucine</a>
                                        </li>
                                        <!--end::Nav item-->

                                        <!--begin::Nav item-->
                                        <li class="nav-item mt-2">
                                            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->segment(2) == 'user-statistics-protein' ? 'active' : '' }}"
                                                href="/admin/user-statistics-protein/{{ $user->id }}">Statistics
                                                Protein</a>
                                        </li>
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        {{-- <li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5 {{(request()->segment(2) == 'user-favorite-exercise') ? 'active' : '' }}" href="/admin/user-favorite-exercise/{{$user->id}}">Favorite Exercise</a>
											</li> --}}
                                        <!--end::Nav item-->
                                        <!--begin::Nav item-->
                                        {{-- <li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5 {{(request()->segment(2) == 'user-order-history') ? 'active' : '' }}" href="/admin/user-order-history/{{$user->id}}">Order History</a>
											</li> --}}
                                        <!--end::Nav item-->
                                    </ul>
                                    <!--begin::Navs-->
                                </div>
                            </div>
                            <!--end::Navbar-->
                            <!--begin::details View-->
                            @yield('content')
                            <!--end::details View-->
                        </div>
                        <!--end::Container-->
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
