<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Achivements</title>
    <style>
        .card-custom-shadow {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            background-color: white !important;
            padding: 0px 0px 30px 5px;
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
    <!--begin::Root-->
    @include('partials.sidebar')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <!--end::Aside-->
            <!--begin::Wrapper-->
            @include('partials.header')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
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
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Achievements</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <div id="kt_content_container" class="container-xxl">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <!--begin::Card body-->
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-10" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="completion-tab" data-toggle="tab" href="#completion"
                                        role="tab" aria-controls="completion" aria-selected="true">Completion</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="streaks-tab" data-toggle="tab" href="#streaks"
                                        role="tab" aria-controls="streaks" aria-selected="false">Streaks</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="steps-distance-tab" data-toggle="tab" href="#steps-distance"
                                        role="tab" aria-controls="steps-distance" aria-selected="false">Steps /
                                        Distance</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabsContent">
                                <div class="tab-pane fade show active" id="completion" role="tabpanel"
                                    aria-labelledby="completion-tab">
                                    <div class="row g-6 g-xl-9">
                                        @if ($achievements != null)
                                            @foreach ($achievements as $achievement)
                                                @if ($achievement['goal_type'] == 'milestone')
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 col-xl-4">
                                                        <div class="card-custom-shadow">
                                                            <!--begin::Card-->
                                                            <!--begin::Card header-->
                                                            <div class="card-header border-0 pt-9">
                                                                <!--begin::Card Title-->
                                                                <div class="card-title m-0">
                                                                    <!--begin::Avatar-->
                                                                    <div class="symbol custom-goal-avatar bg-light">
                                                                        <img src="{{ $achievement->avatar }}"
                                                                            alt="image" class="p-3" />
                                                                    </div>
                                                                    <!--end::Avatar-->

                                                                </div>
                                                                <!--end::Car Title-->
                                                            </div>
                                                            <!--end:: Card header-->
                                                            <!--begin:: Card body-->
                                                            <div class="card-body p-9">

                                                                <!--begin::Name-->
                                                                <div class="fs-3 fw-bolder text-dark">
                                                                    {{ $achievement->goal_name ?? '--' }}</div>
                                                                <!--end::Name-->

                                                                <!--begin::Description-->
                                                                <p class="text-gray-400 fw-bold fs-5 mt-1"> Goal Type:
                                                                    {{ $achievement->goal_type ?? '--' }}</p>
                                                                <p class="text-gray-400 fw-bold fs-5"> No.of
                                                                    Workouts:
                                                                    {{ $achievement->number_of_workout ?? '--' }}</p>
                                                                {{-- <p class="text-gray-400 fw-bold fs-5"> Completion
                                                                Days:
                                                                {{ $achievement->completion_days ?? '--' }}</p> --}}

                                                                <!--begin::Users-->
                                                                {{-- <div class="symbol-group symbol-hover">
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Emma Smith">
                                                                    <img alt="Pic"
                                                                        src="{{ asset('/uploads/workout-plan/user-default.png') }}" />
                                                                </div>
                                                                <!--begin::User-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Rudy Stone">
                                                                    <img alt="Pic"
                                                                        src="{{ asset('/uploads/workout-plan/user-default.png') }}" />
                                                                </div>
                                                                <!--begin::User-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Susan Redwood">
                                                                    <span
                                                                        class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                                                                </div>
                                                                <!--begin::User-->
                                                            </div> --}}
                                                                <!--end::Users-->
                                                            </div>
                                                            <!--end:: Card body-->
                                                            <!--end::Card-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="/admin/achievement-edit/{{ $achievement->id }}"
                                                                    class="btn btn-info">Edit</a>
                                                                <a href="/admin/achievement-delete/{{ $achievement->id }}"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                @endif
                                            @endforeach

                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="streaks" role="tabpanel" aria-labelledby="streaks-tab">
                                    <div class="row g-6 g-xl-9">
                                        @if ($achievements != null)
                                            @foreach ($achievements as $achievement)
                                                @if ($achievement['goal_type'] == 'streak')
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 col-xl-4">
                                                        <div class="card-custom-shadow">
                                                            <!--begin::Card-->
                                                            <!--begin::Card header-->
                                                            <div class="card-header border-0 pt-9">
                                                                <!--begin::Card Title-->
                                                                <div class="card-title m-0">
                                                                    <!--begin::Avatar-->
                                                                    <div class="symbol custom-goal-avatar bg-light">
                                                                        <img src="{{ $achievement->avatar }}"
                                                                            alt="image" class="p-3" />
                                                                    </div>
                                                                    <!--end::Avatar-->

                                                                </div>
                                                                <!--end::Car Title-->
                                                            </div>
                                                            <!--end:: Card header-->
                                                            <!--begin:: Card body-->
                                                            <div class="card-body p-9">
                                                                <!--begin::Name-->
                                                                <div class="fs-3 fw-bolder text-dark">
                                                                    {{ $achievement->goal_name ?? '--' }}</div>
                                                                <!--end::Name-->
                                                                <!--begin::Description-->
                                                                <p class="text-gray-400 fw-bold fs-5 mt-1">Goal Type :
                                                                    {{ $achievement->goal_type ?? '--' }}</p>
                                                                <p class="text-gray-400 fw-bold fs-5 mt-1"> Number of
                                                                    Days in a row :
                                                                    {{ $achievement->number_of_days ?? '--' }}</p>
                                                                {{-- <p class="text-gray-400 fw-bold fs-5 mt-1"> Gap Days :
                                                                {{ $achievement->gap_days ?? '--' }}</p> --}}

                                                                <!--begin::Users-->
                                                                {{-- <div class="symbol-group symbol-hover">
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Emma Smith">
                                                                    <img alt="Pic"
                                                                        src="{{ asset('/uploads/workout-plan/user-default.png') }}" />
                                                                </div>
                                                                <!--begin::User-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Rudy Stone">
                                                                    <img alt="Pic"
                                                                        src="{{ asset('/uploads/workout-plan/user-default.png') }}" />
                                                                </div>
                                                                <!--begin::User-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Susan Redwood">
                                                                    <span
                                                                        class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                                                                </div>
                                                                <!--begin::User-->
                                                            </div> --}}
                                                                <!--end::Users-->
                                                            </div>
                                                            <!--end:: Card body-->

                                                            <!--end::Card-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="/admin/achievement-edit/{{ $achievement->id }}"
                                                                    class="btn btn-info">Edit</a>
                                                                <a href="/admin/achievement-delete/{{ $achievement->id }}"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="steps-distance" role="tabpanel"
                                    aria-labelledby="steps-distance-tab">
                                    <div class="row g-6 g-xl-9">
                                        @if ($achievements != null)
                                            @foreach ($achievements as $achievement)
                                                @if ($achievement['goal_type'] == 'activity')
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 col-xl-4">
                                                        <div class="card-custom-shadow">
                                                            <!--begin::Card-->
                                                            <!--begin::Card header-->
                                                            <div class="card-header border-0 pt-9">
                                                                <!--begin::Card Title-->
                                                                <div class="card-title m-0">
                                                                    <!--begin::Avatar-->
                                                                    <div class="symbol custom-goal-avatar bg-light">
                                                                        <img src="{{ $achievement->avatar }}"
                                                                            alt="image" class="p-3" />
                                                                    </div>
                                                                    <!--end::Avatar-->

                                                                </div>
                                                                <!--end::Car Title-->
                                                            </div>
                                                            <!--end:: Card header-->
                                                            <!--begin:: Card body-->
                                                            <div class="card-body p-9">
                                                                <!--begin::Name-->
                                                                <div class="fs-3 fw-bolder text-dark">
                                                                    {{ $achievement->goal_name ?? '--' }}</div>
                                                                <!--end::Name-->
                                                                <!--begin::Description-->
                                                                <p class="text-gray-400 fw-bold fs-5 mt-1">Goal Type :
                                                                    {{ $achievement->goal_type ?? '--' }}</p>
                                                                <p class="text-gray-400 fw-bold fs-5 mt-1"> UOM :
                                                                    {{ $achievement->unit_of_measurement ?? '--' }}</p>
                                                                <p class="text-gray-400 fw-bold fs-5 mt-1">Steps :
                                                                    {{ $achievement->distance_steps ?? '0' }}</p>
                                                                <p class="text-gray-400 fw-bold fs-5 mt-1"> Distance
                                                                    {{ $achievement->distance ?? '0' }}</p>

                                                                <!--begin::Users-->
                                                                {{-- <div class="symbol-group symbol-hover">
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Emma Smith">
                                                                    <img alt="Pic"
                                                                        src="{{ asset('/uploads/workout-plan/user-default.png') }}" />
                                                                </div>
                                                                <!--begin::User-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Rudy Stone">
                                                                    <img alt="Pic"
                                                                        src="{{ asset('/uploads/workout-plan/user-default.png') }}" />
                                                                </div>
                                                                <!--begin::User-->
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip" title="Susan Redwood">
                                                                    <span
                                                                        class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                                                                </div>
                                                                <!--begin::User-->
                                                            </div> --}}
                                                                <!--end::Users-->
                                                            </div>
                                                            <!--end:: Card body-->
                                                            <!--end::Card-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="/admin/achievement-edit/{{ $achievement->id }}"
                                                                    class="btn btn-info">Edit</a>
                                                                <a href="/admin/achievement-delete/{{ $achievement->id }}"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--begin::Footer-->
                @include('partials.footer')
                <!--end::Footer-->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#myTabs a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            });

        });
    </script>


    @include('global.footer-links')
</body>

</html>
