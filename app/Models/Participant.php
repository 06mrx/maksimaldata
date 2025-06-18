<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory, SoftDeletes;

    // Gunakan UUID
    public $incrementing = false;
    protected $keyType = 'string';

    // Kolom yang bisa diisi via mass assignment
    protected $fillable = [
        'id',
        'training_schedule_id',
        'name',
        'email',
        'whatsapp',
        'tshirt_size'
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

    public function getWhatsappAttribute($value)
    {
        // Jika dimulai dengan 08, ganti jadi 628
        return preg_replace('/^0/', '62', $value);
    }

    public function trainingSchedule()
    {
        return $this->belongsTo(TrainingSchedule::class, 'training_schedule_id');
    }
}