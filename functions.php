<?php
require_once "model/gaji.php";

function lihatKaryawan($karyawan) {
    echo "Daftar Karyawan:\n";
    foreach ($karyawan as $k) {
        echo "{$k['id']}. Nama: {$k['nama']}, Jabatan: {$k['jabatan']}\n";
    }
}

function tambahKaryawan(&$karyawan) {
    echo "Masukkan Nama: ";
    $nama = trim(fgets(STDIN));

    echo "Masukkan Jabatan (Manajer/Supervisor/Staf): ";
    $jabatan = trim(fgets(STDIN));

    $id = count($karyawan) + 1;
    $karyawan[] = ["id" => $id, "nama" => $nama, "jabatan" => $jabatan, "gaji_pokok" => 5000000];

    echo "✅Karyawan berhasil ditambahkan!\n";
}

function updateKaryawan(&$karyawan) {
    lihatKaryawan($karyawan);
    echo "Masukkan ID karyawan yang ingin diupdate: ";
    $id = trim(fgets(STDIN));

    foreach ($karyawan as &$k) {
        if ($k["id"] == $id) {
            echo "Masukkan Nama Baru: ";
            $k["nama"] = trim(fgets(STDIN));
            echo "Masukkan Jabatan Baru: ";
            $k["jabatan"] = trim(fgets(STDIN));
            echo "✅Data berhasil diupdate!\n";
            return;
        }
    }
    echo "Karyawan tidak ditemukan.\n";
}

function hapusKaryawan(&$karyawan) {
    lihatKaryawan($karyawan);
    echo "Masukkan ID karyawan yang ingin dihapus: ";
    $id = trim(fgets(STDIN));

    foreach ($karyawan as $index => $k) {
        if ($k["id"] == $id) {
            echo "\nAnda akan menghapus karyawan berikut:\n";
            echo "Nama: {$k['nama']}\n";
            echo "Jabatan: {$k['jabatan']}\n";
            echo "Apakah Anda yakin ingin menghapus? (y/n): ";

            $konfirmasi = trim(fgets(STDIN));

            if (strtolower($konfirmasi) === "y") {
                unset($karyawan[$index]);
                echo "✅ Karyawan berhasil dihapus!\n";
            } else {
                echo "❌ Penghapusan dibatalkan.\n";
            }
            return;
        }
    }
    echo "⚠️ Karyawan tidak ditemukan.\n";
}

function hitungGaji($karyawan) {
    lihatKaryawan($karyawan);
    echo "Masukkan ID karyawan yang ingin dihitung gajinya: ";
    $id = trim(fgets(STDIN));

    foreach ($karyawan as $k) {
        if ($k["id"] == $id) {
            echo "Masukkan jumlah jam lembur: ";
            $jamLembur = (int) trim(fgets(STDIN));

            echo "Masukkan rating kinerja (1-5): ";
            $rating = (int) trim(fgets(STDIN));

            // Komponen gaji
            $gajiPokok = 5000000; // Contoh gaji pokok
            $tunjanganJabatan = ($k["jabatan"] == "Manajer") ? 2000000 : 1000000;
            $bonusKinerja = ($rating >= 4) ? 1000000 : 500000;
            $lembur = $jamLembur * 25000;

            $totalGaji = $gajiPokok + $tunjanganJabatan + $bonusKinerja + $lembur;

            // Tampilkan hasil perhitungan
            echo "\n💰 Gaji Karyawan:\n";
            echo "Nama: {$k['nama']}\n";
            echo "Jabatan: {$k['jabatan']}\n";
            echo "Gaji Pokok: Rp " . number_format($gajiPokok, 0, ',', '.') . "\n";
            echo "Tunjangan Jabatan: Rp " . number_format($tunjanganJabatan, 0, ',', '.') . "\n";
            echo "Jam Lembur: {$jamLembur} jam x Rp 25.000\n";
            echo "Lembur: Rp " . number_format($lembur, 0, ',', '.') . "\n";
            echo "Bonus Kinerja: Rp " . number_format($bonusKinerja, 0, ',', '.') . "\n";
            echo "🟢 Total Gaji: Rp " . number_format($totalGaji, 0, ',', '.') . "\n";

            return;
        }
    }
    echo "⚠️ Karyawan tidak ditemukan.\n";
}
function keluarAplikasi() {
    echo "\nTerimakasih, sampai jumpa! 👋\n";
    exit;
}

?>
