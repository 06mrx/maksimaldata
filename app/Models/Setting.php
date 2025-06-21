<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'tagline',
        'phone',
        'email',
        'address',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_youtube',
        'social_linkedin',
        'social_whatsapp',
        'social_telegram',
        'social_tiktok',
        'social_github',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }

    public function getSocialWhatsappAttribute($value)
    {
        // Jika diawali 0, ubah ke 62
        if (strpos($value, '0') === 0) {
            return '62' . substr($value, 1);
        }

        // Jika sudah pakai 62, biarkan
        return $value;
    }

}
