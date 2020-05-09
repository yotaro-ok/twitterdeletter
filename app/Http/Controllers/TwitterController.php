<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Exception;

class TwitterController extends Controller
{
    //
    public function index(Request $request) {
        return view('twitter')->with(['buttonLabel' => '認証', 'actionUrl' => '/twitterresetter/authenticate']);
    }

    public function authenticate(Request $request)
    {
        $twitter = new TwitterOAuth(
            config('twitter.api_key'),
            config('twitter.secret_key')
        );

        $token = $twitter->oauth('oauth/request_token', array(
            'oauth_callback' => config('twitter.call_back_url')
        ));

        session(array(
            'oauth_token' => $token['oauth_token'],
            'oauth_token_secret' => $token['oauth_token_secret'],
        ));

        $url = $twitter->url('oauth/authenticate', array(
            'oauth_token' => $token['oauth_token']
        ));

        return redirect($url);
    }

    public function callback(Request $request)
    {
        try {
        $oauth_token = session('oauth_token');
        $oauth_token_secret = session('oauth_token_secret');

        if ($request->has('oauth_token') && $oauth_token !== $request->oauth_token) {
            return view('twitter')->with(['buttonLabel' => 'もう１回', 'actionUrl' => '/twitterresetter/authenticate']);
        }

        $twitter = new TwitterOAuth(
            $oauth_token,
            $oauth_token_secret
        );
        $token = $twitter->oauth('oauth/access_token', array(
            'oauth_verifier' => $request->oauth_verifier,
            'oauth_token' => $request->oauth_token,
        ));

        $twitter_user = new TwitterOAuth(
            config('twitter.api_key'),
            config('twitter.secret_key'),
            $token['oauth_token'],
            $token['oauth_token_secret']
        );

        $twitter_user_info = $twitter_user->get('account/verify_credentials');
        return view('twitter')
                ->with([
                    'buttonLabel' => 'リセット',
                    'actionUrl' => '/twitterresetter/reset',
                    'oauth_token' => $token['oauth_token'],
                    'oauth_token_secret' => $token['oauth_token_secret'],
                ]);
        } catch(Exception $e) {
            return view('twitter')->with(['buttonLabel' => '認証', 'actionUrl' => '/twitterresetter/authenticate']);
        } 
    }

    public function reset(Request $request)
    {
        $twitter_user = new TwitterOAuth(
            config('twitter.api_key'),
            config('twitter.secret_key'),
            $request['oauth_token'],
            $request['oauth_token_secret']
        );

        do {
            $tweets = $twitter_user->get('statuses/user_timeline');
            foreach ($tweets as $tweet) {
                $twitter_user->post('statuses/destroy', ['id' => $tweet->id]);
            }
        } while (count($tweets) > 0);

        do {
            $favorites = $twitter_user->get('favorites/list');
            foreach ($favorites as $favorite) {
                $twitter_user->post('favorites/destroy', ['id' => $favorite->id]);
            }
        } while (count($favorites) > 0);

        return view('twitter')->with(['buttonLabel' => '認証解除', 'actionUrl' => 'https://twitter.com/settings/applications']);
    }
}
