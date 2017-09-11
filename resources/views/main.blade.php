<!doctype html>
<html lang="en">
@include('partials._head')
<body>


@include('partials._top')
<div class="container_forDel p-t-3">
    @include('partials._aside')

    @include('partials._panel')
</div>

@include('partials._footer')
@include('partials._javascript')

@yield('scripts')
</body>
</html>