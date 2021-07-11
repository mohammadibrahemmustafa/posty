<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Repository\UserPostRepositoryInterface;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    private $userPostRepository;

    public function __construct(UserPostRepositoryInterface $userPostRepository)
    {
        $this->userPostRepository = $userPostRepository;
    }

    //
    public function index(User $user)
    {
        $posts = $this->userPostRepository->getUserPosts($user);
        return view('users.posts.index', [
            'posts' => $posts,
            'user' => $user
        ]);
    }
}
