<?php


namespace App\Repositories;
use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends CoreRepository
{
    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Список категорий для вывода в списке <select>
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        //return $this->startConditions()->all();
        $fields = implode(',',[
           'id',
           'CONCAT (id,". ",title) AS title',
        ]);
        /*
       $result[] = $this->startConditions()->all();

       $result[] = $this->startConditions()
           ->select('blog_categories.*', \DB::raw('CONCAT (id,". ",title) AS title'))
           ->toBase()
           ->get();
        */
       $result = $this->startConditions()
           ->selectRaw($fields)
           ->toBase()
           ->get();

        return $result;
   }

   protected function getModelClass()
   {
       return Model::class;
   }

   /**
    * Получить категории для вывода пагинатором
    * @param int|null $perPage
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id','title','parent_id'];

        $result = $this->startConditions()
            ->select($columns)
            ->with([
                'parentCategory:id,title'
            ])
            ->paginate($perPage);

        return $result;
    }

}
