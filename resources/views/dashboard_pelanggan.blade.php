<x-leandingpage>
  <x-nav-bar-pelanggan/>

  <div class="container pt-5" style="padding-top: 6rem !important;">
    <h1 class="mb-4 text-center font-alt">Paket Milik Anda</h1>
    <div class="row g-2">
      <div class="col-md-12">
        <div class="row g-6">
          @foreach ($dtprogpelanggan as $pelanggan)
            <div class="col-md-6 col-lg-4">
              <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                  <h2 class="card-title fw-bold font-medium">{{ $pelanggan->nama_paket }}</h2>
                  <h3 class="card-subtitle mb-3 ">Nama Pelanggan : {{ $pelanggan->nama }}</h3>
                  <div class="mt-auto">
                    <a href="{{ Storage::url($pelanggan->panduan_paket) }}" download class="btn btn-primary me-2 mb-2 d-inline-flex align-items-center">
                      <i class="far fa-file-pdf me-2"></i> PANDUAN PROGRAM (PDF)
                    </a>
                    <a href="{{ Storage::url($pelanggan->video_panduan) }}" download class="btn btn-primary mb-2 d-inline-flex align-items-center">
                      <i class="far fa-file-video me-2"></i> PANDUAN VIDEO (MP4)
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-20 d-flex justify-content-center align-items-center">
        <video controls class="rounded shadow w-100 h-auto">
          <source src="{{ Storage::url($dtprogpelanggan->last()->video_panduan) }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
</x-leandingpage>
