<x-leandingpage>
    <x-nav-bar-home/>
    <div class="d-flex flex-column min-vh-100">
        <div class="container flex-grow-1" style="max-width: 600px; margin-top: 100px;">
            <div class="card shadow-sm shadow-black p-4">
                <form id="FormCekGratis" action="/cekgratis" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row align-items-center">
                        <!-- <label for="registrationNumber" class="col-sm-4 col-form-label fw-light text-black">No Reg</label> -->
                        <div class="col-sm-8">
                            <input type="hidden" id="registrationNumber" name="registrationNumber" readonly class="form-control">
                        </div>
                    </div>

                    <script>
                        function generateRegistrationNumber(date = new Date()) {
                            const months = [
                                "JAN", "FEB", "MAR", "APR", "MEI", "JUN",
                                "JUL", "AGU", "SEP", "OKT", "NOV", "DES"
                            ];
                            const monthCode = months[date.getMonth()];

                            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                            let randomPart = '';
                            for (let i = 0; i < 4; i++) {
                                randomPart += chars.charAt(Math.floor(Math.random() * chars.length));
                            }

                            return `${monthCode}-${randomPart}`;
                        }

                        // Masukkan ke dalam input
                        const regNumber = generateRegistrationNumber();
                        document.getElementById("registrationNumber").value = regNumber;
                    </script>

                    <div class="mb-3 row align-items-center">
                        <label for="nama" class="col-sm-4 col-form-label fw-light text-black">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" id="nama" name="nama" required class="form-control" >
                        </div>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <label for="no_hp" class="col-sm-4 col-form-label fw-light text-black">No HP</label>
                        <div class="col-sm-8">
                            <input type="number" id="no_hp" name="no_hp" required class="form-control">
                        </div>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <label for="berat_badan" class="col-sm-4 col-form-label fw-light text-black">Berat Badan</label>
                        <div class="col-sm-6">
                            <input type="number" id="berat_badan" name="berat_badan" required class="form-control" >
                        </div>
                        <label class="col-sm-2 col-form-label fw-light text-black">Kg</label>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <label for="tinggi_badan" class="col-sm-4 col-form-label fw-light text-black">Tinggi Badan</label>
                        <div class="col-sm-6">
                            <input type="number" id="tinggi_badan" name="tinggi_badan" required class="form-control" >
                        </div>
                        <label class="col-sm-2 col-form-label fw-light text-black">cm</label>
                    </div>

                    <fieldset class="mb-3 row">
                        <legend class="col-form-label col-sm-4 pt-0 fw-light text-black">Aktifitas</legend>
                        <div class="col-sm-8 d-flex gap-3">
                            <div class="form-check">
                                <input type="radio" id="aktifitas_jarang" name="aktifitas" value="jarang" class="form-check-input" required>
                                <label for="aktifitas_jarang" class="form-check-label">Jarang</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="aktifitas_sedang" name="aktifitas" value="sedang" class="form-check-input" required>
                                <label for="aktifitas_sedang" class="form-check-label">Sedang</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="aktifitas_aktif" name="aktifitas" value="aktif" class="form-check-input" required>
                                <label for="aktifitas_aktif" class="form-check-label">Aktif</label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3 row">
                        <legend class="col-form-label col-sm-4 pt-0 fw-light text-black">Alergi</legend>
                        <div class="col-sm-8 d-flex gap-3">
                            <div class="form-check">
                                <input type="radio" id="alergi_yes" name="alergi" value="ya" class="form-check-input" required>
                                <label for="alergi_yes" class="form-check-label">Ya</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="alergi_no" name="alergi" value="tidak" class="form-check-input" required>
                                <label for="alergi_no" class="form-check-label">Tidak</label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-end gap-3 mt-4">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-4 mt-auto" style="background-color: rgb(11, 76, 3);">
            <div class="container px-1">
                <div class="text-white small">
                    <div class="mb-2">PT ABC</div>
                    <div class="mb-2">Jl. Contoh Alamat No.123, Jakarta</div>
                    <div class="mb-2">Email: xxx@gmail.com</div>
                    
                </div>
            </div>
        </footer>
    </div>
</x-leandingpage>
