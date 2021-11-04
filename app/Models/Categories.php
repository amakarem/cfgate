<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Categories extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Voyager::modelClass('Post'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function Indices()
    {
        return $this->hasMany(Voyager::modelClass('Indices'))
            ->published()
            ->orderBy('created_at');
    }
    
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
