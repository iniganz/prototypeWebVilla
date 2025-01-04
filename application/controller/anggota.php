<?php
// fungsi 2
function h1($nama_anggota, $nim_anggota, $nama = "Kelompok 5")
{
    echo "Selamat Datang Di Serenity Blooms Villas <br>";
    echo "Kami dari " . $nama . "<br>";
    echo "Anggota kami terdiri dari" . "<br>";
    // echo $nama_anggota . "(" . $nim_anggota . ")" . "<br>";
    // perulangan 1
    for ($i = 0; $i < count($nama_anggota); $i++) {
        echo ($i + 1) . ". " . $nama_anggota[$i] . " (" . $nim_anggota[$i] . ")<br>";
    }
}
$nama_anggota = [
    "Ni Kadek Anastasya Yumita Maharani",
    "Gede Gandhi Gunadi",
    "I Gede Deva Ramagifta",
    "Dewa Gede Kerta Yoga",
    "Komang Odik Pramana",
    
];
$nim_anggota = [
    "2403020100"
];

// h1($nama_anggota, $nim_anggota);
