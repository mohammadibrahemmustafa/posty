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
use App\Repository\PostRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository implements PostRepositoryInterface
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

    public function get()
    {
        return $this->model->latest()->with(['user','likes'])->paginate(20);
    }
}