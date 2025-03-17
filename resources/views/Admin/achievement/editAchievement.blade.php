<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Edit Achivements</title>
    @include('global.header-links')
    <!--end::Global Stylesheets Bundle-->
    <style>
    </style>
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
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Achievements</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <div class="post d-flex flex-column-fluid" id="kt_post">
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
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h3>Update Achievements Goals</h3>
                                    </div>
                                    <!--begin::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-4">
                                    <form class="form w-100" action="/admin/achievement-update/{{ $achievement->id }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if ($achievement->goal_type === 'milestone')
                                            {{-- image Start  --}}
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                                <!--end::Label-->
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('../../../../assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('{{ $achievement->avatar ?? '../../../../assets/media/svg/avatars/blank.svg' }}');">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
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
                                            {{-- image End  --}}

                                            {{-- Goal Name Start  --}}
                                            <div class="fv-row mb-7">
                                                <label class="d-block fw-bold fs-6 mb-5" for="goal_name">Goal
                                                    name</label>
                                                <input class="form-control mb-3 mb-lg-0 required" type="text"
                                                    placeholder="{{ $achievement->goal_name }}" id="goal_name"
                                                    value="{{ $achievement->goal_name }}" name="goal_name">
                                            </div>
                                            {{-- Goal Name End  --}}

                                            {{-- Number Of Workouts Start --}}
                                            <div class="fv-row mb-7" id="num_of-workout">
                                                <label class="d-block fw-bold fs-6 mb-5" for="number_of_workout">Number
                                                    of
                                                    Workout</label>
                                                <input class="form-control  mb-3 mb-lg-0" type="text"
                                                    placeholder="{{ $achievement->number_of_workout }}"
                                                    value="{{ $achievement->number_of_workout }}" id="number_of_workout"
                                                    name="number_of_workout">
                                            </div>
                                            {{-- Number Of Workouts End  --}}

                                            <div id="goal_description_input" class="fv-row mb-7 num-days">
                                                <div class="fv-row mb-7">
                                                    <label class="d-block fw-bold fs-6 mb-5" for="goal_description">Goal
                                                        description</label>
                                                    <textarea class="form-control mb-3 mb-lg-0 required" type="text" id="goal_description" name="goal_description">{{ $achievement->description }}</textarea>
                                                </div>
                                            </div>


                                            {{-- Number of days Input Start --}}
                                            {{-- @if ($achievement->number_of_days != null)
                                                <div id="number_of_days_input" class="fv-row mb-7 num-days">
                                                    <label class="d-block fw-bold fs-6 mb-5"
                                                        for="number_of_workout">Number
                                                        of Days</label>
                                                    <input class="form-control mb-3 mb-lg-0" type="text"
                                                        value="{{ $achievement->number_of_days }}"
                                                        placeholder="{{ $achievement->number_of_days }}"
                                                        id="number_of_workout" name="number_of_workout">
                                                </div>
                                            @endif --}}
                                            {{-- Number of days Input End --}}


                                            {{-- Associated with category/level Input Start --}}

                                            {{-- <div id="associated_category_level_input" class="Associated-div">
                                                @if ($achievement->category != null)
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fw-bold fs-6 mb-2">Associated
                                                            with category/level</label>
                                                        <!--end::Label-->
                                                        <select id="category" class="form-control mb-3 mb-lg-0"
                                                            name="category">
                                                            <option value="upper body"
                                                                {{ $achievement->category == 'upper body' ? 'selected' : '' }}>
                                                                Upper Body</option>
                                                            <option value="lower body"
                                                                {{ $achievement->category == 'lower body' ? 'selected' : '' }}>
                                                                Lower Body</option>
                                                            <option value="cardio"
                                                                {{ $achievement->category == 'cardio' ? 'selected' : '' }}>
                                                                Cardio</option>
                                                        </select>

                                                    </div>
                                                @endif
                                                @if ($achievement->level != null)
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class=" fw-bold fs-6 mb-2">Level</label>
                                                        <!--end::Label-->
                                                        <select id="level" class="form-control mb-3 mb-lg-0"
                                                            name="level">
                                                            <option value="beginner"
                                                                {{ $achievement->level == 'beginner' ? 'selected' : '' }}>
                                                                Beginner</option>
                                                            <option value="intermediate"
                                                                {{ $achievement->level == 'intermediate' ? 'selected' : '' }}>
                                                                Intermediate</option>
                                                            <option value="advance"
                                                                {{ $achievement->level == 'advance' ? 'selected' : '' }}>
                                                                Advance</option>
                                                        </select>
                                                    </div>
                                                @endif
                                            </div> --}}


                                            {{-- Associated with category/level Input End --}}
                                        @elseif ($achievement->goal_type === 'streak')
                                            {{-- image Start  --}}
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                                <!--end::Label-->
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('{{ $achievement->avatar ?? 'assets/media/avatars/300-6.jpg' }}');">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
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
                                            {{-- image End  --}}

                                            {{-- Goal Name Start  --}}
                                            <div class="fv-row mb-7">
                                                <label class="d-block fw-bold fs-6 mb-5" for="goal_name">Goal
                                                    name</label>
                                                <input class="form-control mb-3 mb-lg-0 required" type="text"
                                                    value="{{ $achievement->goal_name }}"
                                                    placeholder="{{ $achievement->goal_name }}" id="goal_name"
                                                    name="goal_name">
                                            </div>
                                            {{-- Goal Name End  --}}

                                            {{-- Number of Days in a row Start  --}}
                                            <div class="fv-row mb-7">
                                                <label class="d-block fw-bold fs-6 mb-5"
                                                    for="Number_days_in_a_row">Number
                                                    of
                                                    Days in a row</label>
                                                <input class="form-control mb-3 mb-lg-0" type="text"
                                                    id="Number_days_in_a_row"
                                                    value="{{ $achievement->number_of_days }}"
                                                    placeholder="{{ $achievement->number_of_days }}"
                                                    name="Number_days_in_a_row">
                                            </div>

                                            <div id="goal_description_input" class="fv-row mb-7 num-days">
                                                <div class="fv-row mb-7">
                                                    <label class="d-block fw-bold fs-6 mb-5"
                                                        for="goal_description">Goal
                                                        description</label>
                                                    <textarea class="form-control mb-3 mb-lg-0 required" type="text" id="goal_description" name="goal_description">{{ $achievement->description }}</textarea>
                                                </div>
                                            </div>
                                            {{-- Number of Days in a row End  --}}
                                            {{-- @if ($achievement->gap_days != null)
                                                <div class="fv-row mb-7">
                                                    <label class="d-block fw-bold fs-6 mb-5"
                                                        for="Number_days_in_a_row">Gap
                                                        Days</label>
                                                    <input class="form-control mb-3 mb-lg-0" type="text"
                                                        id="Number_days_in_a_row"
                                                        placeholder="{{ $achievement->gap_days }}"
                                                        name="Number_days_in_a_row">
                                                </div>
                                            @endif --}}
                                        @elseif ($achievement->goal_type === 'activity')
                                            {{-- image Start  --}}
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                                <!--end::Label-->
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline"
                                                    data-kt-image-input="true"
                                                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('{{ $achievement->avatar ?? 'assets/media/avatars/300-6.jpg' }}');">
                                                    </div>
                                                    <!--end::Preview existing avatar-->

                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
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
                                            {{-- image End  --}}

                                            {{-- Goal Name Start  --}}
                                            <div class="fv-row mb-7">
                                                <label class="d-block fw-bold fs-6 mb-5" for="goal_name">Goal
                                                    name</label>
                                                <input class="form-control mb-3 mb-lg-0 required" type="text"
                                                    value="{{ $achievement->goal_name }}"
                                                    placeholder="{{ $achievement->goal_name }}" id="goal_name"
                                                    name="goal_name">
                                            </div>
                                            {{-- Goal Name End  --}}

                                            <div id="goal_description_input" class="fv-row mb-7 num-days">
                                                <div class="fv-row mb-7">
                                                    <label class="d-block fw-bold fs-6 mb-5"
                                                        for="goal_description">Goal
                                                        description</label>
                                                    <textarea class="form-control mb-3 mb-lg-0 required" type="text" id="goal_description" name="goal_description">{{ $achievement->description }}</textarea>
                                                </div>
                                            </div>

                                            {{-- UOM Start  --}}
                                            {{-- <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fw-bold fs-6 mb-2">UOM</label>
                                                <!--end::Label-->
                                                <select id="uom" class="form-control mb-3 mb-lg-0"
                                                    name="unit_of_measurement">
                                                    <option
                                                        value="{{ $achievement->category == 'distance' ? 'selected' : '' }}">
                                                        Distance</option>
                                                    <option
                                                        value="{{ $achievement->category == 'steps' ? 'selected' : '' }}">
                                                        Steps</option>
                                                </select>
                                                <div class="fv-row mt-7">
                                                    <div>
                                                        <label class="fw-bold fs-6 mb-2">Distance / Steps</label>
                                                        <input class="form-control mb-3 mb-lg-0" type="text"
                                                            value="{{ $achievement->distance_steps }}"
                                                            placeholder="{{ $achievement->distance_steps }}"
                                                            id="distance_steps" name="distance_steps">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- UOM End  --}}

                                            <div id="steps-form" class="form-section">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fw-bold fs-6 mb-2">UOM</label>
                                                    <!--end::Label-->
                                                    <select id="uom" class="form-control mb-3 mb-lg-0"
                                                        name="unit_of_measurement">
                                                        <option value="distance">Distance</option>
                                                        <option value="steps">Steps</option>
                                                    </select>
                                                    <div class="fv-row mt-7" id="steps-container">
                                                        <div>
                                                            <label class="fw-bold fs-6 mb-2">Steps</label>
                                                            <input class="form-control mb-3 mb-lg-0" type="text"
                                                                id="distance_steps" name="distance_steps"
                                                                placeholder="{{ $achievement->distance_steps }}">
                                                        </div>
                                                    </div>
                                                    <div class="fv-row mt-7" id="distance-container"
                                                        style="display: none;">
                                                        <div>
                                                            <label class="fw-bold fs-6 mb-2">Distance</label>
                                                            <input class="form-control mb-3 mb-lg-0" type="text"
                                                                id="distance_steps" name="distance"
                                                                placeholder="{{ $achievement->distance }}"
                                                                >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <button type="submit" class="btn btn-primary w-100px">
                                            <span class="indicator-label ">Update</span>
                                        </button>
                                    </form>
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </div>



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
            $('#uom').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue == 'distance') {
                    $('#distance-container').show();
                    $('#steps-container').hide();
                } else if (selectedValue == 'steps') {
                    $('#steps-container').show();
                    $('#distance-container').hide();
                }
            });

            $('#uom').trigger('change');
        });
    </script>
    @include('global.footer-links')
</body>

</html>
