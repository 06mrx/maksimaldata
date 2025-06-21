<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingType extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'full_name',
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

    // public function getPriceAttribute($value)
    // {
    //     return number_format($value, 0, ',', '.');
    // }   
    public function trainingSchedules()
    {
        return $this->hasMany(TrainingSchedule::class, 'training_type_id');
    }

    public function participants()
    {
        return $this->hasManyThrough(Participant::class, TrainingSchedule::class, 'training_type_id', 'training_schedule_id');
    }

}