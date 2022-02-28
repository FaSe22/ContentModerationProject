<?php

namespace App\Policies;

use App\Models\Blogpost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class BlogpostPolicy
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
        return Auth::check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Blogpost $blogpost
     * @return Response|bool
     */
    public function view(User $user, Blogpost $blogpost)
    {
        return Auth::check();
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
     * @param Blogpost $blogpost
     * @return Response|bool
     */
    public function update(User $user, Blogpost $blogpost)
    {
        return $user->id == $blogpost->user_id ?
            Response::allow() :
            Response::deny('You do not own this tweet');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Blogpost $blogpost
     * @return Response|bool
     */
    public function delete(User $user, Blogpost $blogpost)
    {
        return $user->id == $blogpost->user_id ?
            Response::allow() :
            Response::deny('You do not own this tweet');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Blogpost $blogpost
     * @return void
     */
    public function restore(User $user, Blogpost $blogpost)
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Blogpost $blogpost
     * @return Response|bool
     */

    public function forceDelete(User $user, Blogpost $blogpost)
    {
        //
    }
}
