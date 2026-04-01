<?php
require_once 'transferbank.php';
require_once 'ewallet.php';
require_once 'qris.php';
require_once 'cod.php';
require_once 'virtualaccount.php';

$hasil = "";
$struk = "";

if (isset($_POST['bayar'])) {
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];

    switch ($metode) {
        case 'transfer': $obj = new TransferBank($nominal); break;
        case 'ewallet':  $obj = new EWallet($nominal); break;
        case 'qris':     $obj = new QRIS($nominal); break;
        case 'cod':      $obj = new COD($nominal); break;
        case 'va':       $obj = new VirtualAccount($nominal); break;
    }

    if (isset($obj)) {
        $hasil = $obj->prosesPembayaran();
        $struk = $obj->cetakStruk();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Sistem Pembayaran</title>
    <style>
        body { font-family: sans-serif; margin: 50px; background-color: #f4f4f4; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); width: 400px; }
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #2ecc71; color: white; border: none; cursor: pointer; }
        .output { margin-top: 20px; padding: 10px; border-left: 5px solid #2ecc71; background: #e9f7ef; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pembayaran</h2>
    <form method="POST">
        <label>Nominal Barang (Rp):</label>
        <input type="number" name="nominal" required placeholder="Contoh: 100000">
        
        <label>Metode Pembayaran:</label>
        <select name="metode">
            <option value="transfer">Transfer Bank</option>
            <option value="ewallet">E-Wallet</option>
            <option value="qris">QRIS</option>
            <option value="cod">COD</option>
            <option value="va">Virtual Account</option>
        </select>

        <button type="submit" name="bayar">Proses Pembayaran</button>
    </form>

    <?php if ($hasil): ?>
        <div class="output">
            <strong>Status:</strong> <?php echo $hasil; ?><br>
            <strong>Struk:</strong> <?php echo $struk; ?><br>
            <small>*Harga sudah termasuk Diskon 10% & Pajak 11%</small>
        </div>
    <?php endif; ?>
</div>

</body>
</html>