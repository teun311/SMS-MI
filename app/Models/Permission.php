<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable   = ['title'];

    protected static $permission;

    public static function saveData ($request)
    {
        Permission::create($request->except('_token'));
    }
}
