<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QrCode extends Model
{
    use HasFactory;

       protected $fillable = [
        'qr_code_string',
        'qr_code_image',
        'user_id',
        'timelimit',
    
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function boot()
    {
        parent::boot();
        self::created(function($qrcode){
            $qrcode->qr_code_string = (string) Str::uuid();
            $qrcode->save();
        });
    }
}
