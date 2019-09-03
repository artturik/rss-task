<?php

namespace App\Http\Controllers;

use FeedIo\Factory;

class HomeController extends Controller
{
    public function index()
    {
        $feedIo = Factory::create()->getFeedIo();

        $feed = $feedIo->read(env('FEED'))->getFeed();

        return view('home', compact('feed'));
    }
}
