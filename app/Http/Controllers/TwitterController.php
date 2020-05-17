<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Exception;

class TwitterController extends Controller
{
    //
    public function index(Request $request) {
        try {
            return view('twitter')
                    ->with([
                        'buttonLabel' => '認証',
                        'btnColor' => 'btn-outline-primary',
                        'actionUrl' => '/authenticate',
                    ]);
        } catch(Exception $e) {
            abort(500);
        } 
    }

    public function authenticate(Request $request)
    {
        try {
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
        } catch(Exception $e) {
            abort(500);
        } 
    }

    public function callback(Request $request)
    {
        try {
            $oauth_token = session('oauth_token');
            $oauth_token_secret = session('oauth_token_secret');

            if ($request->has('oauth_token') and $oauth_token !== $request->oauth_token) {
                abort(500);
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
                        'btnColor' => 'btn-outline-danger',
                        'actionUrl' => '/reset',
                        'oauth_token' => $token['oauth_token'],
                        'oauth_token_secret' => $token['oauth_token_secret'],
                    ]);
        } catch(Exception $e) {
            return view('twitter')
                    ->with([
                        'buttonLabel' => '認証',
                        'btnColor' => 'btn-outline-primary',
                        'actionUrl' => '/authenticate',
                    ]);
        } 
    }

    public function reset(Request $request)
    {
        try {
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

            return view('twitter')
                    ->with([
                        'buttonLabel' => '認証解除',
                        'btnColor' => 'btn-outline-success',
                        'actionUrl' => 'https://twitter.com/settings/applications',
                    ]);
        } catch(Exception $e) {
            abort(500);
        } 
    }
}
