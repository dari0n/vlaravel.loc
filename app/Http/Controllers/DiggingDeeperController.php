<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function foo\func;

class DiggingDeeperController extends Controller
{
    /**
     * Базовая информация:
     * @url https://laravel.com/docs/5.8/collections
     *
     * Справочная информация
     * @url https://laravel.com/5.8/Illuminate/Support/Collection.html
     *
     * Вариант коллекции для моделей
     * @url https://laravel.com/api/5.8/Illuminate/Database/Eloquent/Collection.html
     *
     * Билдер запросов
     * @url https://laravel.com/docs/5.8/queries
     */
    public function collections()
    {

        $result = [];

        /**
         * @var \Illuminate\Database\Eloquent\Collection $eloquentCollection
         */
        //withTrashed - все записи (с удаленными)
        //onlyTrashed - только удаленные
        $eloquentCollection = BlogPost::withTrashed()->get();
        $collection = collect($eloquentCollection->toArray());


        //$result['first'] = $collection->first();
        //$result['last'] = $collection->last();


        /**
         * все посты категория которых равноа 10
         */
        /*$result['where']['data'] = $collection
            ->where('category_id',10)
            ->values() //взять значения, ключи массива с 0 и т.д.
            ->keyBy('id'); //назначить ключам значение равное id записи
        */
        //===============================================//
        /**
         * все посты, в которых id автора равно 1
         */
        /*$result['where']['data'] = $collection
            ->where('user_id',1)
            ->values()
            ->keyBy('id');*/

        /**
         * Количество постов, в которых id автора равно 1
         */
        /*$result['posts']['count'] = $collection
            ->where('user_id',1)
            ->count();*/

        /**
         * Количество опубликованныз постов
         */
        /*$result['count'] = $collection
            ->where('is_published',1)
            ->count();*/

        /**
         * isEmpty|isNotEmpty
         */
        /*if($collection->isEmpty())
        {
            //...//
        }*/


        /*$result['where_first'] = $collection
            ->firstWhere('created_at','>','2019-10-1 13:04.51');*/


        /**
         * Изменение возвращаемой коллекции, при этом $collection не изменится.
         * Просто вернутся измененные данные
         * В общем создается другая структура возвращаемых данных
         */
        /*$result['map']['all'] = $collection
            ->map(function (array $item){
                $newItem = new \stdClass();
                $newItem->item_id = $item['id'];
                $newItem->item_name = $item['title'];
                $newItem->exists = is_null($item['deleted_at']);
                return $newItem;
            });

        /**
         * Возвращает удаленные записи (deleted_at false) из новой колелкции stdClass
         */
        /*$result['map']['not_exist'] = $result['map']['all']->where('exists','=',false);*/
        /**
         * Преобразует коллекцию в нужный вид
         */
        /*$collection->transform(function (array $item){
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            $newItem->created_at = Carbon::parse($item['created_at']);
            return $newItem;
        });*/
        /**
         * @var newItemFirst Поместить newItem а начало коллекции
         * @var newItemLast Поместить $newItem2 в конец коллекции
         * @var pulledItem Забрать элемент с коллекции с ключом 1, при этом элемент с коллекции удаляется
         */
        /*$newItem = new \stdClass(); //обьявить newItem коллекцией
        $newItem2 = new \stdClass();
        $newItem->id = 12049;
        $newItem2->id = 19033;
        $newItemFirst = $collection->prepend($newItem)->first();
        $newItemLast = $collection->push($newItem2)->last();
        $pulledItem = $collection->pull(1);*/

        /**
         * Фильтрация (orWhere)
         */

        /*$filtered = $eloquentCollection->filter(function ($item){

            $byDay = $item->created_at->isFriday(); //Только пятницы
            $byDate = $item->created_at->day == 8; // Только 8 число
            $result = $byDay && $byDate;
            return $result;
        });*/

        /*
         * Сортировка
         */
        //Если указать key, то сортировка по ключу, иначе по значениям
        /*$sortedSimpleCollection = collect([5,3,2,1,3,4,5,1,2])->sortBy('key');
        $sortedAscCollection = $collection->sortBy('created_at');
        $sortedDescCollection = $collection->sortByDesc('created_at');*/

        dd($sortedSimpleCollection);
    }
}
