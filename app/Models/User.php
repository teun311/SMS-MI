<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected static $user;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function updateUser($request, $id)
    {
        self::$user = User::find($id);
        self::$user->name   = $request->name;
        self::$user->email   = $request->email;
        if (isset($request->password))
        {
            self::$user->password   = Hash::make($request->password);
        }
        self::$user->roles()->sync($request->roles);
    }

    public function saveData($request)
    {
        self::$user = User::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'password'  => Hash::make($request->password),
        ]);
    }
    public static function saveTeacher($request)
    {
        self::$user = new User();
        self::$user->name = $request->user_name;
        self::$user->email = $request->email;
        self::$user->password = bcrypt($request->password);
        self::$user->save();
        return self::$user->id;
    }

    public function roles ()
    {
        return $this->belongsToMany(Role::class);
    }
}
