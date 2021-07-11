<?php
/**
 * Created by PhpStorm.
 * User: Bcc
 * Date: 7/11/2021.0011
 * Time: 06:55 م
 */

namespace App\Repository\Eloquent;


use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     *
     * @return boolean
     */
    public function delete($model)
    {
        return $model->delete();
    }
}