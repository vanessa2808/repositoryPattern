<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function getAllBlog();

    public function getBlogById($id);

    public function addBlog($request);

    public function updateBlog($id, array $attributes);

    public function deleteBlog($id);
}

