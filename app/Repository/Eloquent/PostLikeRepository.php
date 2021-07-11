<?php
/**
 * Created by PhpStorm.
 * User: Bcc
 * Date: 7/11/2021.0011
 * Time: 06:59 م
 */

namespace App\Repository\Eloquent;


use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Repository\PostLikeRepositoryInterface;
use App\Repository\PostRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;

class PostLikeRepository extends BaseRepository implements PostLikeRepositoryInterface
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

    public function create(array $attributes)
    {
        Like::Create($attributes);
    }

    public function deleteUserPostLike($post)
    {
        $post->likes()->where('user_id', auth()->user()->id)->delete();
    }

}