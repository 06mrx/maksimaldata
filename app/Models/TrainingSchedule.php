<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingSchedule extends Model
{
    use HasFactory, SoftDeletes;

    // Gunakan UUID
    public $incrementing = false;
    protected $keyType = 'string';

    // Fillable fields
    protected $fillable = [
        'id',
        'training_type_id',
        'start_date',
        'end_date',
        'location', // Lokasi pelatihan
        'status'
    ];

    // Optional: Auto-generate UUID saat create
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
    
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class, 'training_schedule_id');
    }

    public function trainingType()
    {
        return $this->belongsTo(TrainingType::class, 'training_type_id');
    }

    
}