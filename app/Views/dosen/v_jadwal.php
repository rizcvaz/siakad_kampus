    <h3>
        <?= $title ?> TA: <?= $ta['ta']?>/<?= $ta['semester']?>
    </h3>
    <br>

    <div class="row">
    <table class="table table-striped table-bordered table-responsive">
        <tr class="label-success">
            <th>No</th>
            <th>Program Studi</th>
            <th>Hari</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Dosen</th>
        </tr>
        <?php $no= 1;
        foreach ($jadwal as $key=> $value) {?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $value['prodi']?></td>
            <td><?= $value['hari']?>, <?= $value['waktu']?></td>
            <td><?= $value['kode_matkul']?></td>
            <td><?= $value['matkul']?></td>
            <td><?= $value['sks']?></td>
            <td><?= $value['nama_kelas']?>-<?= $value['tahun_angkatan']?></td>
            <td><?= $value['ruangan']?></td>
            <td><?= $value['nama_dosen']?></td>
        </tr>
        <?php }?>
    </table>
    </div>