<?php

namespace Invoque\Zeus\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model
{
    protected $searchable = [];
    protected $orderByList = [];

    public static function boot()
    {
        parent::boot();
        //parent::observe(AuditoriaObserver::class);

        static::creating(function ($model) {
            $model->{$model->primaryKey} = Uuid::uuid4();
        });
    }

    public function renderGridPagination($inputsSearch = [])
    {
        $search = $this->searchable;
        $orderBy = $this->orderByList;

        $model = $this;

        if(!empty($search) && !is_null($inputsSearch)) {
            foreach ($search as $key => $value) {
                if(!array_key_exists($key,$inputsSearch)) {
                    continue;
                }

                switch ($value) {
                    case 'like':
                        $model = $model->where($key, $value, '%'.$inputsSearch[$key].'%');
                        break;
                    default:
                        $model = $model->where($key, $value, $inputsSearch[$key]);
                }
            }
        }

        if(!empty($orderBy)) {
            foreach ($orderBy as $key => $value) {
                $model = $model->orderBy($key,$value);
            }
        }

        return $model->paginate(15);
    }

    public static function create(array $attributes = [])
    {
        $attributes = parent::setUpperCaseItensModel($attributes);

        $model = new static($attributes);
        $model->save();

        return $model;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $attributes = $this->setUpperCaseItensModel($attributes);

        if (!$this->exists) {
            return false;
        }

        return $this->fill($attributes)->save($options);
    }

    public function setUpperCaseItensModel($data)
    {
        if (is_null($this->itensUpperCase)) {
            return $data;
        }

        $itensUpperCase = $this->itensUpperCase;

        foreach ($itensUpperCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtoupper(mb_strtolower($data[$item]));
            }
        }

        return $data;
    }

    public function setLowerCaseItensModel($data)
    {
        if (is_null($this->itensLowerCase)) {
            return $data;
        }

        $itensLowerCase = $this->itensLowerCase;

        foreach ($itensLowerCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtolower(mb_strtoupper($data[$item]));
            }
        }

        return $data;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
}
