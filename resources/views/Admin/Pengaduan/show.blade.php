@include('admin.layout.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Detail pengaduan</h4>
                <a class="btn btn-secondary btn-sm" href="{{ route('pengaduanAdmin.index') }}">
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th>ID Pengaduan</th>
                                <td>: {{ $pengaduan->id }} </td>
                            </tr>
                            <tr>
                                <th>ID Pengadu</th>
                                <td>: {{ $pengaduan->user_id }} </td>
                            </tr>
                            <tr>
                                <th>Nama Pengadu</th>
                                <td>: {{ $pengaduan->nama_pengadu }} </td>
                            </tr>
                            <tr>
                                <th>No Telp Pengadu</th>
                                <td>: {{ $pengaduan->no_telp }} </td>
                            </tr>
                            <tr>
                                <th>Email Pengadu</th>
                                <td>: {{ $pengaduan->email }} </td>
                            </tr>
                            <tr>
                                <th>Isi Pengaduan</th>
                                <td>
                                    <div class="p-3 bg-light rounded border">
                                        {{ $pengaduan->isi }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Lampiran Bukti</th>
                                <td>
                                    @if($pengaduan->foto)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Lampiran pengaduan" class="img-thumbnail rounded" style="max-width: 350px; height: auto;">
                                            </div>                              
                                    @else
                                        <span class="text-muted">Tidak ada lampiran.</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Dubuat Pada</th>
                                <td>: {{ $pengaduan->created_at }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layout.footer')