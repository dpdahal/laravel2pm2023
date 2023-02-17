<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'gender',
        'role',
        'is_active',
    ];

    public function gallery()
    {
        return $this->hasOne(AdminGallery::class)->latest();
    }

    public function allImage()
    {
        return $this->hasMany(AdminGallery::class,
            'admin_id',
            'id');
    }
}
