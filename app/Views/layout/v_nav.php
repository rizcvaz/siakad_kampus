 <!-- Collect the nav links, forms, and other content for toggling -->
 <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if (session()->get('level')== 1){ ?>
              <!-- menu menu halaman Admin -->
              <li ><a href="<?= base_url('admin')?>">Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('gedung')?>">Gedung</a></li>
                <li><a href="<?= base_url('ruangan')?>">Ruangan</a></li>
                <li><a href="<?= base_url('fakultas')?>">Fakultas</a></li>
                <li><a href="<?= base_url('prodi')?>">Program Studi</a></li>
                <li><a href="<?= base_url('ta') ?>">Tahun Akademik</a></li>
                <li><a href="<?= base_url('matkul') ?>">Mata Kuliah</a></li>
                <li><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
                <li><a href="<?= base_url('dosen') ?>">Dosen</a></li>
                <li><a href="<?= base_url('user') ?>">User</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('kelas')?>">Kelas</a></li>
                <li><a href="<?= base_url('jadwalkuliah')?>">Jadwal Kuliah</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('user')?>">user</a></li>
                <li><a href="<?= base_url('ta/setting')?>">Tahun Akademik</a></li>
              </ul>
            </li>
            <li><a href="#">About</a></li>
            <?php }elseif (session()->get('level')== 2){ ?>
              <!-- menu menu halaman mahasiswa -->
              <li ><a href="<?= base_url('mhs')?>">Dashboard</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('krs')?>">Kartu Rencana Studi (KRS)</a></li>
                <li><a href="<?= base_url('mhs/khs')?>">Kartu Hasil Studi (KHS)</a></li>
                <li><a href="<?= base_url('mhs/absensi')?>">Absensi</a></li>
              </ul>
            </li>
           <?php }elseif (session()->get('level')== 3){ ?>
            <!-- menu menu halaman dosen -->
            <li ><a href="<?= base_url('dsn')?>">Dashboard</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('dsn/jadwal')?>">Jadwal Mengajar</a></li>
                <li><a href="<?= base_url('dsn/AbsenKelas')?>">Absen Kelas</a></li>
                <li><a href="<?= base_url('dsn/NilaiMahasiswa')?>">Nilai Mahasiswa</a></li>
              </ul>
            </li>
          <?php }?>
            
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if (session()->get('username')== ""){ ?>
          <li><a href="<?= base_url('auth') ?>"><i class="fa fa-sign-in"></i>Login</a></li>
          <?php }else{?>
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="<?= base_url() ?>/template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <?php if ( session()->get('level')==1){ ?>
                  <img src="<?= base_url('foto/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
                <?php } elseif ( session()->get('level')==2) { ?>
                  <img src="<?= base_url('fotomhs/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
               <?php }else { ?>
                <img src="<?= base_url('fotodosen/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
               <?php }?>
                
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= session()->get('nama')?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                <?php if ( session()->get('level')==1){ ?>
                  <img src="<?= base_url('foto/'. session()->get('foto')) ?>" class="img-circle" alt="User Image">
                <?php } elseif ( session()->get('level')==2) { ?>
                  <img src="<?= base_url('fotomhs/'. session()->get('foto')) ?>" class="img-circle" alt="User Image">
               <?php }else { ?>
                <img src="<?= base_url('fotodosen/'. session()->get('foto')) ?>" class="img-circle" alt="User Image">
               <?php }?>

                  <p>
                   <?= session()->get('nama')?>-  <?php if( session()->get('level')==1) {
                      echo 'Admin';
                    } elseif ( session()->get('level')==2){
                      echo session()->get('username');
                    }elseif ( session()->get('level')==3){
                      echo 'Dosen';
                    }?>
                      
                    <small><?= date('d M Y') ?></small>
                  </p>
                </li>
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
          <?php } ?>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
     <!-- 
      <section class="content-header">
        <h1>
          Top Navigation
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>
    -->

      <!-- Main content -->
      <section class="content">