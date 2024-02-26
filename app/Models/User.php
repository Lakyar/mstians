<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Blog;
use App\Models\Batch;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'note',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    //relationship with blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    //relationship with blogs
    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }



    public function show($id)
    {
        // Retrieve the user with the given ID
        $user = User::findOrFail($id);

        // Pass the $user variable to the view
        return view('blog.show', compact('user'));
    }





    /**
     * The teams that belong to the user.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * The tournaments that belong to the user.
     */
    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
