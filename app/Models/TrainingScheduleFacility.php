<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingScheduleFacility extends Model
{
    protected $table = "training_schedule_facilities";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'training_schedule_id', // ID jadwal pelatihan
        'facility_id', // ID fasilitas
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

    public function training()
    {
        return $this->belongsTo(TrainingSchedule::class, 'training_schedule_id');
    }
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');    
    }
}
