<?php
namespace App\Repositories\Base;

interface BaseInterface 
{
    public function all();
    public function get();
    public function count();
    public function first();
    public function find($id);
    public function create(array $data);
    public function limit($limit);
	public function orderBy($column, $value);
	public function update($id, array $data);
    public function delete($id);
    public function where($column, $value, $operator = '=');
	public function whereIn($column, $value);
	public function with($relations);
}