<!-- head -->
<!DOCTYPE html>
@include('Back.Partial.BackHead')

<body {{--class="sidebar-mini"--}}>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- nav -->
            @include('Back.Partial.BackNav')
            <!-- sidebar -->
            @include('Back.Partial.BackSidebar')

            <!-- Main Content -->
            @yield('_containerOfContents')
            @include('Back.Partial.BackFooter')
        </div>
    </div>
</body>

</html>