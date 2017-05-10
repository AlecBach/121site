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
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{  URL::asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{  URL::asset('Remodal/dist/remodal.css') }}">
        <link rel="stylesheet" href="{{  URL::asset('Remodal/dist/remodal-default-theme.css') }}">
        @yield('css')
        
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#000000">

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
                    <div class="burger">
                        <div></div><div></div><div></div>
                    </div>
                    
                </div>
                
                
            </div> 
        </div>
        <div class="smallmenu">
            <div class="menu">
                <ul id="navList" class="navListScroll">
                    <li id="closeMenu"><div class="closeMenu"><div id="firstline"></div><div id="secondline"></div></div></li>
                    <a href="/"><li class="@if(Route::getCurrentRoute()->uri() == '/'){{'active'}}@endif">
                        <div id="logo" class="logoMobileNav">
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
                    </div>
                    </li></a>
                    <a href="/upcoming"><li class="{{ Request::is('upcoming*') ? 'active' : '' }}">UPCOMING</li></a>
                    <a href="/past"><li class="{{ Request::is('past*') ? 'active' : '' }}">PAST</li></a>
                    <a href="/artists"><li class="{{ Request::is('artists*') ? 'active' : '' }}">ARTISTS</li></a>
                </ul>
            </div>
            <div class="fader"></div>
        </div>
        <div class="remodal-bg">
        @yield('content')
        </div>
        <div class="remodal" data-remodal-id="contact">
          <button data-remodal-action="close" class="remodal-close"></button>
                    <form class="form-horizontal" id="contact" role="form" method="POST" action="/contact">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{ old('name') }}" name="name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{ old('email') }}" class="form-control" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="number" type="number" value="{{ old('number') }}" class="form-control" name="number">

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Message</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control" name="message" rows="5" required>{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin: 0 !important;">
                            <div class="col-sm-12">
                                <button type="submit" class="remodal-confirm">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
        <div class="remodal" data-remodal-id="contactSuccess">
          <button data-remodal-action="close" class="remodal-close"></button>
            <div class="col-sm-12">
                <div style="font-size: 1.5em;">Thanks!</div>We'll be in touch shortly.
            </div>
        </div>
        <div class="footer" id="floatingFooter">
            <div class="footerquarter" id="quarter1"></div><div class="footerquarter" id="quarter2"></div><div class="footerquarter" id="quarter3"></div><div class="footerquarter" id="quarter4"><a href="#contact"><i class="fa fa-envelope"></i></a></div>
        </div>
        <div class="footer" id="staticFooter">
            <div class="footerquarter" id="quarter1"></div><div class="footerquarter" id="quarter2"></div><div class="footerquarter" id="quarter3"></div><div class="footerquarter" id="quarter4"></div>
        </div>
        <div id="pageID">@yield('pageID')</div>
        <div id="getVH"></div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="{{ URL::asset('Remodal/dist/remodal.min.js') }}"></script>
        <script src="{{ URL::asset('galleria/galleria-1.5.6.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        @yield('js')
    </body>
</html>