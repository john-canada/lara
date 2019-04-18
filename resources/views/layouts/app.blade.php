<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
        <script src="https://js.stripe.com/v3/"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
                  @media screen and (max-width: 767px) {
                    .custom-menu{
                       display: none;
                     }
                   }

                        .menubutton{
                            word-break: break-all;           
                            font-family: raleway;
                            border: 3px solid gold;
                            width: 55px!important;
                            height: 55px!important;
                            font-size: 23px!important;
                            line-height: .75!important;
                            padding: 0px!important;
                            border-radius: 7px;
                            color:#grey;
                            /* background: orange!important; */
                            position: relative;
                            -webkit-animation: mymove 5s infinite; /* Safari 4.0 - 8.0 */
                            animation: mymove 5s infinite;
                        }

                        /* Safari 4.0 - 8.0*/
                        @-webkit-keyframes mymove {
                            0%   {top: 0px; left: 0px; background:skyblue;}
                            50% {top: 0px; left: 0px; background:#3490dc;}
                            100% {top: 0px; left: 0px; background:skyblue;}
                        } 

             
                        /* Standard syntax */
                        @keyframes mymove {
                            0% {top: 0px; left: 0px; background:skyblue;}
                           50% {top: 0px; left: 0px; background:#3490dc;} 
                           100% {top: 0px; left: 0px; background:skyblue;}
                      
                        }

                  

                    /* rotate */
                    .loader {
                        border: 6px solid #f3f3f3;
                        border-radius: 50%;
                        border-top: 6px solid #3498db;
                        border-bottom: 6px solid red;
                        width: 50px;
                        height: 50px;
                        -webkit-animation: spin 3s linear infinite; /* Safari */
                        animation: spin 3s linear infinite;
                        margin:0 auto;
                        cursor:pointer;
                        margin-top:20px;
                    }

                    /* Safari */
                    @-webkit-keyframes spin {
                    0% { -webkit-transform: rotate(0deg); }
                    100% { -webkit-transform: rotate(360deg); }
                    }

                    @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                    }

                    /*end rotate*/

                    /**
            * The CSS shown here will not be introduced in the Quickstart guide, but shows
            * how you can use CSS to style your Element's container.
            */

            .navbar-nav .nav-link {
                  text-align:center;
                }

            /* .form-control{
                border: 1px solid #444!important;
            } */

            .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid #444;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            width:25vw!important;
            }

            .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
            border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
            }

    </style>    
 @yield('stylesheet')
 

</head>
<body>
        @include('inc/nav')
        <div class="container"> 
            @yield('content')
       </div>
       @yield('scripts-stripe')
       @yield('script')

       <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
    async defer></script>

     <!--ckeditor library -->
 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
 <script>
     CKEDITOR.replace( 'article-ckeditor' );
 </script>
 <hr>

    <footer  style="text-align:center">
            {{__('Copyright 2019 by John Canada - All rights reserved')}}
     </footer> 
 
    <div class="loader">
            {{-- <img width="80" height="80" src="/storage/images/rotate-img.jpg">   --}}
    </div>  
           
</body>
</html>
