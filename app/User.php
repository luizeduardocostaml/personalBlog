<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Post;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'name',
        'image', 'biography', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }
    
    public function getImageUrlAttribute()
    {
        return Storage::disk('s3')->url($this->image);
    }

    public function getPerfilUrlAttribute()
    {
        return route('user.show', ['slug' => $this->slug]);
    }

    public function getLastPostsAttribute()
    {
        return $this->posts->sortByDesc('created_at')->take(5);
    }

    public function getMostViewedPostAttribute()
    {
        return $this->posts->sortByDesc('views')->first();
    }

    public function getNoticiasAttribute()
    {
        return $this->posts->where('type', 'notice')->all();
    }

    public function getBlogsAttribute()
    {
        return $this->posts->where('type', 'blog')->all();
    }
}
