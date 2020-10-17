<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'title', 'resume', 'text', 'image', 'author_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getImageUrlAttribute()
    {
        return Storage::disk('s3')->url($this->image);
    }

    public function getLinkAttribute()
    {
        return Str::slug($this->title);
    }
}
