<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Questionnaire</title>
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
                                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Questionnaire</h1>
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
                        <!--begin::Engage widget 4-->
                        <div class="row">
                            @foreach ($questions as $item)
                                <div class="col-lg-6">
                                    <div class="card mb-4 shadow-sm border-0"
                                        style="background: #e2e2e2;  border-radius: 10px;">
                                        <div class="card-body">
                                            <!-- Question Title -->
                                            <h5 class="fw-bold mb-3">{{ $item->question_text ?? '' }}</h5>

                                            <!-- Answers in Bullet List -->
                                            <ul class="list-group">
                                                @foreach ($item->answers as $answer)
                                                    <li class="list-group-item" style="border: none">
                                                        {{ $answer->answer_text ?? '' }}
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <!-- Edit & Delete Buttons -->
                                            <div class="mt-3">
                                                <a href="/admin/question-edit/{{ $item->id }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <a href="/admin/question-delete/{{ $item->id }}"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
    @include('global.footer-links')
</body>

</html>
