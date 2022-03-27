<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = "detail_transaksi";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
