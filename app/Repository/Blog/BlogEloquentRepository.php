<?php

namespace App\Repository;

use App\Repository\EloquentRepository;


class BlogEloquentRepository extends EloquentRepository implements BlogRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Blog::class;
    }

}
