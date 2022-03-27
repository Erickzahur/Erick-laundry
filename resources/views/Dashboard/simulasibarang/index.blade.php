@extends('layouts.main')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Template</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <form id="formBarang" data-parsley-validate class="form-horizontal form-label-left">
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Simulasi Gaji Karyawan</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <br />
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">ID Karyawan <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="id_karyawan" name="id_karyawan" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Nama Barang <span class="required">*</span> </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-select form-control col-5 form-select mb-3"
                                        aria-label=".form-select example" id="nama_barang" name="nama_barang"
                                        required="required">
                                        <option selected >Pilih Barang </option>
                                        <option name="nama_barang" data-price="15000" value="deterjen">Deterjen</option>
                                        <option name="nama_barang" data-price="25000" value="deterjen_sepatu">Deterjen Sepatu</option>
                                        <option name="nama_barang" data-price="10000" value="pewangi">Pewangi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2" for="price">Harga Barang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="price" name="price" min="0" required="required" readonly class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Jumlah Barang <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="qty" name="qty" min="0" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Tanggal Beli <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="tgl_beli" name="tgl_beli" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 ">Jenis Pembayaran <spanclass="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="radio" name="jp" value="Cash" id="jp" class="flat">
                                    &nbsp; Cash  &nbsp;
                                    <input type="radio" name="jp" value="E-money" id="jp" class="flat" required /> E-money
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div>
                                    <button type=" submit" id="btnSimpan" class="btn btn-success">Input</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>

            {{-- form card 2 --}}
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- Button sortir -->
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" type="button" id="sorting">
                                        Sortir
                                    </button>
                                </div>
                                <input class="form-control col-sm-2" type="search" name="search" id="search">
                                <button class="btn btn-success" type="button" id="btnSearch">Cari</button>
                                <div class="col-sm-2">
                                    <input type="checkbox" id="cCash" value="Cash">
                                    <label class="form-check-label">Cash</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="checkbox" id="cEmoney" value="e-money">
                                    <label class="form-check-label">e-money</label>
                                </div>

                            </div>
                            <div>
                                <table id="tblBarang" border="" class="table table-striped table-md jambo_table bulk_action">
                                    <thead>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tanggal Beli</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Diskon</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Jenis bayar </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="8" align="center">Belum ada data</td>
                                        </tr>
                                    </tbody>

                                    {{-- <tfoot style="background: royalblue;color:whitesmoke;font-weight:bold;font-size:1em">
                                        <td colspan="3" style="text-align: center">TOTAL</td>
                                        <td id="total1"></td>
                                        <td id="total2"></td>
                                        <td id="total3"></td>
                                        <td id="total4" colspan="2"></td>
                                    </tfoot> --}}

                                </table>
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

       function insert() {
        const data = $('#formBarang').serializeArray()
        let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
        let newData = {}
        data.forEach(function(item, index) {
            let name = item['name']
            let value = (name === 'id_karyawan' ||
                name === 'qty' ?
                Number(item['value']) : item['value'])
            newData[name] = value
        })
        //console.log(newData)

        localStorage.setItem('dataBarang', JSON.stringify([...dataBarang, newData]))
        return newData
    }

    function showData(dataBarang) {

        const dc = 0.15
        var diskon = 0
        var jumlah = 0

        //var untuk total
        var total1 = 0
        var total2 = 0
        var total3 = 0
        var total4 = 0


        let row = ''
        if (dataBarang.length == 0) {
            return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
        }

        dataBarang.forEach(function(item, index,) {


            //mencari jumlah
            jumlah = (item['price'])*(item['qty'])
            // mencari diskon
            if (jumlah >= 50000)
            {
                diskon = jumlah * dc
                jumlah = jumlah - diskon
            }

            //mencari total
            total1  += Number(item['price'])
            total2  += Number(item['qty'])
            total3  += diskon
            total4  += jumlah


                row += `<tr>`
                row += `<td>${item['id_karyawan']}</td>`
                row += `<td>${item['tgl_beli']}</td>`
                row += `<td>${item['nama_barang']}</td>`
                row += `<td>${item['price']}</td>`
                row += `<td>${item['qty']}</td>`
                row += `<td>${diskon}</td>`
                row += `<td>${jumlah}</td>`
                row += `<td>${item['jp']}</td>`
                row += `</tr>`



            })
                row += `<tr>`
                row += `<td colspan="3" align="center">Total</td >`
                row += `<td>${total1}</td>`
                row += `<td>${total2}</td>`
                row += `<td>${total3}</td>`
                row += `<td colspan="2">${total4}</td>`
                row += `</tr>`
            return row
    }

    $('#nama_barang').on('change', function(){
        // ambil data dari elemen option yang dipilih
        let price = $('#nama_barang option:selected').data('price');
        // tampilkan data ke element
        $('[name=price]').val(price);
        });



    $(function() {
        //initialize
        let dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
        console.log(dataBarang)
        $('#tblBarang tbody').html(showData(dataBarang))


        //events
        $('#formBarang').on('submit', function(e) {
            // console.log(e)
            e.preventDefault();
            insert()
            dataBarang = JSON.parse(localStorage.getItem('dataBarang')) || []
            $('#tblBarang tbody').html(showData(dataBarang))

        })

            //chechbox Cash
            $('#cCash').on('click', function(){
            let filterC = $('#cCash').val()
            let id = searching(dataBarang,'jp',filterC)
            let data =[]
            if(id >=0)
                data.push(dataBarang[id])

            $('#tblBarang tbody').html(showData(data))
            console.log
            })

        //chechbox Cash
        $('#cEmoney').on('click', function(){
            let filterE = $('#cEmoney').val()
            let id = searching(dataBarang,'jp',filterE)
            let data =[]
            if(id >=0)
                data.push(dataBarang[id])

            $('#tblBarang tbody').html(showData(data))
            // console.log
        })

        function insertionSort(arr, key, type)
        {
            let i, j, id, value;
            type = type === 'asc'?'>':'<'

            if(arr[0].constructor !== Object || !key) return false
            for (i = 1; i < arr.length; i++)
            {
                value = arr[i];
                id = arr[i][key]
                j = i - 1;

                while (j >= 0  && eval(arr[j][key] + type + id))
                {
                    arr[j + 1] = arr[j];
                    j--;
                }
                arr[j + 1] = value;
            }
            return arr
        }
        function searching(arr, key, teks){
            for(let i = 0; i < arr.length; i++){
                if(arr[i][key] == teks)
                    return i
                }
            return 'gagal'
        }

        //sorting
        $('#sorting').on('click', function(){
            data = insertionSort(dataBarang, 'id_karyawan', 'asc')
            //console.log(data)
            data && $('#tblBarang tbody').html(showData(dataBarang))
        })

        // searching
        $('#btnSearch').on('click', function(e){
            let teksSearch = $('#search').val()
            let id = searching(dataBarang, 'id_karyawan', teksSearch)
            let data = []
            if(id >= 0)
                data.push(dataBarang[id])
            console.log(id)
            console.log(data)
            $('#tblBarang tbody').html(showData(data))
        })
    })


</script>
@endpush


