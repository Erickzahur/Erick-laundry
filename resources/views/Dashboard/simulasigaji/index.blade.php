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
        <form id="formGaji" data-parsley-validate class="form-horizontal form-label-left">
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
                                <label class="col-form-label col-md-2  " for="first-name">Nama Karyawan <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nama_karyawan" name="nama_karyawan" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 ">Gender <spanclass="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="jk" value="L" id="jk" class="join-btn">
                                            &nbsp; Laki-laki &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="jk" value="P" id="jk" class="join-btn"> Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Status Menikah
                                    <spanclass="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-6 ">
                                    <select class="form-select form-control col-8 form-select mb-3"
                                        aria-label=".form-select example" id="status" name="status"
                                        required="required">

                                        <option name="status" value="single">Single</option>
                                        <option name="status" value="couple">Couple</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Jumlah Anak <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="jml_anak" name="jml_anak" value="0" min="0"
                                        required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2  " for="first-name">Mulai Bekerja <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="mulai_bekerja" id="mulai_bekerja">
                                        @for ($i=date('Y'); $i > 1900; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" hidden>
                                <label class="col-form-label col-md-2  " for="first-name">Gaji Awal <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="gaji_awal" name="gaji_awal" value="2000000" min="0"required="required"
                                        class="form-control ">
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

                            </div>
                            <div>
                                <table id="tblGaji" class="table table-striped table-md jambo_table bulk_action">
                                    <thead>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">JK</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jml Anak</th>
                                        <th scope="col">Mulai bekerja</th>
                                        <th scope="col">Gaji Awal</th>
                                        <th scope="col">Tunjangan </th>
                                        <th scope="col">Total Gaji </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="9" align="center">Belum ada data</td>
                                        </tr>
                                    </tbody>

                                    <tfoot style="background: royalblue;color:whitesmoke;font-weight:bold;font-size:1em">
                                        <td colspan="6" style="text-align: center">TOTAL</td>
                                        <td id="total1"></td>
                                        <td id="total2"></td>
                                        <td id="total3"></td>
                                    </tfoot>
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
        const data = $('#formGaji').serializeArray()
        let dataGaji = JSON.parse(localStorage.getItem('dataGaji')) || []
        let newData = {}
        data.forEach(function(item, index) {
            let name = item['name']
            let value = (name === 'id_karyawan' ||
                name === 'jml_anak' ?
                Number(item['value']) : item['value'])
            newData[name] = value
        })
        //console.log(newData)

        localStorage.setItem('dataGaji', JSON.stringify([...dataGaji, newData]))
        return newData
    }

    $('#status').on('change', function() {
            let value = $('#status').val()
            console.log(value)
            if (value == 'single') {
                $('#jml_anak').val(0)
                $('#jml_anak').attr('readonly', true)
            } else {
                $('#jml_anak').attr('readonly', false)

            }
        })

        $('#jml_anak').on('change', function() {
            let value = $('#jml_anak').val()
            console.log(value)
            if (value >= 1) {
                $('#status').val('couple')
                $('#status').attr('readonly', true)
            } else {
                $('#status').attr('readonly', false)

            }
        })

        // end of events

        // function calculateAge(birthday) {
        //     birthday = new Date(birthday)
        //     var ageDifms = Date.now() - birthday.getTime();
        //     var ageDate = new Date(ageDifms);
        //     return Math.abs(ageDate.getUTCFullYear - 1970);
        // }



    function showData(dataGaji) {
        let row = ''
        //let arr = JSON.parse(localStorage.getItem('dataGaji')) || []
        if (dataGaji.length == 0) {
            return row = `<tr><td colspan="9" align="center">Belum ada data</td></tr>`
        }

        dataGaji.forEach(function(item, index, birthday) {

                const awal = 2000000
                const bonusTahun = 150000
                const bonusAnak = 150000
                const bonusCouple = 250000

                dan = new Date(item['mulai_bekerja'])
                var ageDifMs = Date.now() - dan.getTime();
                var ageDate = new Date(ageDifMs)
                var newAge = Math.abs(ageDate.getUTCFullYear() - 1970)
                var tahun = newAge * bonusTahun



                if (item['jml_anak'] >= 2) {
                    var child = 2
                } else if (item['jml_anak'] != 1) {
                    var child = 0
                } else {
                    var child = 1
                }

                let anak = bonusAnak * child

                let status = (item['status'] === 'couple' ? bonusCouple : 0)
                let tunjangan = anak + status + tahun

                let total = tunjangan + awal

                row += `<tr>`
                row += `<td>${item['id_karyawan']}</td>`
                row += `<td>${item['nama_karyawan']}</td>`
                row += `<td>${item['jk']}</td>`
                row += `<td>${item['status']}</td>`
                row += `<td>${item['jml_anak']}</td>`
                row += `<td>${item['mulai_bekerja']}</td>`
                row += `<td>${item['gaji_awal']}</td>`
                row += `<td>${tunjangan}</td>`
                row += `<td>${total}</td>`


                row += `</tr>`
            })
            return row
    }

            function total() {
                let table = document.getElementById('tblGaji').getElementsByTagName('tbody')[0]
                let total1 = 0
                let total2 = 0
                let total3 = 0

                for (let i = 0; i < table.children.length; i++) {
                    total1 += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[6].innerText)
                    total2 += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[7].innerText)
                    total3 += Number(table.getElementsByTagName('tr')[i].getElementsByTagName('td')[8].innerText)
                }

                document.getElementById('total1').innerText = total1
                document.getElementById('total2').innerText = total2
                document.getElementById('total3').innerText = total3
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
        let dataGaji = JSON.parse(localStorage.getItem('dataGaji')) || []
        // console.log(dataGaji)
        $('#tblGaji tbody').html(showData(dataGaji))
        total()

        //events
        $('#formGaji').on('submit', function(e) {
            // console.log(e)
            e.preventDefault();
            insert()
            dataGaji = JSON.parse(localStorage.getItem('dataGaji')) || []
            $('#tblGaji tbody').html(showData(dataGaji))
            total()
        })

        //sorting
        $('#sorting').on('click', function(){
            data = insertionSort(dataGaji, 'id_karyawan', 'asc')
            //console.log(data)
            data && $('#tblGaji tbody').html(showData(dataGaji))
        })

        searching
        $('#btnSearch').on('click', function(e){
            let teksSearch = $('#search').val()
            let id = searching(dataGaji, 'id_karyawan', teksSearch)
            let data = []
            if(id >= 0)
                data.push(dataGaji[id])
            console.log(id)
            console.log(data)
            $('#tblGaji tbody').html(showData(data))
        })
    })

</script>
@endpush


