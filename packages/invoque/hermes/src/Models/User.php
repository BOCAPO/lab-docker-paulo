<?php

namespace Invoque\Hermes\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Invoque\Zeus\Models\BaseModel;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'hermes_users';
    protected $primaryKey = 'usr_id';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = ['usr_username', 'usr_password', 'usr_prf_id', 'usr_active'];

    protected $hidden = ['remember_token'];

    public function profiles()
    {
        return $this->hasOne('Invoque\Hermes\Models\Profiles', 'prf_id', 'usr_prf_id');
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->usr_password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAuthIdentifierName()
    {
        return 'usr_username';
    }
}
