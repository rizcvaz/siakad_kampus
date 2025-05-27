<div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body">
              <img class="" src="<?= base_url('fotomhs/' . $mhs['foto_mhs']) ?>" width="90%" height="230px">

              <h4 class="text-center"><?= $mhs['nama_mhs'] ?></h4>
              <h5 class="text-center"><?= $mhs['nim'] ?></h5>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-9">
        <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-responsive">
                    <tr>
                        <th>Tahun Akademik</th>
                        <th>:</th>
                        <th><?= $ta['ta'] ?>/<?= $ta['semester'] ?></th>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <th>:</th>
                        <td><?= $mhs['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <th>:</th>
                        <td><?= $mhs['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <td><?= $mhs['nama_kelas'] ?>-<?= $mhs['tahun_angkatan'] ?></td>
                    </tr>
                    <tr>
                        <th>Dosen PA</th>
                        <th>:</th>
                        <td><?= $mhs['nama_dosen'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <th>:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <th>:</th>
                        <td></td>
                    </tr>
                </table> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>