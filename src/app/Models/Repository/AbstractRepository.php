<?php


namespace App\Models\Repository;


use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function save(Model $model): void
    {
        $model->save();
    }
}
