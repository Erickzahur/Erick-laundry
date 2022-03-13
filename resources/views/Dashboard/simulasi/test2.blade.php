@extends('layouts.main')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Data</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                </div>
            </div>
        </div>

        {{----- main content -----}}

        {{-- form card 1 --}}
        <form id="formBuku" data-parsley-validate class="form-horizontal form-label-left">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Simulasi data buku</h2>
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
                                <label class="col-form-label col-md-2  " for="first-name">ID <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="id_buku" name="id_buku" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Judul buku <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="judul_buku" name="judul_buku" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Pengarang <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="pengarang" name="pengarang" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Tahun terbit <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="tahun_terbit" id="tahun_terbit">
                                        @for ($i=date('Y'); $i > 1900; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">harga buku <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="harga_buku" name="harga_buku" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Qty <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="qty" name="qty" value="0" min="0" required="required"
                                        class="form-control ">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div ">
                                <button type=" submit" id="btnSimpan" class="btn btn-success">Submit</button>
                                <button type=" reset"  id="btnReset" class="btn btn-danger">Reset</button>
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

                        </div>
                        <div>
                            <table id="tblBuku" class="table table-striped table-md jambo_table bulk_action" id="tblBuku">
                                <thead>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul buku</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Tahun terbit</th>
                                    <th scope="col">Harga buku</th>
                                    <th scope="col">Qty</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6" align="center">Belum ada data</td>
                                    </tr>
                                </tbody>
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
        //methhods
        function insert() {
            const data = $('#formBuku').serializeArray()
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            let newData = {}
            data.forEach(function(item, index) {
                let name = item['name']
                let value = (name === 'id_buku' ||
                    name === 'qty' ||
                    name === 'harga' ?
                    Number(item['value']) : item['value'])
                newData[name] = value
            })
            //console.log(newData)

            localStorage.setItem('dataBuku', JSON.stringify([...dataBuku, newData]))
            return newData
        }

        function showData(dataBuku) {
            let row = ''
            //let arr = JSON.parse(localStorage.getItem('dataBuku')) || []
            if (dataBuku.length == 0) {
                return row = `<tr><td colspan="6" align="center">Belum ada data</td></tr>`
            }
            dataBuku.forEach(function(item, index) {
                row += `<tr>`
                row += `<td>${item['id_buku']}</td>`
                row += `<td>${item['judul_buku']}</td>`
                row += `<td>${item['pengarang']}</td>`
                row += `<td>${item['tahun_terbit']}</td>`
                row += `<td>${item['harga_buku']}</td>`
                row += `<td>${item['qty']}</td>`
                row += `</tr>`
            })
            return row
        }

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

        //after load
        $(function() {
            //initialize
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            // console.log(dataBuku)
            $('#tblBuku tbody').html(showData(dataBuku))


            //events
            $('#formBuku').on('submit', function(e) {
                // console.log(e)
                e.preventDefault();
                insert()
                dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
                $('#tblBuku tbody').html(showData(dataBuku))
            })

            //sorting
            $('#sorting').on('click', function(){
                data = insertionSort(dataBuku, 'id_buku', 'asc')
                //console.log(data)
                data && $('#tblBuku tbody').html(showData(dataBuku))
            })

            //searching
            $('#btnSearch').on('click', function(e){
                let teksSearch = $('#search').val()
                let id = searching(dataBuku, 'id_buku', teksSearch)
                let data = []
                if(id >= 0)
                    data.push(dataBuku[id])
                console.log(id)
                console.log(data)
                $('#tblBuku tbody').html(showData(data))
            })
        })

    </script>
@endpush
