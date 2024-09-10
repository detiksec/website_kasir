<?php
include "header.php";
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Data Produk
        <small>Aplikasi Kasir Sederhana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>  Dashboard </a></li>
        <li class="active">Data Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <div class="box box-primary">
            <div class="box-header">
              <button type= "button" class= "btn btn-primary" data-toggle="modal"
              data-target="#tambah-produk"><i class="glyphicon glyphicon-plus"></i> tambah</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>NAMA PRODUK</th>
                <th>HARGA</th>
                <th>STOK</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                $dt_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk");
                $no = 1;
                while ($produk = mysqli_fetch_array($dt_produk)){ ?>
              <td><?php echo $no++; ?></td>
              <td><?php echo $produk['NamaProduk']; ?></td>
              <td><?php echo "Rp. " . number_format ($produk['Harga']). ",-"; ?></td>
              <td><?php echo $produk['Stok']; ?></td>  
              <td>
                <button type="button" class="btn btn-xs btn-warning" title="edit"
                data-toggle="modal" data-target="#edit-produk<?php echo $produk 
                ['ProdukID']; ?>">
                  <i class="glyphicon glyphicon-edit"></i>
                </button>
                <!--modal edit -->
                <div class="modal fade" id="edit-produk<?php echo $produk ['ProdukID']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Produk</h4>
              </div>
              <form action="produk_update.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="hidden" class="form-control" name="id_produk" value="<?php echo $produk['ProdukID']; ?>">
                  <input type="text" class="form-control" name="nm_produk" value="<?php echo $produk ['NamaProduk']; ?>">
              </div>
              <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga" value="<?php echo $produk ['Harga']; ?>">
            </div>
            <div class="form-group">
                  <label>Stok</label>
                  <input type="number" class="form-control" name="stok" value="<?php echo $produk ['Stok']; ?>">
            </div>
            </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                <a href="produk_hapus.php?ProdukID=<?php echo $produk ['ProdukID']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus">
                  <i class="glyphicon glyphicon-trash"></i>
                </a>
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
           
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="tambah-produk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Produk</h4>
              </div>
              <form action="produk_proses.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" name="nm_produk">
              </div>
              <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga">
            </div>
            <div class="form-group">
                  <label>Stok</label>
                  <input type="number" class="form-control" name="stok">
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


 