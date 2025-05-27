
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMBARU | Print Absensi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url()?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/template/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css" media="print">
    /* @page {size: landscape} */
    body {
      page-break-before: avoid;
      width: 100%;
      heigth: 100%;
      zoom: 100%
    }
    </style>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-file-o"></i><b> Absensi Kelas: TA: <?= $ta['ta']?>/<?= $ta['semester']?></b>
          <small class="pull-right">Date: <?= date('d M Y')?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    
    <div class="col-xs-6 table-responsive">
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
      <div class="col-xs-6 table-responsive">
      <table class="table-striped table-responsive">
    <tr>
  <td>Mata Kuliah</td>
  <td width="30px" class="text-center">:</td>
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
    </div>
    <div class="row">
      <br>
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
                    
                    ?>
                 <tr>
                    <td><?= $no++ ?></td>
                    <td class="text-center"><?= $value['nim']?></td>
                    <td><?= $value['nama_mhs']?></td>
                    <td><?php if ($value['p1'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p1'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p1'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p2'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p2'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p2'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p3'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p3'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p3'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p4'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p4'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p4'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p5'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p5'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p5'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p6'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p6'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p6'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p7'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p7'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p7'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p8'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p8'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p8'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p9'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p9'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p9'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p10'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p10'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p10'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p11'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p11'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p11'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p12'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p12'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p12'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p13'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p13'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p13'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p14'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p14'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p14'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p15'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p15'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p15'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p16'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p16'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p16'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p17'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p17'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p17'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
                    <td><?php if ($value['p18'] == 0){
                        echo '<i class="fa fa-times text-danger"></i>';
                    }elseif ($value['p18'] == 1){
                        echo '<i class="fa fa-info text-warning"></i>';
                    }elseif ($value['p18'] == 2){
                        echo '<i class="fa fa-check text-success"></i>';
                        }?></td>
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
    </div>
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-4">
        
       
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
       
          
        </div>
        <div class="col-xs-4">
                    Bumiayu, <?= date('d M Y')?><br>
                    Dosen Pengampu<br>
                    <br>
                    dto.
                    <br>
                    <br>
                    <br>
                    <?= $jadwal['nama_dosen']?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
