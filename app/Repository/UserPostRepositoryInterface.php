<?php
/**
 * Created by PhpStorm.
 * User: Bcc
 * Date: 7/11/2021.0011
 * Time: 06:58 م
 */

namespace App\Repository;


use App\Models\User;
use Illuminate\Support\Collection;

interface UserPostRepositoryInterface
{
    public function getUserPosts(User $user);
}