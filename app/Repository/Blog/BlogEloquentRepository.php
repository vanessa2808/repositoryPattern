<?php

namespace App\Repository\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

use App\Repository\Blog\BlogRepositoryInterface;

public class BlogEloquentRepository implements BlogRepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }
    public function model()
    {
        return \App\Models\Blog::class;
    }


    /**
     * get model
     * @return string
     */

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create( array $attributes)
    {
        $newBlog = new blog();
        $newBlog->title = $request->title;
        $newBlog->description = $request->description;
        $newBlog->created_at = Carbon::now();

        if(!$newBlog->save()){
            return self::RETURN_STR_ZERO;
        }
        return $newBlog;
    }
    public function addNewBlog($request){
        $newBlog = new blog();
        $newBlog->title = $request->title;
        $newBlog->description = $request->description;
        $newBlog->created_at = Carbon::now();

        if(!$newBlog->save()){
            return self::RETURN_STR_ZERO;
        }
        return $newBlog;

    }
    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

}
