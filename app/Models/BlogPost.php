<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    //
    use SoftDeletes;

    /**
     * Категория статьи
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        //Связь с категорией
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Автор статьи
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        //Связь с пользователем
        return $this->belongsTo(User::class);
    }
}
