# 🚗 Aplikasi Pemesanan Kendaraan Perusahaan Tambang

---

## 📋 Informasi Sistem

| Komponen   | Versi              |
| ---------- | ------------------ |
| PHP        | 7.3                |
| Database   | MySQL 5.2.1        |
| PhpMyAdmin | 5.2.1              |
| Framework  | CodeIgniter 3.1.13 |

---

## 👥 Daftar Username & Password

| Role       | Username    | Password |
| ---------- | ----------- | -------- |
| Admin      | `admin`     | `123456` |
| Admin      | `admin2`    | `123456` |
| Approver 1 | `approver1` | `123456` |
| Approver 1 | `leader1`   | `123456` |
| Approver 2 | `approver2` | `123456` |
| Approver 2 | `leader2`   | `123456` |

---

## 🚀 Panduan Penggunaan Aplikasi

### 1. Instalasi

1. Clone repository ini:
   ```bash
   git clone https://github.com/hendrikusriko/vehicle-monitoring-ci3.git
   ```
2. Pindahkan ke folder project:

   ```bash
   cd nama-repo
   ```

3. Atur konfigurasi database:

   - Buka `application/config/database.php`
   - Sesuaikan bagian berikut:

   ```php
   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'db_vehicle_monitoring',
   ```

4. Import file database:

   - Gunakan PhpMyAdmin
   - Import file `db_vehicle_monitoring.sql` yang tersedia di folder `/database`

5. Jalankan aplikasi melalui browser:
   ```
   http://localhost/vehicle-monitoring-ci3/index.php/auth/login
   ```

---

## 📦 Fitur Utama

- Pemesanan kendaraan oleh admin
- Penunjukan driver & pihak approver
- Persetujuan berjenjang (minimal 2 level)
- Dashboard pemakaian kendaraan (grafik dan data)
- Laporan periodik yang bisa di-export ke Excel

---
