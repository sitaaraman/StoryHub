<?php 

// User Model (App\Models\User)
namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'profile',
        'password',
    ];

    // A user can have many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // A user can have many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
