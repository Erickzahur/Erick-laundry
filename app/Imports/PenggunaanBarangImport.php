<?php

namespace App\Imports;

use App\Models\PenggunaanBarang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenggunaanBarangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new PenggunaanBarang([
            'nama_barang' => $row['nama_barang'],
            'qty' => $row['qty'],
            'harga' => $row['harga'],
            'waktu_beli' => $row['waktu_beli'],
            'supplier' => $row['supplier'],
            'StatusBarang' => $row['status']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
