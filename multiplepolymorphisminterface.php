<?php

// ======================
// INTERFACE PEMBAYARAN
// ======================
interface Pembayaran {
    public function bayar($jumlah);
}

class TransferBank implements Pembayaran {
    public function bayar($jumlah) {
        return "Transfer Rp $jumlah berhasil";
    }
}

class Ewallet implements Pembayaran {
    public function bayar($jumlah) {
        return "E-Wallet Rp $jumlah berhasil";
    }
}

class QRIS implements Pembayaran {
    public function bayar($jumlah) {
        return "QRIS Rp $jumlah berhasil";
    }
}

// ======================
// MULTIPLE INTERFACE
// ======================
interface Mesin {
    public function hidupkan();
}

interface Kendaraan {
    public function berjalan();
}

class Motor implements Mesin, Kendaraan {

    public function hidupkan() {
        return "Mesin hidup";
    }

    public function berjalan() {
        return "Motor berjalan";
    }
}

// ======================
// OUTPUT
// ======================

echo "<h2>Polymorphism Pembayaran</h2>";

$pembayaran = [
    new TransferBank(),
    new Ewallet(),
    new QRIS()
];

foreach ($pembayaran as $p) {
    echo $p->bayar(100000);
    echo "<br>";
}

echo "<hr>";

echo "<h2>Multiple Interface (Motor)</h2>";

$motor = new Motor();

echo $motor->hidupkan();
echo "<br>";
echo $motor->berjalan();

?>