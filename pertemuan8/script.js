// LATIHAN 1: MANIPULASI ELEMEN TEKS DAN GAYA

const teksSambutan = document.getElementById("teks-sambutan");
const teksKeterangan = document.getElementById("teks-keterangan");
const btnUbah = document.getElementById("btn-ubah");
const btnReset = document.getElementById("btn-reset");

btnUbah.addEventListener("click", function() {
    teksSambutan.textContent = "Status: Javascript Aktif!";
    teksSambutan.style.color = "#ffcc00"; // mengubah warna teks menjadi kuning
    teksKeterangan.textContent = "DOM berhasil dimanipulasi melalui event click";
});

btnReset.addEventListener("click", function() {
    teksSambutan.textContent = "Selamat Datang di Praktikum Web!";
    teksSambutan.style.color = "#0f172a"; // mengubah warna teks menjadi hitam
    teksKeterangan.textContent = "Teks ini akan mengalami perubahan isi dan warna.";
});

// LATIHAN 2: Live Input Preview

const inputNama = document.getElementById("input-nama");
const outputNama = document.getElementById("output-nama");

inputNama.addEventListener("input", function() {
    const nilaiInput = inputNama.value.trim();
    if (nilaiInput === "") {
        outputNama.textContent = "Praktikan";
    } else {
        outputNama.textContent = nilaiInput;
    }
});

// LATIHAN 3: Logika Counter Sederhana

let totalHitungan = 0;
const displayCounter = document.getElementById("angka-counter");
const btnTambah = document.getElementById("btn-tambah");
const btnKurang = document.getElementById("btn-kurang");

btnTambah.addEventListener("click", function() {
    totalHitungan++;
    displayCounter.textContent = totalHitungan;
});

btnKurang.addEventListener("click", function() {
    if (totalHitungan <= 0) {
        totalHitungan--;
        displayCounter.textContent = totalHitungan;
    }
});