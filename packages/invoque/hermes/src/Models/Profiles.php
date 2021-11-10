<?php

namespace Invoque\Hermes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Invoque\Zeus\Models\BaseModel;

class Profiles extends BaseModel
{
    public $incrementing = false;

    protected $table = 'hermes_profiles';
    protected $keyType = 'string';
    protected $primaryKey = 'prf_id';
    protected $fillable = ['prf_name', 'prf_permission', 'prf_description'];
    protected $searchable = ['prf_name' => 'like'];
    protected $orderByList = ['created_at' => 'desc'];
    protected $itensUpperCase = ['prf_name'];
    protected $casts = ['prf_permission' => 'json'];
}
