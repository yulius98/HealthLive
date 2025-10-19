# 🏥 HealthLive - Sistem Manajemen Kesehatan & Gizi

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Livewire-3.0-4E56A6?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

<p align="center">
  <strong>🌟 Platform komprehensif untuk manajemen kesehatan dan gizi dengan fitur assessment BMI otomatis, program diet personalisasi, dan sistem manajemen pelanggan yang terintegrasi.</strong>
</p>

---

## 📋 Tentang Health Life

Health Life adalah aplikasi web modern yang dibangun dengan Laravel 11 dan Livewire untuk memberikan solusi komprehensif dalam manajemen kesehatan dan gizi. Aplikasi ini dirancang untuk membantu individu dan profesional kesehatan dalam mengelola program diet, melakukan assessment kesehatan, dan menyediakan layanan konsultasi gizi yang efektif.

### 🎯 **Fitur Utama:**

- **🔍 Assessment Kesehatan Gratis** - Sistem kalkulasi BMI otomatis dengan analisis tingkat aktivitas
- **📊 Dashboard Admin Lengkap** - Manajemen data pelanggan, produk, dan program kesehatan
- **🍎 Manajemen Barang/Produk** - Katalog produk kesehatan dan suplemen
- **📦 Paket Program Diet** - Program diet terstruktur dengan panduan video
- **👥 Registrasi Program Pelanggan** - Sistem pendaftaran dan tracking progress
- **🔐 Sistem Autentikasi** - Login/logout aman untuk admin dan pelanggan
- **📱 Interface Responsif** - Akses mudah dari desktop dan mobile

## 🚀 Cara Menggunakan Aplikasi

### 📋 **Prasyarat Sistem**
```bash
- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.0
- MySQL >= 8.0
- Laravel >= 11.0
```

### ⚙️ **Instalasi & Setup**

1. **Clone Repository**
   ```bash
   git clone https://github.com/yulius98/HealthLive.git
   cd HealthLive
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   ```bash
   # Edit file .env sesuai database Anda
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=healthlife
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Migrasi Database**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build Assets & Jalankan Server**
   ```bash
   npm run build
   php artisan serve
   ```

### 🎯 **Panduan Penggunaan**

#### **Untuk Pengguna/Pelanggan:**

1. **🔍 Cek Kesehatan Gratis**
   - Akses halaman `/cekgratis`
   - Isi data: nama, no HP, berat badan, tinggi badan
   - Pilih tingkat aktivitas (jarang/sedang/aktif)
   - Tentukan status alergi
   - Sistem akan menghitung BMI dan memberikan rekomendasi

2. **📱 Dashboard Pelanggan**
   - Login melalui `/Login`
   - Akses program diet yang diikuti
   - Monitor progress kesehatan
   - Lihat rekomendasi produk

#### **Untuk Administrator:**

1. **📊 Dashboard Admin**
   - Login sebagai admin
   - Akses berbagai modul: Barang, Paket, Assessment, Registrasi

2. **🛍️ Manajemen Barang**
   - Tambah/edit produk kesehatan
   - Set harga dan deskripsi
   - Upload gambar produk

3. **📦 Manajemen Paket Diet**
   - Buat program diet terstruktur
   - Upload panduan dan video
   - Set durasi dan target program

4. **👥 Manajemen Pelanggan**
   - Monitor registrasi pelanggan
   - Tracking progress program
   - Generate laporan assessment

## 🔮 Fitur Masa Depan (Roadmap)

### 🚀 **Phase 1 - Core Enhancement**
- [ ] **📊 Analytics Dashboard** - Grafik progress BMI dan statistik kesehatan
- [ ] **📧 Email Notifications** - Reminder program diet dan follow-up
- [ ] **💬 Chat Support** - Live chat dengan konsultan gizi
- [ ] **📱 Mobile App** - Aplikasi mobile native (Android/iOS)

