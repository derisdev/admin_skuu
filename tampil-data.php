<?php
 
?>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header"> 
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data Mahasiswa
          <div class="pull-right btn-tambah">
            <form class="form-inline" method="POST" action="index.php">
              <div class="form-group">
                <div class="input-group">
                </div>
              </div>
              <a class="btn btn-primary" href="?page=tambah">
                <i class="glyphicon glyphicon-plus"></i> Tambah
              </a>
            </form>
          </div>
          
        </h4>
      </div>

  <?php  
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Mahasiswa berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Mahasiswa berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data Mahasiswa berhasil dihapus.
          </div>";
  }
  ?>

      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Data Mahasiswa</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>No. Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>   

              <tbody>
              <?php
              $batas = 5;
           
                 $sql = $session->execute("SELECT * FROM data_mahasiswa  LIMIT 5");

                 $no = 1;
              foreach($sql as $row ) {

                $tanggal_lahir = $row['tanggal_lahir']->toDateTime()->format("d-m-Y");


                echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$row[nim]</td>
                      <td width='150'>$row[nama]</td>
                      <td width='180'>$row[tempat_lahir], $tanggal_lahir</td>
                      <td width='120'>$row[jenis_kelamin]</td>
                      <td width='120'>$row[agama]</td>
                      <td width='250'>$row[alamat]</td>
                      <td width='80'>$row[no_telepon]</td>

                      <td width='100'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?page=ubah&id=$row[nim]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
              ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="proses-hapus.php?id=<?php echo $row['nim'];?>" onclick="return confirm('Anda yakin ingin menghapus Mahasiswa <?php echo $row['nama']; ?>?');">
                            <i class="glyphicon glyphicon-trash"></i>
                          </a>
              <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                $no++;
              }
              ?>
              </tbody>           
            </table>
          </div>
        </div>
      </div> 
    </div> 
  </div> 