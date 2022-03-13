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
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Simulasi 1</h2>
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
                        <form id="formKaryawan" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label class="col-form-label col-md-1  " for="first-name">ID <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="id" name="id" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-1  " for="first-name">Nama <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nama" name="nama" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-1 ">Gender</label>
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
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div>
                                <button type=" submit" id="btnSimpan" class="btn btn-success">Submit</button>
                                <button type=" reset" id="btnReset" class="btn btn-success">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                        <!-- Button  SORTING -->
                        <button type="button" class="btn btn-primary" id="sorting">
                            Sortir
                        </button>
                        <div>
                            <table id="tblKaryawan" class="table table-striped table-md" id="tblKaryawan">
                                <thead>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">JK</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="center">Belum ada data</td>
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
    function insert(){
        const data = $('#formKaryawan').serializeArray()
        let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
        let newData = {}
        data.forEach (function(item, index){
            let name = item['name']
            let value = (name  === 'id'? Number(item['value']):item['value'])
            newData[name] = value
        })
        console.log(newData)

        localStorage.setItem('dataKaryawan', JSON.stringify([...dataKaryawan, newData]))
        return newData
    }

    function showData(){
        let row = ''
        let arr = JSON.parse(localStorage.getItem('dataKaryawan')) || []
        if(arr.length == null){
            return   row = `<tr>  <td colspan="3" align="center">Belum ada data</td></tr>`
        }
        arr.forEach(function(item, index){
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${item['jk']}</td>`
                row += `</tr>`
            })
            return row
    }

    function insertionSort(arr, key){
        let i, j, id, value;
        for (i = 1; i < arr.length; i++)
        {
            value = arr[i];
            id = arr[i] [key]
            j = i - 1;
            while (j >= 0 && arr[j][key > id])
            {
                arr[j + 1] = arr[j];
                j = j - 1;
            }
            arr[j + 1 ] = value;
        }
        return arr
    }

$(function(){
    //property
    let dataKaryawan = []

    //events
    $('#sorting').on('click', function(){
            dataKaryawan = insertionSort(dataKaryawan, 'id')

     $('#tblKaryawan tbody').html(showData(dataKaryawan))
            console.log(dataKaryawan)
        })

    $('#formKaryawan').on('submit', function(e){
        e.preventDefault()
        dataKaryawan.push(insert())

     $('#tblKaryawan tbody').html(showData(dataKaryawan))
        console.log(dataKaryawan)
    })
    //end of events
})
</script>
@endpush
