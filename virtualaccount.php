<?php
require_once 'pembayaran.php';
require_once 'cetak.php';

class VirtualAccount extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Tagihan Virtual Account sebesar Rp " . number_format($this->hitungTotalAkhir(), 0, ',', '.') . " telah dibuat.";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        return "Struk Virtual Account: Rp " . number_format($this->hitungTotalAkhir(), 0, ',', '.');
    }
}
?>