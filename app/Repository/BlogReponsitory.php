<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{

    protected $_blog;


    public function __construct()
    {
        $this->setModel();
    }


    abstract public function getModel();

    public function setModel()
    {
        $this->_blog = app()->make(
            $this->getModel()
        );
    }


    public function getAll()
    {

        return $this->_blog->all();
    }


    public function find($id)
    {
        $result = $this->_blog->find($id);

        return $result;
    }


    public function create(array $attributes)
    {

        return $this->_blog->create($attributes);
    }


    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }


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
