<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Facility extends Model
{
    use SoftDeletes;

    // Gunakan UUID
    public $incrementing = false;
    protected $keyType = 'string';

    // Kolom yang bisa diisi via mass assignment
    protected $fillable = [
        'id',
        'name',
        'icon', // dari icones js
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }

    // Cast dates
    protected $dates = ['deleted_at'];

    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = preg_replace('/\s(width|height)="[^"]*"/i', '', $value);
    }



}
