@include('cust.layout.header')
        <h2>Pengaduan</h2>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Pengaduan</h4>
                <p class="card-title-desc">Sampaikan keluhan atau masalah yang Anda alami di bawah ini.</p>
            </div>
            <div class="card-body">
                
                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="mb-3 row">
                        <label for="nama_pengadu" class="col-md-2 col-form-label">Nama Pengadu</label>
                        <div class="col-md-10">
                            <input class="form-control" name="nama_pengadu" value="{{ auth()->user()->name }}" type="text" id="nama_pengadu" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="no_telp" class="col-md-2 col-form-label">No Hp</label>
                        <div class="col-md-10">
                            <input class="form-control" name="no_telp" value="{{ auth()->user()->no_telp }}" type="text" id="no_telp" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" name="email" value="{{ auth()->user()->email }}" type="email" id="email" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-md-2 col-form-label">Isi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="isi" id="deskripsi" rows="5" placeholder="Jelaskan secara detail masalah yang Anda alami..." required></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lampiran" class="col-md-2 col-form-label">Lampiran (Foto/Bukti)</label>
                        <div class="col-md-10">
                            <input class="form-control @error('lampiran') is-invalid @enderror" type="file" name="foto" id="foto" accept="image/*,.pdf">
                            <small class="text-muted">*Format yang diizinkan: JPG, PNG, PDF (Maksimal 2MB)</small>
                            @error('foto')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 offset-md-2">
                            <button class="btn btn-primary" type="submit">
                                Kirim Keluhan
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

@include('cust.layout.footer')