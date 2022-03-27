<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h5 class="modal-title" id="exampleModalLabel">Input New Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/a/PenggunaanBarang" method="POST" class="mb-5 text-dark" enctype="multipart/form-data" style>
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required autofocus value="{{ old('nama_barang') }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">qty</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" required autofocus value="{{ old('qty') }}">
                        @error('qty')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required autofocus value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu_beli" class="form-label"> Waktu beli</label>
                        <input type="datetime-local" class="form-control @error('waktu_beli') is-invalid @enderror" id="waktu_beli" name="waktu_beli" required autofocus value="{{ old('waktu_beli') }}">
                        @error('waktu_beli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label"> Supplier</label>
                        <input type="text" class="form-control @error('supplier') is-invalid @enderror" id="supplier" name="supplier" required autofocus value="{{ old('supplier') }}">
                        @error('supplier')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                      <div class="mb-3">
                        <label for="status" class="form-label">status </label>
                        <select class="form-select form-control col-8 form-select mb-3" aria-label=".form-select example" id="status" name="status" required autofocus value="{{ old('status') }}">
                          <option selected>Pilih status Paket</option>
                          <option name="status" value="Diajukan_beli ">Diajukan Beli</option>
                          <option name="status" value="Habis">Habis</option>
                          <option name="status" value="Tersedia">Tersedia</option>

                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary">Create Post</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
