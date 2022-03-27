<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}
