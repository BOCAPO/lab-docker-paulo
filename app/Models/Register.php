<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Invoque\Zeus\Models\BaseModel;

class Register extends BaseModel
{
    use HasFactory;

    public $incrementing = false;

    protected $table = 'app_register';
    protected $keyType = 'string';

    protected $primaryKey = 'reg_id';

    protected $fillable = [
        'reg_usr_id',
        'reg_name',
        'reg_phone',
        'reg_email',
        'reg_id_external',
    ];

    protected $itensUpperCase = ['reg_name'];
    protected $searchable = ['reg_name' => 'like'];
    protected $orderByList = ['reg_name' => 'desc'];

    public function user()
    {
        return $this->hasOne('Invoque\Hermes\Models\User', 'usr_id', 'reg_usr_id');
    }
}
