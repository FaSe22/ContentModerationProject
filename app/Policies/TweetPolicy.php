<?php

namespace App\Policies;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class TweetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return Response|bool
     */
    public function view(User $user, Tweet $tweet)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return Response
     */
    public function update(User $user, Tweet $tweet): Response
    {
        return $user->id == $tweet->user_id ?
            Response::allow() :
            Response::deny('You do not own this tweet');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return Response|bool
     */
    public function delete(User $user, Tweet $tweet)
    {
        return $user->id == $tweet->user_id ?
            Response::allow() :
            Response::deny('You do not own this tweet');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return Response|bool
     */
    public function restore(User $user, Tweet $tweet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Tweet $tweet
     * @return Response|bool
     */
    public function forceDelete(User $user, Tweet $tweet)
    {
        //
    }
}
