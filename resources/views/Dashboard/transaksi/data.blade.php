<div class="collapse" id="dataLaundry">

        <!-- Table -->
        <div class="row">
            <div class="col">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Data Transaksi</h3>
                    </div>
                    <div class="table-responsive">
                        <table id="tb-laporan" class="table align-items-center table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Invoice</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Pembayaran</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $transaksi)
                                    <tr>
                                        <td>{{ $i = isset($i) ? ++$i : ($i = 1) }}</td>
                                        <td>{{ $transaksi->kode_invoice }}</td>
                                        <td>{{ $transaksi->member->nama }}</td>
                                        <td>{{ $transaksi->status }}</td>
                                        <td>{{ $transaksi->status_pembayaran }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success  border-0"
                                                data-toggle="modal" data-target="#DetailModal{{ $transaksi->id }}">
                                                Detail
                                            </button>
                                            <a href="/a/transaksi/faktur/{{ $transaksi->id }}" class="btn btn-outline-primary border-0">Faktur</a>
                                            {{-- <button type="button" class="btn btn-outline-primary  border-0"
                                                data-toggle="modal" data-target="#Faktur{{ $dt->id_transaksi }}">
                                                Faktur
                                            </button> --}}
                                        </td>
                                    </tr>
                                    @include('dashboard.transaksi.detail')
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>

        @push('script')
            <script>
                $(function() {
                    $('#tb-laporan').DataTable();
                });
            </script>
        @endpush

</div>
