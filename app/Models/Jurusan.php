<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    

    use HasFactory;

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
}
