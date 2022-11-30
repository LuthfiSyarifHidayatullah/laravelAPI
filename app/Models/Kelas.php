<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    use HasFactory;

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
}
