<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <title>Angular JS</title>
        {!! HTML::style('css/bootstrap.css') !!}
        {!! HTML::style('css/font-awesome.css') !!}

        @yield('css')

        @yield('topscript')
    </head>
<body>
    @yield('content')

    @yield('navs.footer')
    {!! HTML::script('jquery-2.2.1.js') !!}
    {!! HTML::script('js/bootstrap.js') !!}
    {!! HTML::script('angular.js') !!}
    @yield('script')
</body>
</html>