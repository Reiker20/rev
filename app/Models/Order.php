<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pesanan_1',
        'quantity_1',
        'pesanan_2',
        'quantity_2',
        'pesanan_3',
        'quantity_3',
        'pesanan_4',
        'quantity_4',
        'pesanan_5',
        'quantity_5',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
