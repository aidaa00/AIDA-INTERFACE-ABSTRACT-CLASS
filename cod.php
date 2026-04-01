<?php
require_once 'pembayaran.php';
require_once 'cetak.php';

class COD extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Pembayaran COD sebesar Rp " . number_format($this->hitungTotalAkhir(), 0, ',', '.') . " akan dibayar di tempat.";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        return "Struk COD: Rp " . number_format($this->hitungTotalAkhir(), 0, ',', '.');
    }
}
?>