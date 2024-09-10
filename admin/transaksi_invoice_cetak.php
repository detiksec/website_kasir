<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Transaksi || Aplikasi Kasir</title>
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <?php 
    include "../config/koneksi.php";

    ?>
    <div class="container">
        <?php
        $PenjualanID = $_GET['PenjualanID'];
        $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan INNER JOIN tb_pelanggan ON 
        tb_penjualan.PelangganID = tb_pelanggan.PelangganID Where PenjualanID = '$PenjualanID'");
        while ($penjualan = mysqli_fetch_array($dt_penjualan)) {
        ?>
        <h2 class="text-center"><strong>KASIR TOKO</strong></h2>
        <p class="text-center"><strong>Jl. Jalan</strong></p>
        <br>
        <table class="table-striped">
            <tr>
                <td width="15%">No. Penjualan</td>
                <td width="5%">:</td>
                <td><?php echo $penjualan['PenjualanID']; ?></td>
            </tr>
            <tr>
                <td width="15%">Nama Pelanggan</td>
                <td width="5%">:</td>
                <td><?php echo $penjualan['NamaPelanggan']; ?></td>
            </tr>
            <tr>
                <td width="15%">Tanggal Transaksi</td>
                <td width="5%">:</td>
                <td><?php echo $penjualan['TanggalPenjualan']; ?></td>
            </tr>
            <tr>
                <td width="15%">Total</td>
                <td width="5%">:</td>
                <?php
                $PenjualanID = $penjualan['PenjualanID'];
                $sub_total_belanja = mysqli_query($koneksi, "SELECT SUM(SubTotal) AS sub_total FROM
                tb_detail_penjualan WHERE PenjualanID");
                while ($total_belanja = mysqli_fetch_array($sub_total_belanja)) { 
                   $total = +$total_belanja['sub_total'];
                ?>
                <td>
                    <strong><?php echo "Rp. " . number_format($total) . ".-"; ?></strong>
                </td>
                <?php
                }
                ?>
            </tr>
        </table>
        <br>
        <h4 class="text_center">Data Barang</h4>
        <table class="table table-border table-striped">
            <thead>
                <td>NO</td>
                <td>NAMA BARANG</td>
                <td>QTY</td>
                <td>SUB TOTAL</td>
            </thead>
            <tbody>
                <?php
                $PenjualanID = $penjualan['PenjualanID'];
                $data_belanjaan = mysqli_query($koneksi, "SELECT *, SUM(JumlahProduk) as jumlah FROM
                tb_detail_penjualan INNER JOIN tb_produk ON tb_produk.ProdukID = tb_detail_penjualan.ProdukID WHERE
                PenjualanID = '$PenjualanID' GROUP BY tb_detail_penjualan.ProdukID");
                $no = 1;
                while ($belanjaan = mysqli_fetch_array($data_belanjaan)) {
                ?>
                    <tr>
                     <td><?php echo $no++; ?></td>
                     <td><?php echo $belanjaan['NamaProduk']; ?></td>
                     <td><?php echo $belanjaan['JumlahProduk']; ?></td>
                     <td><?php echo "Rp. " . number_format($belanjaan['SubTotal']) . ",-"; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <p class="text-center"><i>"TerimaKasih Sudah Berbelanja Di Toko Kami</i></p>
        <?php
        }
        ?>
    </div>

    <script type="text/javascript">
    window.print();
</script>

</body>
</html>