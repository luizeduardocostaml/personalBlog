<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Support\Str;

class Notice extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','resume', 'text', 'image', 'author_id'];

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
