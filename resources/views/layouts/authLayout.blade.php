<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- General CSS Files --}}
    <link rel="stylesheet" href="{{asset('/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/modules/fontawesome/css/all.min.css')}}">
    {{-- CSS Libraries --}}
    <link rel="stylesheet" href="{{asset('/assets/modules/bootstrap-social/bootstrap-social.css')}}">
    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <section class="section">
            @yield('_containerOfContents')
        </section>
    </div>
</body>

</html>