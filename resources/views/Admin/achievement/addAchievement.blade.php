<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Add Achivements</title>
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
                                        <h3>Add Achievements Goals</h3>
                                    </div>
                                    <!--begin::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-4">
                                    <form class="form w-100" action="/admin/create-achievement" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex fv-row mb-8">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="custom-radio form-check-input me-2" type="radio"
                                                    id="completion" name="goal_type" value="completion" checked>

                                                <label class="form-check-label me-3" for="completion">Completion of
                                                    Workout</label>

                                                <input class=" custom-radio form-check-input me-2" type="radio"
                                                    id="streak" name="goal_type" value="streak">

                                                <label class="form-check-label me-3" for="streak">Streak</label>

                                                <input class=" custom-radio form-check-input me-2" type="radio"
                                                    id="steps" name="goal_type" value="steps">

                                                <label class="form-check-label me-3"
                                                    for="steps">Steps/Distance</label>
                                            </div>
                                        </div>

                                        <div id="completion-form"
                                            class=" form-section d-flex flex-column scroll-y me-n7 pe-7">
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
                                                        style="background-image: url('../../../../assets/media/svg/avatars/blank.svg');">
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
                                                    id="goal_name" name="goal_name">
                                            </div>
                                            @if ($errors->has('goal_name'))
                                                <span class="text-red-500">{{ $errors->first('goal_name') }}</span>
                                            @endif



                                            <div class="fv-row mb-7">
                                                <label class="d-block fw-bold fs-6 mb-5" for="goal_description">Goal
                                                    description</label>
                                                <textarea class="form-control mb-3 mb-lg-0 required" type="text" id="goal_description" name="goal_description"></textarea>
                                            </div>
                                            @if ($errors->has('goal_description'))
                                                <span
                                                    class="text-red-500">{{ $errors->first('goal_description') }}</span>
                                            @endif

                                            {{-- Goal Name End  --}}

                                            {{-- Number Of Workouts Start --}}
                                            <div class="fv-row mb-7" id="num_of-workout">
                                                <label class="d-block fw-bold fs-6 mb-5"
                                                    for="number_of_workout">Number
                                                    of
                                                    Workout</label>
                                                <input class="form-control  mb-3 mb-lg-0" type="text"
                                                    id="number_of_workout" name="number_of_workout">
                                            </div>
                                            {{-- Number Of Workouts End  --}}

                                            {{-- checkbox Start --}}
                                            {{-- <div class="d-flex fv-row mb-8 custom-check">
                                                <div class="form-check form-check-solid" id="number_of_days">
                                                    <input class="form-check-input me-3 chkbox"
                                                        id="number_of_days_checkbox" type="checkbox" />
                                                    <label id="number_label" class="d-block fw-bold fs-6 mb-5 me-3"
                                                        for="number_of_days_checkbox">Number of Days</label>
                                                </div>

                                                <div class="form-check form-check-solid" id="checkbox_id">
                                                    <input class="form-check-input me-3 chkbox"
                                                        id="associated_level_checkbox"
                                                        name="associated_category_level" type="checkbox" />
                                                    <label class="d-block fw-bold fs-6 mb-5"
                                                        for="associated_level_checkbox">Associated with
                                                        level</label>
                                                </div>

                                                <div class="form-check form-check-solid" id="checkbox_id">
                                                    <input class="form-check-input me-3 chkbox"
                                                        id="associated_category_checkbox"
                                                        name="associated_category_level" type="checkbox" />
                                                    <label class="d-block fw-bold fs-6 mb-5"
                                                        for="associated_category_checkbox">Associated with
                                                        category</label>
                                                </div>
                                            </div> --}}
                                            {{-- checkbox End --}}


                                            {{-- Number of days Input Start --}}
                                            {{-- <div id="number_of_days_input" class="fv-row mb-7 num-days"
                                                style="display:none;">
                                                <label class="d-block fw-bold fs-6 mb-5" for="completion_days">Number
                                                    of Days</label>
                                                <input class="form-control mb-3 mb-lg-0" type="text"
                                                    id="completion_days" name="completion_days">
                                            </div> --}}
                                            {{-- Number of days Input End --}}

                                            {{-- Associated with category/level Input Start --}}
                                            {{-- <div id="associated_level_checkbox_input" class="Associated-div"
                                                style="display:none;">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class=" fw-bold fs-6 mb-2">Level</label>
                                                    <!--end::Label-->
                                                    <select id="level" class="form-control mb-3 mb-lg-0"
                                                        name="level">
                                                        <option value=""></option>
                                                        <option value="beginner">Beginner</option>
                                                        <option value="intermediate">Intermediate</option>
                                                        <option value="advance">Advance</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="associated_category_checkbox_input" class="Associated-div"
                                                style="display:none;">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fw-bold fs-6 mb-2">Associated
                                                        with category/level</label>
                                                    <!--end::Label-->
                                                    <select id="category" class="form-control mb-3 mb-lg-0" name="category">
                                                        <option value=""></option>
                                                        @foreach ($types as $category)
                                                            <option value="{{ $category['id'] }}">{{ $category['type'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}

                                        </div>
                                        {{-- Associated with category/level Input End --}}

                                        {{-- streak-form Start --}}
                                        <div id="streak-form" class="form-section" style="display:none;">

                                            <div class="fv-row mb-7">
                                                <label class="d-block fw-bold fs-6 mb-5"
                                                    for="Number_days_in_a_row">Number
                                                    of
                                                    Days in a row</label>
                                                <input class="form-control mb-3 mb-lg-0" type="text"
                                                    id="Number_days_in_a_row" name="Number_days_in_a_row">
                                            </div>

                                            {{-- checkbox Start --}}
                                            {{-- <div class="d-flex fv-row mb-8 custom-check">
                                                <div class="form-check form-check-solid">
                                                    <input class="form-check-input me-3" id="gap_days_checkbox_input"
                                                        type="checkbox" value="1" />
                                                    <label class="d-block fw-bold fs-6 mb-5 me-3"
                                                        for="gap_days_checkbox_input">Can have gap</label>
                                                </div>
                                            </div> --}}
                                            {{-- checkbox End --}}

                                            {{-- Gap days Input Start --}}
                                            {{-- <div id="gap_days_input" class="fv-row mb-7" style="display:none;">
                                                <label class="d-block fw-bold fs-6 mb-5" for="gap_days_input">Gap
                                                    Days</label>
                                                <input class="form-control mb-3 mb-lg-0" type="text"
                                                    id="gap_days_input_field" name="gap_days">
                                            </div> --}}
                                            {{-- Number of days Input End --}}
                                        </div>
                                        {{-- streak-form End --}}

                                        {{-- Steps-form Start --}}
                                        <div id="steps-form" class="form-section" style="display:none;">
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
                                                            id="distance_steps" name="distance_steps">
                                                    </div>
                                                </div>
                                                <div class="fv-row mt-7" id="distance-container" style="display: none;">
                                                    <div>
                                                        <label class="fw-bold fs-6 mb-2">Distance</label>
                                                        <input class="form-control mb-3 mb-lg-0" type="text"
                                                            id="distance_steps" name="distance">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Steps-form End --}}

                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
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
            <!--end::Footer-->
        </div>
        @include('partials.footer')
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

            $('#completion').click(function() {
                $('.chkbox').prop('checked', false);
            });

            $('input[type=radio][name=goal_type]').change(function() {
                $('.form-section').hide();
                if ($(this).val() === 'completion') {
                    $('#completion-form').show();
                    $('#checkbox_id, #num_of-workout, #number_of_days').show();
                } else if ($(this).val() === 'streak') {
                    $('#streak-form').show();
                    $('#checkbox_id, #num_of-workout, #number_of_days, #associated_level_checkbox_input, #associated_category_checkbox_input')
                        .hide();
                    $('.num-days').hide();

                } else if ($(this).val() === 'steps') {
                    $('#steps-form').show();
                    $('#checkbox_id, #num_of-workout, #number_of_days, #associated_level_checkbox_input, #associated_category_checkbox_input')
                        .hide();
                    $('.num-days').hide();
                }
            });


            // Trigger change event on page load to show the correct form if needed
            $('input[type=radio][name=goal_type]:checked').trigger('change');


            // Toggle the display of the number of days input field
            $('#number_of_days_checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#number_of_days_input').show();
                } else {
                    $('#number_of_days_input').hide();

                }
            });

            // Toggle the display of the associated category/level input fields
            $('#associated_level_checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#associated_level_checkbox_input').show();
                } else {
                    $('#associated_level_checkbox_input').hide();
                }
            });

            $('#associated_category_checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#associated_category_checkbox_input').show();
                } else {
                    $('#associated_category_checkbox_input').hide();
                }
            });


            // Toggle the display of the Gap days input fields
            $('#gap_days_checkbox_input').change(function() {
                if ($(this).is(':checked')) {
                    $('#gap_days_input').show();
                } else {
                    $('#gap_days_input').hide();
                }
            });





        });
    </script>



    @include('global.footer-links')
</body>

</html>
