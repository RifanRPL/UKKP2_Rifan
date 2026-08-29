@include('admin.layout.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Detail Keluhan</h4>
                <a class="btn btn-secondary btn-sm" href="{{ route('admin.keluhan.index') }}">
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">User (Pelapor)</th>
                                <td>: {{ $keluhan->user->name ?? 'Anonim' }} ({{ $keluhan->user->email ?? '-' }})</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>: <span class="badge bg-primary font-size-12">{{ $keluhan->kategori->nama_kategori ?? '-' }}</span></td>
                            </tr>
                            <tr>
                                <th>Tanggal Dibuat</th>
                                <td>: {{ $keluhan->created_at->format('d M Y, H:i') }} WIB</td>
                            </tr>
                            <tr>
                                <th>Judul Keluhan</th>
                                <td>: <strong>{{ $keluhan->judul }}</strong></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>
                                    <div class="p-3 bg-light rounded border">
                                        {{ $keluhan->deskripsi }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Lampiran Bukti</th>
                                <td>
                                    @if($keluhan->lampiran)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $keluhan->lampiran) }}" alt="Lampiran Keluhan" class="img-thumbnail rounded" style="max-width: 350px; height: auto;">
                                            </div>                              
                                    @else
                                        <span class="text-muted">Tidak ada lampiran.</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layout.footer')