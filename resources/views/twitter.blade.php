<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/websaite#">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- ogp -->
        <meta property="og:title" content="ついったーりせったー | yotaro.work" />
        <meta property="og:url" content="https://yotaro.work/twitterresetter" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="ついったーりせったー" />
        <meta property="og:description" content="ツイート、リツイート、いいねを一括削除します" />
        <meta property="og:image" content="https://yotaro.work/images/TwitterResetter.png" />
        <!-- twitter -->
        <meta name="twitter:title" content="ついったーりせったー | yotaro.work">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@yotaro_ok">
        <meta name="twitter:creator" content="@yotaro_ok">
        <meta name="twitter:description" content="ツイート、リツイート、いいねを一括削除します">
        <meta name="twitter:image" content="https://yotaro.work/images/TwitterResetter.png">

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
        </style>
    </head>
    <body style="background-color: #ffffff; color: #000000">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <span class="title"><small>ついったー<br>りせったー</small></span>
                <br>
                <br>
                <br>
                <br>
                <form method="post" action="{{ $actionUrl }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">{{ $buttonLabel }}</button>
                    @isset($oauth_token)
                    <input type="hidden" name="oauth_token" value="{{ $oauth_token }}">
                    <input type="hidden" name="oauth_token_secret" value="{{ $oauth_token_secret }}">
                    @endisset
                </form>
            </div>
        </div>
    </body>
</html>
