<?php
namespace App\Repository\Blog;

interface BlogRepositoryInterface
{
    public function all();

    public function create($data);

    public function find($id);

    public function delete($id);

    public function update($id, array $data);

}
