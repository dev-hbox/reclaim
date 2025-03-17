<meta charset="utf-8" />
<meta name="description" content="Fit Fab" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Fit Fab" />
<meta property="og:url" content="https://keenthemes.com/metronic" />
<meta property="og:site_name" content="Fit Fab" />
<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{ asset('assets/media/logos/fav.png') }}" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<style>
    .progress_gallery {
        display: none !important;
    }

    .progress_display_block {
        display: block !important;
    }

    svg.svg_custom_icon {
        height: 16px;
        margin-right: 3px;
        fill: #b5b5c3 !important;
    }

    span.small-txt {
        font-size: 14px;
        letter-spacing: 0px;
        font-weight: 400;
        color: #000000;
    }

    #cardio-description {
        display: none;
    }

    .color_code_bg {
        width: auto;
        height: 20px;
        margin-top: 4px;
    }

    ul.exercise_days {
        justify-content: space-evenly !important;
    }

    .text-color-code {
        border: 0px !important;
        height: 40px !important;
    }

    .card-workput-image img {
        border-radius: 0px !important;
        width: auto !important;
    }

    video.exercise_media {
        width: 100% !important;
    }

    /* input.kt_ecommerce_add_product_discount_label_percentage {
        border: 0px;
        font-size: 2rem !important;
        font-weight: 600 !important;
    } */
    .product_option {
        width: 50%;
        margin-left: 30px;
    }

    .card-header.for_one_attribute,
    .card-body.pt-0.for_one_attribute {
        display: none;
    }

    a.not-allowed {
        opacity: 0.5;
    }

    a.not-allowed:hover {
        cursor: not-allowed;
    }

    img.progress-img {
        width: 100%;
    }
</style>

<script>
    var options = {
        selector: "#kt_docs_tinymce_basic",
        height: "500"
    };
    tinymce.init(options);
</script>
