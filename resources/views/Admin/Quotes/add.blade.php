<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Add Quotes</title>
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
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Add Quotes</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <div id="kt_content_container" class="container-xxl">
                        <form class="form" action="{{ route('store-questions') }}" method="POST"
                            enctype="multipart/form-data">
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

                                    <!-- Question Input -->
                                    <div class="mb-3">
                                        <label for="question_text" class="form-label">Question:</label>
                                        <input type="text" class="form-control" id="question_text"
                                            name="question_text" value="{{ old('question_text') }}" required>
                                    </div>

                                    <!-- Answers Section (Repeater-Style) -->
                                    <div class="mb-3">
                                        <label class="form-label">Answers:</label>
                                        @php
                                            $oldAnswers = old('answers', ['']); // Default to one empty input
                                        @endphp
                                        @foreach ($oldAnswers as $index => $answer)
                                            <div class="mb-2">
                                                <input type="text" name="answers[]" class="form-control"
                                                    placeholder="Enter answer" value="{{ $answer }}" required>
                                            </div>
                                        @endforeach
                                    </div>



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
