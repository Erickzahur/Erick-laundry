<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPenjemputan{{ $pb->id }}">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="editPenjemputan{{ $pb->id }}" tabindex="-1" role="dialog" aria-labelledby="editPenjemputanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h5 class="modal-title" id="exampleModalLabel">Edit New Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{ request()->segment(1)}}/PenggunaanBarang/{{ $pb->id }}" method="POST" class="mb-5" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required autofocus value="{{ old('nama_barang',$pb->nama_barang) }}">
                        @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">qty</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" required autofocus value="{{ old('qty',$pb->qty) }}">
                        @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required autofocus value="{{ old('harga',$pb->harga) }}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu_beli" class="form-label"> Waktu beli</label>
                        <input type="datetime-local" class="form-control @error('waktu_beli') is-invalid @enderror" id="waktu_beli" name="waktu_beli" required autofocus value="{{ old('waktu_beli',$pb->waktu_beli) }}">
                        @error('waktu_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label"> Supplier</label>
                        <input type="text" class="form-control @error('supplier') is-invalid @enderror" id="supplier" name="supplier" required autofocus value="{{ old('supplier',$pb->supplier) }}">
                        @error('supplier')
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

<form action="/{{ request()->segment(1)}}/PenggunaanBarang/{{ $pb->id }}" method="post" class="d-inline">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button class="btn btn-danger btn-sm delete-PenggunaanBarang border-0">Delete</button> &nbsp;
</form>
