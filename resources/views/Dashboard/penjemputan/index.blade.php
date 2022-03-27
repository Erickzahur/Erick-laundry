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

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Tabel Penjemputan</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  @if (session()->has('success'))
                  <div class="alert alert-success text-center" role="alert" id="success-alert">
                      {{ session('success') }}
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" >&times;</span>
                    </button>
                  </div>
                  @endif

                  @if ($errors->any())
                  <div class="alert alert-danger text-center" role="alert" id="error-alert">
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                      <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif

                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                        </button>

                        <a href="{{ route('export-penjemputan') }}" class="btn btn-success mb-2">
                            <i class="ni ni-bold-right"></i> Export
                        </a>

                        {{-- button modal --}}
                        <button type="button" class="btn btn-warning mb-2 " data-toggle="modal"
                            data-target="#importModal"><i class="ni ni-bold-left"></i> Import</button>

                        <!-- Modal -->
                        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="importModalLabel">Import Data Penjemputan</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST"
                                            action="{{ route('import-penjemputan') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="file" name="filePenjemputan" class="form-control border"
                                                            placeholder="Pilih file excel(.xlsx)" required>
                                                    </div>
                                                    @error('file2')
                                                        <div class="'alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-warning" id="submit">
                                                        Import</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->

                        @include('dashboard.penjemputan.create')

                            <div>

                                <table id="penjemputan" class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Alamat Pelanggan</th>
                                            <th scope="col">Telepon</th>
                                            <th scope="col">Petugas Penjemput</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penjemputan as $pen)
                                        <tr>
                                            <td>{{ $loop->iteration }}<input type="text" hidden
                                                class="id" value="{{ $pen->id }}">
                                            </td>
                                            <td>{{ $pen->member->nama }}</td>
                                            <td>{{ $pen->member->alamat }}</td>
                                            <td>{{ $pen->member->telepon }}</td>
                                            <td>{{ $pen->petugas }}</td>
                                            <td> <select name="status" class="status form-control status-penjemputan" id="one">
                                                <option value="tercatat"
                                                    {{ $pen->status == 'Tercatat' ? 'selected' : '' }}>
                                                    Tercatat</option>
                                                <option value="penjemputan"
                                                    {{ $pen->status == 'Penjemputan' ? 'selected' : '' }}>
                                                    Penjemputan</option>
                                                <option value="selesai"
                                                    {{ $pen->status == 'Selesai' ? 'selected' : '' }}>
                                                    Selesai</option>
                                            </select>
                                        </td>
                                            <td>
                                            @include('dashboard.penjemputan.edit')
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                             </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      @push('script')
    <script>
        $(function() {
        //Data Table
            $('#penjemputan').DataTable();

        // Alert
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("success-alert").slideUp(500);
        });
        $("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("error-alert").slideUp(500);
        });

        $('#penjemputan').on('change', '.status', function() {
                    let status = $(this).closest('tr').find('.status').val()
                    let id = $(this).closest('tr').find('.id').val()
                    let data = {
                        id: id,
                        status: status,
                        _token: "{{ csrf_token() }}"
                    };
                    $.post('{{ route('status') }}', data, function(msg) {

                    })
                    console.log(id);
                    console.log(status);
                })

        // Delete Alert
        $('.delete-penjemputan').click(function(e){
            e.preventDefault()
            let data = $(this).closest('tr').find('td:eq(1)').text()
            swal({
                title: "Apakah Kamu Yakin?",
                text: "Yakin Ingin Menghapus Data yang anda pilih?",
                icon: "warning",
                buttons:true,
                dangerMode: true,
            })
            .then((req) => {
                if(req) $(e.target).closest('form').submit()
                else swal.close()
            })
        })
        // ubah status Alert
        $('.status-penjemputan').change(function(e){
            e.preventDefault()
            let data = $(this).closest('tr').find('td:eq(1)').text()
            swal({
                title: "Mengubah sukses?",
                text: "Yakin Ingin Mengubah Data yang anda pilih?",
                icon: "success",
                buttons:false,
                dangerMode: false,
            })
            .then((req) => {
                if(req) $(e.target).closest('form').submit()
                else swal.close()
            })
        })



        });
    </script>

      @endpush

@endsection

