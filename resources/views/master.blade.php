<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>121 - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{  URL::asset('css/app.css') }}">
        
    </head>
    <body>
        <div id="navBar" class="navScrolled static">
            <div class="center">
                <a href="/"><div id="logo" class="logoScrolled">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 1000 820" style="enable-background:new 0 0 1000 820;" xml:space="preserve">
                    <style type="text/css">
                        .st0{stroke:#000000;stroke-width:60;stroke-miterlimit:10;}
                    </style>
                    <path d="M210.4,816.6L4.6,5.5h110.7l96.3,410.3C235.7,517,257.4,618,271.8,696.3h2.4c13.2-80.6,38.5-176.9,66.2-281.6L448.7,5.5
                        h109.5l98.7,411.5c22.9,96.3,44.5,192.5,56.6,278h2.4c16.8-89,39.7-179.3,65-280.4L887.9,5.5H995L765.2,816.6H655.7L553.4,394.2
                        c-25.3-103.5-42.1-182.9-52.9-264.7H498c-14.4,80.6-32.5,160-62.6,264.7L319.9,816.6H210.4z"/>
                    <line class="st0" x1="5" y1="335.3" x2="993.5" y2="335.3"/>
                    <line class="st0" x1="6.1" y1="462.8" x2="994.6" y2="462.8"/>
                    </svg>
                </div></a>
                <div id="nav">
                    <ul>
                        <li><a href="/upcoming" class="{{ Request::is('upcoming*') ? 'active' : '' }}">UPCOMING</a></li>
                        <li><a href="/past" class="{{ Request::is('past*') ? 'active' : '' }}">PAST</a></li>
                        <li><a href="/artists" class="{{ Request::is('artists*') ? 'active' : '' }}">ARTISTS</a></li>
                    </ul>
                </div>
            </div> 
        </div>

        @yield('content')

        <div class="footer" id="floatingFooter">
            <div class="footerquarter" id="quarter1"></div><div class="footerquarter" id="quarter2"></div><div class="footerquarter" id="quarter3"></div><div class="footerquarter" id="quarter4"><a href=""><i class="fa fa-envelope"></i></a></div>
        </div>
        <div class="footer" id="staticFooter">
            <div class="footerquarter" id="quarter1"></div><div class="footerquarter" id="quarter2"></div><div class="footerquarter" id="quarter3"></div><div class="footerquarter" id="quarter4"></div>
        </div>
        <div id="pageID">@yield('pageID')</div>
        <div id="getVH"></div>
        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>