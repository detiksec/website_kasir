<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="transaksi_laporan.php" method="$_GET">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>
                                    <label>Tanggal Awal</label>
                                    <input type="date" class="form-control" name="tgl_awal">
                                </td>
                                <td>
                                    <label>Tanggal Akhir</label>
                                    <input type="date" class="form-control" name="tgl_akhir">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary pull-right" value="Filter">
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <?php
            if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])) {
                $awal = $_GET['tgl_awal'];
                $akhir = $_GET['tgl_akhir'];
            ?>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="transaksi_laporan_cetak.php?dari=<?php echo $awal; ?>&sampai=<?php echo $akhir; ?>" 
                        target="_blank" class="btn btn-success pull-right"><i class="glyphicon glyphicon-print"></i>  CETAK</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>NO</th>
                                <th>NOMOR TRANSAKSI</th>
                                <th>TANGGAL PENJUALAN</th>
                                <th>NAMA PELANGGAN</th>
                                <th>NAMA PETUGAS</th>
                                <th>TOTAL</th>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                    $UserID = $_SESSION['UserID'];
                                    $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan INNER JOIN
                                    tb_pelanggan ON tb_pelanggan.PelangganID = tb_penjualan.PelangganID INNER JOIN tb_user
                                    ON tb_user.UserID = tb_penjualan.UserID WHERE tb_penjualan.PelangganID = tb_pelanggan.
                                    PelangganID AND date(TanggalPenjualan) > '$awal' AND date (TanggalPenjualan) < '$akhir' 
                                    ORDER BY TanggalPenjualan DESC");
                                    $no = 1;
                                    while ($penjualan = mysqli_fetch_array($dt_penjualan)) {
                                        ?>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $penjualan['PenjualanID']; ?></td>
                                        <td><?php echo $penjualan['TanggalPenjualan']; ?></td>
                                        <td><?php echo $penjualan['NamaPelanggan']; ?></td>
                                        <td><?php echo $penjualan['NamaUser']; ?></td>
                                        <td><?php echo "Rp. " . number_format($penjualan['TotalHarga']) . ",-"; ?></td>
                                        </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php
include "footer.php";
?>