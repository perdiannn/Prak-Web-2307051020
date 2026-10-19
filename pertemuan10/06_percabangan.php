<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Percabangan PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <main class="content">
        <h1>Percabangan PHP</h1>

        <?php
            function hitungNilaiAkhir($tugas, $uts, $uas) {
            $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

            return $nilaiAkhir;
        }

        function tentukanGrade($nilai) {
            if ($nilai >= 85) {
                return "A";
            } elseif ($nilai >= 75) {
                return "B";
            } elseif ($nilai >= 65) {
                return "C";
            } elseif ($nilai >= 50) {
                return "D";
            } else {
                return "E";
            }
        }

        function cekKelulusan($nilai) {
            if ($nilai >= 65) {
                return "LULUS";
            }

            return "TIDAK LULUS";
        }

        function tampilkanHasil($nama, $tugas, $uts, $uas) {
            $nilai = hitungNilaiAkhir($tugas, $uts, $uas);
            $grade = tentukanGrade($nilai);
            $status = cekKelulusan($nilai);

            echo "<h3>Hasil Penilaian Mahasiswa</h3>";
            echo "Nama: $nama <br>";
            echo "Nilai Tugas: $tugas <br>";
            echo "Nilai UTS: $uts <br>";
            echo "Nilai UAS: $uas <br>";
            echo "Nilai Akhir: " . number_format($nilai, 2) . "<br>";
            echo "Grade: $grade <br>";
            echo "Status: $status <br>";
        }

            tampilkanHasil("Ferdian", 90, 75, 90);
        ?>
        <a class="back" href="index.php">Kembali ke Menu</a>
    </main>
</div>
</body>
</html>
