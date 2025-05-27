    <section>
    <h3>
        <?= $title ?> Kelas: <?= $jadwal['nama_kelas']?>-<?= $jadwal['tahun_angkatan']?> TA: <?= $ta['ta']?>/<?= $ta['semester']?>
    </h3>
    <br>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dsn/Absenkelas')?>"><i class="fa fa-dashboard"></i> Absensi Kelas</a></li>
        <li class="active">Absensi</li>
      </ol>
      </section>
    <div class="row">
    <div class="col-sm-6">
        <table class="table-striped table-responsive">
        <tr>
  <td>Program Studi</td>
  <td width="30px" class="text-center">:</td>
  <td><?= $jadwal['prodi']?></td>
</tr>
<tr>
  <td>Fakultas</td>
  <td class="text-center">:</td>
  <td><?= $jadwal['fakultas']?></td>
</tr>
<tr>
  <td>Kode</td>
  <td class="text-center">:</td>
  <td><?= $jadwal['kode_matkul']?></td>
</tr>
</table>
        </div>
        <div class="col-sm-6">
        <table class="table-striped table-responsive">
            <tr>
  <td>Mata Kuliah</td>
  <td class="text-center">:</td>
  <td><?= $jadwal['matkul']?></td>
</tr>
<tr>
  <td>Waktu</td>
  <td class="text-center">:</td>
  <td><?= $jadwal['hari']?>, <?= $jadwal['waktu']?></td>
</tr>
<tr>
  <td>Dosen</td>
  <td class="text-center">:</td>
  <td><?= $jadwal['nama_dosen']?></td>
</tr>
            </table>
        </div>
        <div class="col-sm-12">
            <a href="<?= base_url('dsn/print_absensi/'.$jadwal['id_jadwal'])?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Print Absensi</a>
        </div>
        <div class="col-sm-12">
        <?php
              if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
              }
              ?>
            <?php echo form_open('dsn/SimpanAbsen/'. $jadwal['id_jadwal'])?>
        <table class="table table-striped table-bordered table-responsive text-sm">
                <tr class="label-success">
                    <th rowspan="2" class="text-center">#</th>
                    <th rowspan="2" class="text-center">NIM</th>
                    <th rowspan="2" class="text-center">Mahasiswa</th>
                    <th colspan="18" class="text-center">Pertemuan</th>
                    <th rowspan="2" class="text-center">%</th>
                </tr>
                <tr class="label-success">
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                </tr>
                <?php $no = 1;
                foreach($mhs as $key=> $value){
                    echo form_hidden($value['id_krs'].'id_krs', $value['id_krs']);
                    ?>
                 <tr>
                    <td><?= $no++ ?></td>
                    <td class="text-center"><?= $value['nim']?></td>
                    <td><?= $value['nama_mhs']?></td>
                    <td>
                    <select name=" <?= $value['id_krs']?>p1">
                        <option value="0" <?php if ($value['p1']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p1']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p1']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p2">
                        <option value="0" <?php if ($value['p2']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p2']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p2']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p3">
                        <option value="0" <?php if ($value['p3']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p3']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p3']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p4">
                        <option value="0" <?php if ($value['p4']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p4']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p4']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p5">
                        <option value="0" <?php if ($value['p5']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p5']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p5']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p6">
                        <option value="0" <?php if ($value['p6']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p6']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p6']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p7">
                        <option value="0" <?php if ($value['p7']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p7']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p7']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p8">
                        <option value="0" <?php if ($value['p8']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p8']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p8']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p9">
                        <option value="0" <?php if ($value['p9']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p9']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p9']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p10">
                        <option value="0" <?php if ($value['p10']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p10']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p10']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p11">
                        <option value="0" <?php if ($value['p11']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p11']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p11']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p12">
                        <option value="0" <?php if ($value['p12']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p12']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p12']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p13">
                        <option value="0" <?php if ($value['p13']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p13']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p13']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p14">
                        <option value="0" <?php if ($value['p14']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p14']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p14']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p15">
                        <option value="0" <?php if ($value['p15']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p15']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p15']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p16">
                        <option value="0" <?php if ($value['p16']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p16']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p16']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p17">
                        <option value="0" <?php if ($value['p17']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p17']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p17']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name=" <?= $value['id_krs']?>p18">
                        <option value="0" <?php if ($value['p18']==0){
                                            echo 'selected';
                        }?>>A</option>
                        <option value="1"  <?php if ($value['p18']==1){
                                            echo 'selected';
                        }?>>I</option>
                        <option value="2"  <?php if ($value['p18']==2){
                                            echo 'selected';
                        }?>>H</option>
                        </select>
                    </td>
                   
                    <td>
                        <?php 
                        $absensi = ($value['p1']+$value['p2']+$value['p3']+$value['p4']+
                        $value['p5']+$value['p6']+$value['p7']+$value['p8']+$value['p9']+
                        $value['p10']+$value['p11']+$value['p12']+$value['p13']+$value['p14']+
                        $value['p15']+$value['p16']+$value['p17']+$value['p18'])/36*100;
                        echo number_format($absensi, 0). '%'
                        ?>
                    </td>
                </tr>
               <?php }?>
               
            </table>
            <button class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan Absen</button>
            <?php echo form_close() ?>
        </div>
    </div>
