<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogpostRequest;
use App\Http\Requests\UpdateBlogpostRequest;
use App\Models\Blogpost;
use App\Repositories\BlogpostRepository;

class BlogpostController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Blogpost::class, 'blogpost');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(BlogpostRepository $blogpostRepository)
    {
        $blogpostRepository->blogposts();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBlogpostRequest $createBlogpostRequest
     * @param BlogpostRepository $blogpostRepository
     * @return void
     */
    public function store(CreateBlogpostRequest $createBlogpostRequest, BlogpostRepository $blogpostRepository)
    {
        $blogpostRepository->create($createBlogpostRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param Blogpost $blogpost
     * @param BlogpostRepository $blogpostRepository
     * @return Blogpost
     */
    public function show(Blogpost $blogpost, BlogpostRepository $blogpostRepository): Blogpost
    {
         return $blogpostRepository->blogpost($blogpost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blogpost $blogpost
     * @return void
     */
    public function edit(Blogpost $blogpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateBlogpostRequest $updateBlogpostRequest
     * @param Blogpost $blogpost
     * @param BlogpostRepository $blogpostRepository
     * @return void
     */
    public function update(UpdateBlogpostRequest $updateBlogpostRequest, Blogpost $blogpost, BlogpostRepository $blogpostRepository)
    {
        $blogpostRepository->update($blogpost, $updateBlogpostRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blogpost $blogpost
     * @param BlogpostRepository $blogpostRepository
     * @return bool|null
     */
    public function destroy(Blogpost $blogpost, BlogpostRepository $blogpostRepository): ?bool
    {
        return $blogpostRepository->delete($blogpost);
    }
}
