<?php
namespace App\Repositories\Post;

use App\Models\Blog;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class BlogEloquentRepository extends BlogRepository implements BlogRepositoryInterface
{

    public function all()
    {
        return Blog::all();
    }

    public function create($data)
    {
        return Blog::create($data);
    }

    public function find($id)
    {
        return Blog::find($id);
    }

    public function delete($id)
    {
        return Blog::destroy($id);
    }

    public function update($id, array $data)
    {
        return Blog::find($id)->update($data);
    }





}
