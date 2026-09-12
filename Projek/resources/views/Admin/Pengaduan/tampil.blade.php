@include('admin.layout.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Pengaduan</h4>
            </div>
            <div class="card-body">  

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>ID Pengadu</th>
                                <th>Nama Pengadu</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Isi Pengaduan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $key => $k)
                            <tr>
                                <td>{{ $k->user_id }}</td>
                                <td>{{ $k->nama_pengadu }}</td>
                                <td>{{ $k->no_telp }}</td>
                                <td>{{ $k->email }}</td>
                                <td>{{ Str::limit($k->isi, 50) }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-primary btn-sm" href="{{ route('pengaduanAdmin.show', $k->id) }}">
                                            Detail
                                        </a>

                                        <form action="{{ route('pengaduanAdmin.destroy', $k->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
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
@include('admin.layout.footer')