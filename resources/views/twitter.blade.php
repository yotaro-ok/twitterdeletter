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
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body style="background-color: #ffffff; color: #000000">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h2>ついったーりせったー</h2>
                <br>
                <br>
                <form method="post" action="{{ $actionUrl }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonLabel }}</button>
                    @isset($oauth_token)
                    <input type="hidden" name="oauth_token" value="{{ $oauth_token }}">
                    <input type="hidden" name="oauth_token_secret" value="{{ $oauth_token_secret }}">
                    @endisset
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
