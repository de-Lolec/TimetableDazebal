<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
//use Illuminate\Contracts\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */

class TimetableRepository extends CoreRepository
{
    /*
     * @return string
     */

    protected function getModelClass()
    {
        return Model::class;
    }
    /**
     * Получить список статей для вывода в списке
     * (Админка)
     *
     * @return LengthAwarePaginator
     */

    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
            'excerpt',
        ];

        //startConditions у нас создается экземпляр класса BlogPost

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                //можно так
                'category' => function ($query){
                    $query->select(['id', 'title']);
                },
                //или так
                'user:id,name',
            ])
            ->paginate(25);
        //dd();
        return $result;
    }

    /**
     * Получить модель для редактирования в админке
     *
     * Я нихуя не понял, надо разобраться, что то типо клонирования чтоле блять
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}

