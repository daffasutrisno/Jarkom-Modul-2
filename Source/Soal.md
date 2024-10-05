# Soal Topologi Jaringan

## Soal:

1. **Topologi** terdiri dari node **Wortel** yang berupa DNS Master*. Selain itu, terdapat pula node **Pokcoy** sebagai DNS Slave*, yang bertugas sebagai cadangan dari node Wortel.  
   Selanjutnya terdapat node **Tomat** dan **Taoge** yang berfungsi sebagai Client*, serta tiga buah Web Server* yaitu **Bayam**, **Buncis**, dan **Brokoli**. **Mayur** berfungsi sebagai **Router**. Buatlah topologi sesuai dengan pembagian topologi di sini dan konfigurasi topologi di sini. Pastikan bahwa setiap node dapat terhubung ke Internet.  

   *Terdapat informasi lebih lanjut pada footnote.*

2. Tambahkan konfigurasi untuk domain **bayam.yyy.com** yang mengarah ke IP node **Bayam** di DNS Master.  
   Dengan cara yang sama, buat konfigurasi domain **brokoli.yyy.com** yang mengarah ke IP node **Brokoli**, serta domain **buncis.yyy.com** yang mengarah ke IP node **Buncis**.  
   Simpan semua konfigurasi dalam folder **Jarkom**. Selama pengerjaan soal, ubah **yyy** menjadi kode kelompok masing-masing (contoh: A02).

   Jangan lupa untuk mengupdate konfigurasi kedua client agar dapat berkomunikasi dengan semua domain tersebut.

3. Tambahkan domain alias berupa **www.bayam.yyy.com** pada alamat **bayam.yyy.com** dan **www.brokoli.yyy.com** pada alamat **brokoli.yyy.com**.

4. Tambahkan **record reverse domain** untuk domain **brokoli.yyy.com** dan **buncis.yyy.com**.

5. Ubah **record SOA** dari domain **bayam.yyy.com** sesuai dengan ketentuan berikut:
   - Lama waktu server slave menunggu untuk mengecek salinan baru dari server master adalah 2 jam.
   - Field yang mengatur revisi file zona diubah menjadi tanggal awal praktikum (format YYYYMMDD), kemudian diikuti dengan nomor kelompok (contoh untuk kelompok A02 maka nomornya adalah 02).
   - Waktu server harus menunggu untuk meminta pembaruan lagi dari nameserver master yang tidak responsif adalah 30 menit.
   - Lama waktu nama domain di-cache secara lokal sebelum kadaluarsa adalah 12 jam.
   - Jika server slave tidak mendapat respons dari server master dalam waktu 2 minggu, server harus berhenti merespons kueri untuk zona tersebut.

6. Untuk menangani **request berlebih** dari client ke ketiga domain yang tadi dibuat, konfigurasikan node **Pokcoy** sebagai DNS Slave yang bekerja untuk DNS Master **Wortel**.

7. Karena membutuhkan tempat untuk menyimpan resep brokoli, buatlah **subdomain vitamin.brokoli.yyy.com** dengan alias **www.vitamin.brokoli.yyy.com** dan delegasikan dari **Wortel** ke **Pokcoy** dengan IP yang mengarah ke **Brokoli**, disimpan di folder **Vitamin**.

8. Buatlah subdomain untuk kandungan brokoli dengan akses **k1.vitamin.brokoli.yyy.com** dan alias **www.k1.vitamin.brokoli.yyy.com** yang mengarah ke IP **Brokoli**, disimpan di folder **k1**.

9. **Bayam**, **Brokoli**, dan **Buncis** masing-masing berfungsi sebagai web server **nginx** yang menyajikan resep khusus sayuran yang mereka kelola.  
   Untuk mengaktifkan web server, lakukan **deployment website** menggunakan sumber yang ada di **sayur_webserver_nginx**. Tambahkan konfigurasi untuk log error ke file `/var/log/nginx/error.log` dan log akses ke file `/var/log/nginx/access.log`.  
   Cek dengan **lynx** ke domain masing-masing web server dari node client.

10. Pada masing-masing web server nginx, perbaiki kesalahan pada resource yang ada agar halaman dapat menampilkan resep saat dimuat.  
    Analisis kesalahan dari file `/var/log/nginx/error.log` dan lakukan perbaikan hingga halaman menampilkan resep sesuai dengan node masing-masing.

11. Setelah website berhasil dideploy dan halaman menampilkan resep yang sesuai, buatlah **custom access log** di file `/var/log/nginx/access.log` dengan format tertentu seperti berikut:

    - Tanggal dan waktu akses dalam format standar log.
    - Nama node yang sedang diakses (misalnya: Bayam, Brokoli, atau Buncis).
    - Alamat IP klien yang mengakses website.
    - Metode HTTP dan URI yang diakses.
    - Status respons HTTP yang diberikan server.
    - Jumlah byte yang dikirim dalam respons.
    - Waktu yang dihabiskan server untuk menangani permintaan.

    Contoh format log:
    ```  
    [01/Oct/2024:11:30:45 +0000] Jarkom Node Bayam Access from 192.168.1.15 using method "GET /resep/bayam HTTP/1.1" returned status 200 with 2567 bytes sent in 0.038 seconds  
    ```

12. Informasi vitamin brokoli akan ditampilkan pada subdomain **vitamin.brokoli.yyy.com** di node **Brokoli**.  
    Buat **DocumentRoot** di `/var/www/vitamin.brokoli.yyy`. Konfigurasikan web server dengan **ServerName** **vitamin.brokoli.yyy.com** dan **ServerAlias** **www.vitamin.brokoli.yyy.com**.  
    Konfigurasikan **Apache Web Server** di **Brokoli** dan cek dengan **lynx** dari node client.

13. Pada subdomain **vitamin.brokoli.yyy.com**, terdapat subfolder `/nutrisi` yang menyediakan informasi tentang berbagai vitamin dalam brokoli.  
    Aktifkan **directory listing** untuk folder `/nutrisi`, dan buat **rewrite rule** di Apache agar URL seperti `www.vitamin.brokoli.yyy.com/nutrisi/vitamin_a.php` dapat diakses dengan `www.vitamin.brokoli.yyy.com/nutrisi/vitamin_a`.

14. Tambahkan alias untuk folder `/public/images/` pada subdomain **www.vitamin.brokoli.yyy.com** agar folder tersebut dapat diakses melalui URL **www.vitamin.brokoli.yyy.com/img**.

15. Karena terdapat resep rahasia di file `/secret/recipe_secret.txt` pada subdomain **www.vitamin.brokoli.yyy.com**, konfigurasikan folder `/secret` agar tidak dapat diakses pengguna (menampilkan **403 Forbidden**).

16. Ubah konfigurasi **www.vitamin.brokoli.yyy.com/public/js** menjadi **www.vitamin.brokoli.yyy.com/js**.

17. Ubah konfigurasi **www.k1.vitamin.brokoli.yyy.com** agar hanya dapat diakses melalui port **9696** dan **8888**. Gunakan sumber yang tersedia di sini.

18. Buat **autentikasi** dengan username **Seblak** dan password **sehatyyy** (yyy adalah kode kelompok) dengan **DocumentRoot** di `/var/www/k1.vitamin.brokoli.yyy`.

19. Konfigurasikan agar setiap kali IP **Brokoli** diakses dengan **lynx**, otomatis dialihkan ke **www.brokoli.yyy.com** (alias).

20. Karena peningkatan pengunjung di website **www.vitamin.brokoli.yyy.com** dan banyaknya gambar random, ubah permintaan gambar yang mengandung substring **vitamin** agar diarahkan ke file **vitamin.png**.
