<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repository\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->middleware(['auth'])->except(['index']);
    }
    //
    public function index()
    {
        $posts = $this->postRepository->get();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
        $this->postRepository->create(
            [
                'body' => $request->body,
                'user_id' => auth()->user()->id
            ]
        );

        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $this->postRepository->delete($post);
        return redirect()->back();
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }
}
