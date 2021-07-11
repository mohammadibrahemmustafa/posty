<?php
/**
 * Created by PhpStorm.
 * User: Bcc
 * Date: 7/11/2021.0011
 * Time: 06:59 م
 */

namespace App\Repository\Eloquent;


use App\Models\Post;
use App\Models\User;
use App\Repository\UserPostRepositoryInterface;

class UserPostRepository extends BaseRepository implements UserPostRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getUserPosts(User $user)
    {
        return $user->posts()->latest()->with(['user','likes'])->paginate(20);
    }
}