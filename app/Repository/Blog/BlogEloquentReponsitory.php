<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class BlogEloquentRepository extends BlogRepository implements BlogRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Blog::class;
    }





}
