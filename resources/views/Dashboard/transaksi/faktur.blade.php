@extends('layouts.main')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Invoice Transaksi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section class="content invoice">

                    <div class="row">
                        <div class="  invoice-header">
                            <h1>
                                <i class="fa fa-globe"></i> Invoice.
                                <small class="pull-right">Date: {{ $transaksi->tgl }}</small>
                            </h1>
                        </div>

                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>{{ $transaksi->user->name }}</strong>
                                <br>{{ $transaksi->outlet->alamat }}
                                <br>{{ $transaksi->outlet->telepon }}
                                <br>{{ $transaksi->user->email }}
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{ $transaksi->member->nama }}</strong>
                                <br>{{ $transaksi->member->alamat }}
                                <br>{{ $transaksi->member->telepon }}
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #{{ $transaksi->kode_invoice }}</b>
                            <br>
                            <br>
                            <b>Nama Outlet:</b> {{ $transaksi->outlet->nama }}
                            <br>
                            <b>Tanggal Bayar:</b> {{ $transaksi->tgl_bayar }}
                            <br>
                        </div>

                    </div>


                    <div class="row">
                        <div class="  table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Paket</th>
                                        <th>Jenis Paket </th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $transaksi->detail_transaksi as $dt )

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dt->paket->nama_paket  }}</td>
                                        <td>{{ $dt->paket->jenis  }}</td>
                                        <td>{{ $dt->paket->harga  }}</td>
                                        <td>{{ $dt->qty }}</td>
                                        <td>{{ $dt->subtotal }}</td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="row justify-content-end">

                        <div class="col-md-6">
                            <p class="lead">Batas waktu {{ $transaksi->deadline }}</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>{{ $transaksi->jumlah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Diskon</th>
                                            <td>{{ $transaksi->diskon }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pajak:</th>
                                            <td>{{ $transaksi->pajak }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{ $transaksi->total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <div class="row no-print">
                        <div class=" ">
                            <button class="btn btn-default" onclick="window.print();"><i
                                    class="fa fa-print"></i> Print</button>
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i
                                    class="fa fa-download"></i> Generate PDF</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<!-- /page content -->

@endsection
