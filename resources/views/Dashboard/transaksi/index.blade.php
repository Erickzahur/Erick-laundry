@extends('layouts.main')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Transaksi</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" href="#dataLaundry">Data laundry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample" href="#formLaundry">Cucian baru</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        @if (session()->has('success'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger text-center" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div>
                            <form method="POST" action="{{ url(request()->segment(1).'/transaksi') }}">
                                @csrf
                                @include('dashboard.transaksi.form')
                                @include('dashboard.transaksi.data')
                                <input type="hidden" name="id_member" id="id_member">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection

@push('script')
<script>
    // Script untuk #menu data dan form transaksi $('#dataLaundry').collapse('show')
    $('#dataLaundry').on('show.bs.collapse', function() {
        $('#formLaundry').collapse('hide');
        $('#nav-form').removeClass('active');
        $('#nav-data').addClass('active');
    })
    $('#formLaundry').on('show.bs.collapse', function() {
        $('#dataLaundry').collapse('hide');
        $('#nav-data').removeClass('active');
        $('#nav-form').addClass('active');
    })

    //end #menu

    //initilize
    let subtotal = total = 0;
    //end of initialize

    //actions
    //pemilihan member
    $('#tb-member').on('click', '.pilihMemberBtn', function() {
        pilihMember(this)
        $('#tbMemberModal').modal('hide')
    })

    //pemilihan paket
    $('#tb-paket').on('click', '.pilihPaketBtn', function() {
        pilihPaket(this)
        $('#tbPaketModal').modal('hide')
    })
    //

    //function pilih member
    function pilihMember(x) {
        const tr = $(x).closest('tr')
        const namaJK = tr.find('td:eq(1)').text() + "/" + tr.find('td:eq(3)').text()
        const biodata = tr.find('td:eq(2)').text() + "/" + tr.find('td:eq(4)').text()
        const idMember = tr.find('.idMember').val()
        $('#nama-pelanggan').text(namaJK)
        $('#biodata-pelanggan').text(biodata)
        $('#id_member').val(idMember)
    }
    //

    //function pilih paket
    function pilihPaket(x) {
        const tr = $(x).closest('tr')
        const namaPaket = tr.find('td:eq(1)').text()
        const harga = tr.find('td:eq(2)').text()
        const idPaket = tr.find('.idPaket').val()

        let data = ''
        let tbody = $('#tblTransaksi tbody tr td').text()
        data += '<tr>'
        data += `<td> ${namaPaket} </td>`
        data += `<td> ${harga} </td>`;
        data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
        data += `<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
        data += `<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
        data += `<td><button type="button" class="btnRemovePaket badge badge-danger border-0">Hapus</button></td>`;
        data += '<tr>';
        if (tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();
        $('#tblTransaksi tbody').append(data);
        subtotal += Number(harga)
        total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    }
    //

    //function hitung total
    function hitungTotalAkhir(a) {
        let qty = Number($(a).closest('tr').find('.qty').val());
        let harga = Number($(a).closest('tr').find('td:eq(1)').text());
        let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
        let count = qty * harga;
        subtotal = subtotal - subTotalAwal + count
        let pajak = Number($('#pajak-persen').val()) / 100 * subtotal
        total = subtotal - Number($('#diskon').val()) + Number($('#biaya_tambahan').val()) + pajak;
        $(a).closest('tr').find('.subTotal').text(count)
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    }
    //

    //onchange qty
    $('#tblTransaksi').on('change', '.qty', function() {
        hitungTotalAkhir(this);
    })
    //onchange qty
    $('#tblTransaksi').on('change', '.diskon', function() {
        hitungTotalAkhir(this);
    })
    //

    //remove paket
    $('#formTransaksi').on('click', '.btnRemovePaket', function() {
        let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
        subtotal -= subTotalAwal;
        total -= subTotalAwal;

        $currentRow = $(this).closest('tr').remove();
        $('#subtotal').text(subtotal);
        $('#total').text(total)
    });
    //
</script>
<script>
    $(function() {
        $('#tb-member').DataTable();
    });

    $(function() {
        $('#tb-paket').DataTable();
    }); <
    script >

        @endpush
