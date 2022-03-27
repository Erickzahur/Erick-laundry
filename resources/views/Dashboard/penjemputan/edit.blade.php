     <!-- Button trigger modal -->
     <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPenjemputan{{ $pen->id }}">
        Edit
    </button>
 <!-- Modal -->
<div class="modal fade" id="editPenjemputan{{ $pen->id }}" tabindex="-1" role="dialog" aria-labelledby="editPenjemputanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h5 class="modal-title" id="editPenjemputanLabel">Input New Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{ request()->segment(1)}}/penjemputan/{{ $pen->id }}" method="POST" class="mb-5 text-dark" enctype="multipart/form-data" style>
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="pelanggan" class="form-label">Pelanggan</label>
                        <select class="form-select form-control col-8 form-select mb-3" aria-label=".form-select example" id="pelanggan" name="id_member"required autofocus value="{{ old('pelanggan', $pen->member->id) }}>
                            @foreach ($member as $m )
                            <option value="{{$m->id}}">{{$m->nama }}</option>
                            @endforeach
                        </select>
                        @error('outlet')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="petugas" class="form-label">petugas</label>
                        <input type="text" class="form-control col-8 form-select mb-3 @error('petugas') is-invalid @enderror" id="petugas" name="petugas" required autofocus value="{{ old('petugas', $pen->petugas) }}">
                        @error('petugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="status" class="form-label">status </label>
                        <select class="form-select form-control col-8 form-select mb-3" aria-label=".form-select example" id="status" name="status" required autofocus value="{{ old('status') }}">
                          <option selected>Pilih status Paket</option>
                          <option name="status" value="Tercatat">Tercatat</option>
                          <option name="status" value="Penjemputan">Penjemputan</option>
                          <option name="status" value="Selesai">Selesai</option>

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

<form action="/{{ request()->segment(1)}}/penjemputan/{{ $pen->id }}" method="post" class="d-inline">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button class="btn btn-danger btn-sm delete-penjemputan border-0">Delete</button> &nbsp;
    </form>
