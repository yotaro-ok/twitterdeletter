<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/websaite#">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- ogp -->
        <meta property="og:title" content="ついったーりせったー | yotaro.work" />
        <meta property="og:url" content="https://twitterresetter.yotaro.work" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="ついったーりせったー" />
        <meta property="og:description" content="ツイート、リツイート、いいねを一括削除します。Delete all tweets, retweets and likes at once." />
        <meta property="og:image" content="{{ asset('/images/twitter_resetter.png') }}" />
        <!-- twitter -->
        <meta name="twitter:title" content="ついったーりせったー | yotaro.work" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@yotaro_ok" />
        <meta name="twitter:creator" content="@yotaro_ok" />
        <meta name="twitter:description" content="ツイート、リツイート、いいねを一括削除します。Delete all tweets, retweets and likes at once." />
        <meta name="twitter:image" content="{{ asset('/images/twitter_resetter.png') }}" />

        <title>ついったーりせったー | yotaro.work</title>

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

            .dementor {
                background: 
                    linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%),
                    linear-gradient(to top, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.25) 200%);
                background-blend-mode: multiply;
                color: #ffffff;
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
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166803691-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-166803691-1');
        </script>
    </head>
    <body class="dementor">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h2>ついったーりせったー</h2>
                <h5>Twitter Resetter</h5>
                <br>
                <form method="post" action="{{ $actionUrl }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonLabel }}</button>
                    @isset($oauth_token)
                    <input type="hidden" name="oauth_token" value="{{ $oauth_token }}">
                    <input type="hidden" name="oauth_token_secret" value="{{ $oauth_token_secret }}">
                    @endisset
                </form>
		</br>
		<div><p style="color: #FF0000"><small>本サービスをご利用の際は、</br>「すべて自己責任に於いてのご利用」</br>とさせて頂きます。</small></p></div>
		<div><p style="color: #FF0000"><small>When you use this web service, you do so at your own risk.</small></p></div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
