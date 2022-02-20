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
                  <h2>Tabel paket</h2>
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

                    @include('dashboard.paket.create')
                            <div>
                                <table id="tb-paket" class="table table-striped table-md">
                                    <thead>
                                        <th scope="col">No</th>
                                        <th scope="col">Outlet</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nama Paket</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($paket as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->id_outlet }}</td>
                                            <td>{{ $p->jenis }}</td>
                                            <td>{{ $p->nama_paket }}</td>
                                            <td>{{ $p->harga }}</td>
                                            <td>
                                            @include('dashboard.paket.edit')
                                          <form action="{{ url('dashboard/paket/'.$p->id) }}" method="post" class="d-inline">
                                              @csrf
                                              <input type="hidden" name="_method" value="DELETE">
                                              <button class="btn btn-danger border-0" onclick="return confirm('Anda Yakin?')">Delete</button>
                                          </form>
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
          $(function(){
              $('#tb-paket').DataTable();
          });
      </script>

        @endpush

@endsection

