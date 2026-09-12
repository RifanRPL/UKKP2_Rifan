@include('admin.layout.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Keluhan</h4>
            </div>
            <div class="card-body">  
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>User (Pelapor)</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($allKeluhan as $key => $k)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $k->user->name ?? 'Anonim' }}</td>
                                <td>{{ $k->kategori->nama_kategori ?? '-' }}</td>
                                <td>{{ $k->judul }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('keluhan.show', $k->id) }}">Detail</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada keluhan yang masuk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('admin.layout.footer')