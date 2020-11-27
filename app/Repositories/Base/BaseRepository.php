<?php
namespace App\Repositories\Base;

class BaseRepository implements BaseInterface 
{
    
    protected $model;
    
    public function all()
    {
        return $this->model->all();
    }

    public function get()
    {
        return $this->model->get();
    }

    public function count()
    {
        return $this->model->get()->count();
    }

    public function first()
    {
        return $this->model->first();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function limit($limit)
    {

    }

    public function orderBy($column, $value)
    {

    }

    public function update($id, array $data)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function where($column, $value, $operator = '=')
    {

    }

    public function whereIn($column, $value)
    {
        return $this->model->whereIn($column, $value);
    }

    public function with($relations)
    {

    }
}