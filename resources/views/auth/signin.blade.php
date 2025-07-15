<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- Page Title  -->
    <title>Login | {{ config('app.name') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.3') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.3') }}">
</head>

<body class="nk-body ui-rounder npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                @include('partials._response')
                                <div class="brand-logo pb-5">
                                    <a href="{{ url('/') }}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg"
                                            src="{{ asset('images/reclaim-logo.png') }}"
                                            srcset="{{ asset('images/reclaim-logo.png 2x') }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg"
                                            src="{{ asset('images/reclaim-logo.png') }}"
                                            srcset="{{ asset('images/reclaim-logo.png 2x') }}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the {{ config('app.name') }} panel using your Email and Password.
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="{{ route('auth-login') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>

                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" name="email"
                                                id="default-01" placeholder="Enter your email address">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">

                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="password"
                                                id="password" placeholder="Enter your password">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->



                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">

                                <div class="mt-3">
                                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.2.3') }}"></script>

</html>
