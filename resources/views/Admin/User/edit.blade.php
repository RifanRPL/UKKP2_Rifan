@include('admin.layout.header')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                    <div class="col-md-10">
                        <input class="form-control" name="name" value="{{ $user->name }}" type="text" id="example-text-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">No Hp</label>
                    <div class="col-md-10">
                        <input class="form-control" name="no_telp" value="{{ $user->no_telp }}" type="number" id="example-text-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input class="form-control" name="email" value="{{ $user->email }}"  type="email" id="example-email-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                        <input class="form-control" name="password" placeholder="Enter New Password (Optional)" type="password" id="example-password-input">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Role</label>
                    <div class="col-md-10">
                        <select class="form-select" name="role_id">
                            <option value="1" @if($user->role_id == '1') selected @endif>Admin</option>
                            <option value="2" @if($user->role_id == '2') selected @endif>Petugas</option>
                            <option value="3" @if($user->role_id == '3') selected @endif>Customer</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Selesai</button>
                <a class="btn btn-primary" href="{{ route('user.index', $user->id) }}">Batal</a>
            </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@include('admin.layout.footer')