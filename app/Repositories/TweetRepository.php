<?php
/**
 * Class TweetRepository
 * @author Sebastian Faber <sebastian@startup-werk.de>
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Http\Requests\CreateTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetRepository
{

    /**
     * Return all entries from tweets table
     * @return mixed
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function tweets()
    {
        return Tweet::get();
    }

    /**
     * return a single tweet
     * @param Tweet $tweet
     * @return Tweet
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function tweet(Tweet $tweet): Tweet
    {
        return $tweet;
    }

    /**
     * create a new entry in tweets table
     * @param CreateTweetRequest $createTweetRequest
     * @return mixed
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function create(CreateTweetRequest $createTweetRequest)
    {
        return Tweet::create($createTweetRequest->validated()+ ['user_id'=> Auth::id()]);
    }

    /**
     * update an existing entry in tweets table
     * @param Tweet $tweet
     * @param UpdateTweetRequest $updateTweetRequest
     * @return bool
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function update(Tweet $tweet, UpdateTweetRequest $updateTweetRequest): bool
    {
        return $tweet->update($updateTweetRequest->validated());
    }


    /**
     * delete entry from tweets table
     * @param Tweet $tweet
     * @return bool|null
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function delete(Tweet $tweet): ?bool
    {
        return $tweet->delete();
    }


}