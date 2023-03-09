<!DOCTYPE html>
<!--
Author: Jardarrius Hawkins
Product Name: Laravel Livewire w External Api Endpoints
Website: http://www.itssimplescience.com
Contact: itssimplescience@gmail.com
-->
<html lang="en">
<!--begin::Head-->

<head>

    {{-- SEO START --}}
    <title>@yield('title')</title>
    {{-- <base href=""> --}}
    <link rel="canonical" href=""/>

    {{-- SEO END --}}
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->

    <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <!--end::Head-->
    {{-- </base> --}}
    <livewire:styles/>

    @yield('style')
</head>
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
      data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

@yield('header')
@yield('leftsidebar')

@include('.dashboard.layout.partials._page-loader')

@yield('body')
@yield('footer')

@yield('script')
<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<livewire:scripts/>

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
