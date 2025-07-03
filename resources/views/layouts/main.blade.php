<!DOCTYPE html>
<html lang="zxx" class="js">
@include('partials._headerlinks')

<body class="nk-body ui-rounder has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            @include('partials._sidebar')

            <!-- wrap @s -->
            <div class="nk-wrap ">
                @include('partials._header')
                @yield('content')
                @include('partials._footer')
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    @include('partials._modal')
    @include('partials._footerlinks')
</body>

</html>
