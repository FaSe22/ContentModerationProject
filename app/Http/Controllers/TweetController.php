<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use App\Models\Tweet;
use App\Repositories\TweetRepository;

class TweetController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Tweet::class, 'tweet');
    }

    /**
     * Display a listing of the resource.
     * @param TweetRepository $tweetRepository
     */
    public function index(TweetRepository $tweetRepository)
    {
        $tweetRepository->tweets();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTweetRequest $createTweetRequest
     * @param TweetRepository $tweetRepository
     * @return void
     */
    public function store(CreateTweetRequest $createTweetRequest, TweetRepository $tweetRepository)
    {
        $tweetRepository->create($createTweetRequest);
    }

    /**
     * Display the specified resource.
     * @param Tweet $tweet
     * @param TweetRepository $tweetRepository
     * @return Tweet
     */
    public function show(Tweet $tweet, TweetRepository $tweetRepository): Tweet
    {
        return $tweetRepository->tweet($tweet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tweet $tweet
     * @return void
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateTweetRequest $updateTweetRequest
     * @param Tweet $tweet
     * @param TweetRepository $tweetRepository
     */
    public function update(UpdateTweetRequest $updateTweetRequest, Tweet $tweet, TweetRepository $tweetRepository)
    {
        $tweetRepository->update($tweet, $updateTweetRequest);
    }

    /**
     * Remove the specified resource from storage.
     * @param Tweet $tweet
     * @param TweetRepository $tweetRepository
     * @return bool
     */
    public function destroy(Tweet $tweet, TweetRepository $tweetRepository): bool
    {
        return $tweetRepository->delete($tweet);
    }
}
