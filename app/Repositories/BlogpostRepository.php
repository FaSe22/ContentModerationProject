<?php
/**
 * Class BlogpostRepository
 * @author Sebastian Faber <sebastian@startup-werk.de>
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Http\Requests\CreateBlogpostRequest;
use App\Http\Requests\UpdateBlogpostRequest;
use App\Models\Blogpost;
use Illuminate\Support\Facades\Auth;

class BlogpostRepository
{
    /**
     * Return all entries from Blogposts table
     * @return mixed
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function blogposts()
    {
        return Blogpost::get();
    }

    /**
     * return a single Blogpost
     * @param Blogpost $blogpost
     * @return Blogpost
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function blogpost(Blogpost $blogpost): Blogpost
    {
        return $blogpost;
    }

    /**
     * create a new entry in Blogposts table
     * @param CreateBlogpostRequest $createBlogpostRequest
     * @return mixed
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function create(CreateBlogpostRequest $createBlogpostRequest)
    {
        return Blogpost::create($createBlogpostRequest->validated()+ ['user_id'=> Auth::id()]);
    }

    /**
     * update an existing entry in Blogposts table
     * @param Blogpost $blogpost
     * @param UpdateBlogpostRequest $updateBlogpostRequest
     * @return bool
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function update(Blogpost $blogpost, UpdateBlogpostRequest $updateBlogpostRequest): bool
    {
        return $blogpost->update($updateBlogpostRequest->validated());
    }


    /**
     * delete entry from Blogposts table
     * @param Blogpost $blogpost
     * @return bool|null
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function delete(Blogpost $blogpost): ?bool
    {
        return $blogpost->delete();
    }

}