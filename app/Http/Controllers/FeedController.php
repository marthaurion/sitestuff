<?php namespace App\Http\Controllers;

use App\Article;
use Feed;

class FeedController extends Controller
{

    public function feed()
    {
        // create new feed
        $feed = Feed::make();

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(0, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached()) {
            // creating rss feed with our most recent 20 posts
            $posts = Article::latest('published_at')->published()->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = 'Marth\'s Totally Legit Example Feed';
            $feed->description = 'Does it work?';
            //$feed->logo = 'http://yoursite.tld/logo.jpg';
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $posts[0]->published_at;
            $feed->lang = 'en';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($posts as $post) {
                // set item's title, author, url, pubdate, description and content
                $feed->add($post->title, $post->author->username,
                    url('/articles', $post->slug), $post->published_at, null, $post->body);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }
}