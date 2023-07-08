<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryPost;
class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title','short_desc','desc','image','post_category_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'posts';

    public function category(){
        return $this->belongsTo(CategoryPost::class,'post_category_id');
    }
}
