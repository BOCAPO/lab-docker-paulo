<?php

namespace Invoque\Hermes\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Auth extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'hermes_users';
    protected $primaryKey = 'usr_id';
    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = ['usr_username', 'usr_password', 'usr_prf_id', 'usr_active'];

    public function profiles()
    {
        return $this->hasOne('Invoque\Hermes\Models\Profiles', 'prf_id', 'usr_prf_id');
    }

    public function getAuthPassword()
    {
        return $this->usr_password;
    }

    public function getAuthIdentifierName()
    {
        return 'usr_username';
    }
}
