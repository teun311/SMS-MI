<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected static $role;

    public static function saveData ($request)
    {
        self::$role = Role::create($request->all());
        self::$role->permissions()->sync($request->permissions);
    }

    public function permissions ()
    {
        return $this->belongsToMany(Permission::class);
    }
}
