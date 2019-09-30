<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;
    const ROOT = 1;
    protected $fillable = ['parent_id','title','slug','description'];

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id','id');
    }

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'ROOT'
                : '???'
            );
        return $title;
    }

    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}
