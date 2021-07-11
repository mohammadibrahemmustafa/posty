<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repository\PostLikeRepositoryInterface;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    private $postLikeRepository;

    function __construct(PostLikeRepositoryInterface $postLikeRepository)
    {
        $this->postLikeRepository = $postLikeRepository;
        $this->middleware('auth');
    }

    //
    public function store(Post $post, Request $request)
    {
        $this->postLikeRepository->create(
            [
                'post_id' => $post->id,
                'user_id' => auth()->user()->id
            ]
        );

        return redirect()->back();
    }

    //
    public function destroy(Post $post)
    {
        $this->postLikeRepository->deleteUserPostLike($post);

        return redirect()->back();
    }
}