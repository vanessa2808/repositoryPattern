<?php

namespace App\Repository;

abstract class BlogRepository implements RepositoryInterface
{

    protected $_blog;


    public function __construct()  {
        $this->setModel();
    }

    public function getModel()
    {
        return \App\Models\Blog::class;

    }
    public function setModel()
    {
        $this->_blog = app()->make(
            $this->getModel()
        );
    }


    public function getAllBlog()
    {

        return $this->_blog->all();
    }


    public function getBlogById($id)
    {
        $idBlog = $this->_blog->find($id);

        return $idBlog;
    }


    public function addBlog(array $attributes)
    {

        return $this->_blog->create($attributes);
    }


    public function updateBlog($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }


    public function deleteBlog($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

}
