<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/websaite#">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- ogp -->
        <meta property="og:title" content="TOP | yotaro.work" />
        <meta property="og:url" content="https://yotaro.work" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="yotaro_ok" />
        <meta property="og:description" content="WEBサービス制作会社勤務のSE＠渋谷 DMはお気軽にくださいウェーイ！ WEBデザイナー絶賛募集中です #駆け出しエンジニアと繋がりたい #駆け出しWEBデザイナーと繋がりたい" />
        <meta property="og:image" content="https://yotaro.work/images/skull.png" />
        <!-- twitter -->
        <meta name="twitter:title" content="TOP | yotaro.work">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@yotaro_ok">
        <meta name="twitter:creator" content="@yotaro_ok">
        <meta name="twitter:description" content="WEBサービス制作会社勤務のSE＠渋谷 DMはお気軽にくださいウェーイ！ WEBデ>ザイナー絶賛募集中です #駆け出しエンジニアと繋がりたい #駆け出しWEBデザイナーと繋がりたい">
        <meta name="twitter:image" content="https://yotaro.work/images/skull.png">

        <title>yotaro.work</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            a {
                text-decoration: none;
            }
            .blinking {
                -webkit-animation:blink 0.5s ease-in-out infinite alternate;
                -moz-animation:blink 0.5s ease-in-out infinite alternate;
                animation:blink 0.5s ease-in-out infinite alternate;
            }
            @-webkit-keyframes blink {
                0% {opacity:0;}
                100% {opacity:1;}
            }
            @-moz-keyframes blink {
                0% {opacity:0;}
                100% {opacity:1;}
            }
            @keyframes blink {
                0% {opacity:0;}
                100% {opacity:1;}
            }
        </style>
    </head>
    <body style="background-color: #000000; color: #ffffff">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <!-- div class="title m-b-md" -->
                <div>
                    <a class="blinking" style="color: #00ff00; font-size: 12px;" href="https://twitter.com/yotaro__ok">#yotaro__ok</a>
                </div>
            </div>
        </div>
    </body>
</html>
