<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('layout.admin.head')


</head>

<body>

    @include('layout.admin.header')

    @include('layout.admin.sidebar')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@yield('page-title')</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                @yield('content')

            </div>
        </section>

    </main><!-- End #main -->

    {{-- @include('layout.admin.footer') --}}


    @include('layout.admin.footer_script')

</body>

</html>
