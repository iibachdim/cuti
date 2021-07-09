<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('frontend') }}/dist/img/avatar-icon.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ $you->name }}</p>
        </div>
      </div>

      <?php
      if($you->role == 'admin') {
        ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{ route('index-admin') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li active><a href="{{ route('user-list') }}"><i class="fa fa-user"></i>User List</a></li>
        <li><a href="{{ route('cuti-list') }}"><i class="fa fa-book"></i> <span>Cuti Karyawan</span></a></li>
        <li><a href="{{ route('pengajuan-list') }}"><i class="fa fa-pencil"></i> <span>Daftar Pengajuan</span></a></li>
      </ul>
      <?php
        }else if($you->role == 'staff'){
      ?>
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('index-staff') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li><a href="{{ route('staff-profil') }}"><i class="fa fa-user"></i>Profil</a></li>
            <li active><a href="{{ route('staff-userList') }}"><i class="fa fa-male"></i>User List</a></li>
            <li><a href="{{ route('staff-cutiList') }}"><i class="fa fa-book"></i> <span>Cuti Karyawan</span></a></li>
            <li><a href="{{ route('staff-pengajuanList') }}"><i class="fa fa-pencil"></i> <span>Daftar Pengajuan</span></a></li>
          </ul>
      <?php
      }else if($you->role == 'karyawan'){
      ?>
        <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{ route('index-karyawan') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="{{ route('profil') }}"><i class="fa fa-user"></i>Profil</a></li>
        <li><a href="{{ route('pengajuan-cuti') }}"><i class="fa fa-book"></i>Pengajuan Cuti</a></li>
        <li><a href="{{ route('status-pengajuan') }}"><i class="fa fa-pencil"></i>Status Pengajuan</a></li>
      </ul>
      <?php
      }
      ?>


    </section>
    <!-- /.sidebar -->
  </aside>
