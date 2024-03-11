<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];
    public function posts() {
        return $this->hasMany(Post::class);
    }
}