<?php

namespace App\Http\Controllers;

use App\Service\TopWordsExtractor;
use FeedIo\Factory;

class HomeController extends Controller
{
    public function index(TopWordsExtractor $extractor)
    {
        $feedIo = Factory::create()->getFeedIo();

        $feed = $feedIo->read(env('FEED'))->getFeed();

        $topWords = $extractor->extract($feed);


        return view('home', compact('feed', 'topWords'));
    }
}
