<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_buku','jurusan_id', 'kelas_id', 'url', 'name',
        'file_path', 'author'
    ];

    public function jurusan() 
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas() 
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function users() 
    {
        return $this->belongsTo(Users::class);
    }
}