<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Transaksi
            <small>Aplikasi Kasir Sederhana</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Transaksi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <a href="transaksi_tambah.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL PENJUALAN</th>
                            <th>NAMA PELANGGAN</th>
                            <th>KASIR</th>
                            <th>TOTAL</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                        $UserID = $_SESSION['UserID'];
                        $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan
                        INNER JOIN tb_pelanggan ON tb_pelanggan.PelangganID = tb_penjualan.PelangganID INNER JOIN tb_user ON tb_user.UserID = tb_penjualan.UserID
                        ");
                        $no = 1;
                        while ($transaksi = mysqli_fetch_array($dt_penjualan)) { ?>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $transaksi['TanggalPenjualan']; ?></td>
                            <td><?php echo $transaksi['NamaPelanggan']; ?></td>
                            <td><?php echo $transaksi['NamaUser']; ?></td>
                            <td><?php echo "Rp. " . number_format($transaksi['TotalHarga']) . ",-"; ?></td>
                            <td>
                             <a href="transaksi_invoice_cetak.php?PenjualanID=<?php echo $transaksi['PenjualanID']; ?>"
                             target="_blank" class="btn btn-xs btn-warning" role="button" title="Cetak"><i class="fa fa-print">  Cetak</i></a>
                            </td>
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
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="tambah-pelanggan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Pelanggan</h4>
            </div>
            <form action="pelanggan_proses.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nm_Pelanggan">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="text" class="form-control" name="no_hp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
include "footer.php";
?>