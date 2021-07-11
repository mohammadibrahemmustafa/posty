<?php
/**
 * Created by PhpStorm.
 * User: Bcc
 * Date: 7/11/2021.0011
 * Time: 06:58 م
 */

namespace App\Repository;


use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all();

}