<?php


namespace App\Repositories;
use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogPostRepository extends CoreRepository
{
   protected function getModelClass()
   {
       // TODO: Implement getModelClass() method.
       return Model::class;
   }

   public function getAllWithPaginate()
   {
       $fields = [
           'id',
           'title',
           'slug',
           'is_published',
           'published_at',
           'user_id',
           'category_id'
       ];

       $result = $this->startConditions()
           ->select($fields)
           ->orderBy('id','DESC')
           ->paginate(25);

       return $result;
   }


}
