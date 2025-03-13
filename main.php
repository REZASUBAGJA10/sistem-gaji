<?php
require_once "functions.php";

while (true) {
    echo "\n=== Sistem Management Gaji ===\n";
    echo "1. Lihat Karyawan\n";
    echo "2. Tambah Karyawan\n";
    echo "3. Update Karyawan\n";
    echo "4. Hapus Karyawan\n";
    echo "5. Hitung Gaji Karyawan\n";
    echo "6. Keluar\n";
    echo "Pilih menu (1-6): ";

    $pilihan = trim(fgets(STDIN));

    switch ($pilihan) {
        case "1":
            lihatKaryawan($karyawan);
            break;
        case "2":
            tambahKaryawan($karyawan);
            break;
        case "3":
            updateKaryawan($karyawan);
            break;
        case "4":
            hapusKaryawan($karyawan);
            break;
        case "5":
            hitungGaji($karyawan);
            break;
        case "6":
            echo "Terima kasih, sampai jumpa!\n";
            exit;
        default:
            echo "Pilihan tidak valid! Coba lagi.\n";
    }
}
?>
