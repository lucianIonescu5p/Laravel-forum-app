<?php

namespace App;

use App\Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    /**
     * Thread relationship.
     *
     * @return HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class, 'category_id');
    }
}
