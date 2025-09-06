<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    CONST ADMIN = 1;
    CONST CUSTOMER = 2;
    CONST HOST = 3;

    CONST ACTIVE = 'active';
    CONST INACTIVE = 'deactivated';
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_type',
        'password',
        'address',
        'status',
        'company',
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
    ];


    public static function getCustomers (){
        return $customers =  User::where('user_type',User::CUSTOMER)->where('company_id',app('company_id'))->get();
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function role()
    {
        return $this->hasOne(Role::class); // Assuming a one-to-one or one-to-many relationship
    }

}
