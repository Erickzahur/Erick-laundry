    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $u->id }}">
        Edit
    </button>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{ $u->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-dark">
        <h5 class="modal-title" id="exampleModalLabel">Input New Data</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="/{{ request()->segment(1) }}/user/{{ $u->id }}" method="POST" class="mb-5 text-dark" enctype="multipart/form-data" style>
            @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $u->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username', $u->username) }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email',$u->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_outlet" class="form-label">Outlet</label>
              <select class="form-select form-select mb-3" aria-label=".form-select example" id="outlet" name="id_outlet">
                  <option selected>Pilih Outlet</option>
                  @foreach ($outlet as $o )
                  <option value="{{ $o->id }}">{{ $o->nama }}</option>
                  @endforeach
                </select>
            @error('outlet')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select form-select mb-3" aria-label=".form-select example" id="role" name="role">
              <option selected>Pilih Role</option>
              <option name="role">admin</option>
              <option name="role">owner</option>
            </select>
            @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"Register</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
    </div>
    </div>
    <form action="/{{ request()->segment(1)}}/user/{{ $u->id }}" method="post" class="d-inline">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-danger delete-paket btn-sm border-0">Delete</button> &nbsp;
        </form>
