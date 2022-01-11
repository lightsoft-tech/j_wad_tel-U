<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['id' ,'user_id', 'menu_id', 'alamat_pengiriman', 'tanggal_pengiriman', 'waktu_pengiriman', 'status_order', 'pembayaran', 'created_at', 'updated_at'];
}
