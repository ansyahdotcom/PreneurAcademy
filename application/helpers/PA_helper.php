<?php
function time_since($original)
{
    $chunks = array(
        array(60 * 60 * 24 * 365, 'year'),
        array(60 * 60 * 24 * 30, 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24, 'day'),
        array(60 * 60, 'hour'),
        array(60, 'min'),
        array(1, 'sec'),
    );

    $today = time();
    $since = $today - $original;

    if ($since > 604800) {
        // $print = date("d jS", $original);
        $print = date("d-M", $original);
        if ($since > 31536000) {
            // $print .= ", " . date("Y", $original);
            $print .= date("-Y", $original);
        }
        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0)
            break;
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
    return $print . ' ago';
}

function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {

    // mengambil nilai kode ex: USR0015 hasil USR
    $kode = substr($id_terakhir, 0, $panjang_kode);
    
    // mengambil nilai angka
    // ex: USR0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
    
    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
    
    // menggabungkan kode dengan nilang angka baru
    $id_baru = $kode.$angka_baru;
    
    return $id_baru;
}