### 🌟 **Phase 2 - Advanced Features**
- [ ] **🤖 AI Nutrition Assistant** - Rekomendasi makanan berbasis AI
- [ ] **📷 Food Scanner** - Scan barcode untuk info nutrisi
- [ ] **🏃 Activity Tracker Integration** - Sinkronisasi dengan fitness tracker
- [ ] **👨‍⚕️ Telemedicine** - Video call dengan dokter/nutritionist

### 🎯 **Phase 3 - Enterprise Features**
- [ ] **🏢 Multi-tenant System** - Support untuk multiple klinik
- [ ] **📈 Business Intelligence** - Advanced reporting dan analytics
- [ ] **🔗 API Integration** - Integrasi dengan sistem eksternal
- [ ] **🌐 Multi-language Support** - Dukungan bahasa internasional

### 💡 **Fitur Inovatif yang Direncanakan**

#### **🍽️ Smart Meal Planning**
- Perencanaan menu otomatis berdasarkan BMI dan preferensi
- Integrasi dengan grocery list dan delivery service
- Tracking kalori real-time dengan barcode scanner

#### **🏥 Health Monitoring**
- Integrasi dengan wearable devices (smartwatch, fitness band)
- Monitoring vital signs (detak jantung, tekanan darah)
- Alert system untuk parameter kesehatan abnormal

#### **🎓 Educational Platform**
- Video course nutrition dan wellness
- Webinar dengan expert nutritionist
- Community forum untuk sharing pengalaman

#### **💊 Supplement Tracking**
- Reminder konsumsi suplemen
- Tracking efektivitas suplemen
- Drug interaction checker

## 🛠️ Tech Stack & Arsitektur

### **Backend Technologies**
- **Laravel 11** - PHP Framework dengan Eloquent ORM
- **Livewire 3.0** - Real-time UI components tanpa JavaScript
- **MySQL 8.0** - Database relational dengan high performance
- **PHP 8.2** - Bahasa pemrograman dengan fitur modern

### **Frontend Technologies**
- **Blade Templates** - Laravel templating engine
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Frontend build tool yang cepat

### **Key Features Implementation**
```php
// BMI Calculation Algorithm
$tinggi_meter = $tinggi_badan / 100;
$bmi = $berat_badan / ($tinggi_meter * $tinggi_meter);

// Activity Level Adjustment
if ($aktivitas == 'jarang') $bmi -= 0.5;
elseif ($aktivitas == 'aktif') $bmi += 0.5;

// Health Status Classification
if ($bmi < 18.5) $status = 'underweight';
elseif ($bmi >= 18.5 && $bmi < 24.9) $status = 'normal';
else $status = 'overweight';
```

## 🤝 Contributing

Kami menyambut kontribusi dari komunitas! Berikut cara untuk berkontribusi:

1. **Fork** repository ini
2. **Create** feature branch (`git checkout -b feature/AmazingFeature`)
3. **Commit** changes (`git commit -m 'Add some AmazingFeature'`)
4. **Push** to branch (`git push origin feature/AmazingFeature`)
5. **Open** Pull Request

### 📝 **Contribution Guidelines**
- Ikuti PSR-12 coding standards
- Tulis test untuk fitur baru
- Update dokumentasi jika diperlukan
- Pastikan CI/CD pipeline berhasil

## 🔒 Security & Privacy

- Data pelanggan dienkripsi menggunakan Laravel Encryption
- Password menggunakan bcrypt hashing
- Session management dengan secure cookies
- Input sanitization untuk mencegah XSS/SQL Injection
- CSRF protection pada semua form

## 📞 Support & Contact

- **📧 Email**: healthlive.support@gmail.com
- **🐛 Bug Reports**: [GitHub Issues](https://github.com/yulius98/HealthLive/issues)
- **💬 Discussions**: [GitHub Discussions](https://github.com/yulius98/HealthLive/discussions)
- **📖 Documentation**: [Wiki Pages](https://github.com/yulius98/HealthLive/wiki)

## 📄 License

Aplikasi HealthLive dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

---

<p align="center">
  <strong>💚 Dibuat dengan ❤️ untuk kesehatan yang lebih baik</strong><br>
  <em>HealthLive - Your Partner in Healthy Living</em>
</p>
