<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    //
    use SoftDeletes;
    //Временно, пока не настроены права и авторизация
    const UNKNOWN_USER = 1;

    protected $fillable = [
        'category_id',
        'title',
        'excerpt',
        'content_raw',
        'content_html',
        'is_published',
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
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
