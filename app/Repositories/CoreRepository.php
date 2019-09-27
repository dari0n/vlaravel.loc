<?php


namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    protected $model;
    //Присваеваем свойству $model текущюю модель
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    //Получаем текущую модель в репозитории, указывается в USE Репозитория
    abstract protected function getModelClass();

    //Возвращаем текущую модель в репозиторий
    protected function startConditions()
    {
        return clone $this->model;
    }
}
