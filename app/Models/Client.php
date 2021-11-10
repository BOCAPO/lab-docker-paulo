<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Invoque\Zeus\Models\BaseModel;

class Client extends BaseModel
{
    use HasFactory;

    public $incrementing = false;

    protected $table = 'app_clients';
    protected $keyType = 'string';

    protected $primaryKey = 'cli_id';

    protected $fillable = [
        'cli_name',
        'cli_type',
        'cli_document',
        'cli_address',
        'cli_contact',
        'cli_id_external',
        'cli_active'
    ];

    protected $casts = [
        'cli_address' => 'json',
        'cli_contact' => 'json'
    ];

    protected $itensUpperCase = ['cli_name'];
    protected $searchable = ['cli_name' => 'like'];
    protected $orderByList = ['cli_name' => 'desc'];

    public function registers()
    {
        return $this->belongsToMany('App\Models\Register', 'app_clients_register', 'clr_cli_id', 'clr_reg_id');
    }
}
