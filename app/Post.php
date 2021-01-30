<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'title', 'resume', 'text', 'image', 'user_id', 'views'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTipoAttribute()
    {
        if ($this->type == 'blog') {
            return 'Blog';
        } else {
            return "Notícia";
        }
    }

    public function getImageUrlAttribute()
    {
        return Storage::disk('s3')->url($this->image);
    }

    public function getUrlAttribute()
    {
        return route('post.show', ['slug' => $this->slug]);
    }
}
