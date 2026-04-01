<?php
# Penggunaan Abstrak Class
abstract class Pembayaran {
    protected $jumlah;
    protected $diskon = 0.10; // 10%
    protected $pajak = 0.11;  // 11%

    public function __construct($jumlah) {
        $this->jumlah = $jumlah;
    }

    // Hitung total akhir setelah diskon dan pajak
    public function hitungTotalAkhir() {
        $setelahDiskon = $this->jumlah - ($this->jumlah * $this->diskon);
        $totalFinal = $setelahDiskon + ($setelahDiskon * $this->pajak);
        return $totalFinal;
    }

    // Method wajib
    abstract public function prosesPembayaran();

    // Method umum
    public function validasi() {
        return $this->jumlah > 0;
    }
}
?>