<template>
    <div>
        <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-align-right" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://image.flaticon.com/icons/svg/17/17214.svg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="fa fa-list" aria-hidden="true"></i>
              <p>
                &nbsp;&nbsp; List
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/users" class="nav-link">
                  <i class="fa fa-users" aria-hidden="true"></i>
                  &nbsp;&nbsp;<p>Users</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/cars" class="nav-link">
                  <i class="fa fa-car" aria-hidden="true"></i>
                  &nbsp;&nbsp;<p>Cars</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/profile" class="nav-link">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  &nbsp;&nbsp;<p>Profile</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/ourinformation" class="nav-link">
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  &nbsp;&nbsp;<p>Information Site</p>
                </router-link>
              </li>
              <li v-if="$auth.check()" class="nav-item">
                <a href="#" @click.prevent="$auth.logout()" class="nav-link">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  &nbsp;&nbsp;<p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"> 
        <router-view></router-view>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        infoAdmin: [],
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Inscription',
              path: 'register'
            },
            {
              name: 'Connexion',
              path: 'login'
            }
          ],
          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            }
          ],
          // LOGGED ADMIN
          admin: [
            {
              name: 'Dashboard',
              path: 'admin.dashboard'
            }
          ]
        }
      }
    },
        methods: {
          getUserAuth() {
       }
             },
   created() {
       this.getUserAuth();
   },    
    mounted() {
      //
    }
  }
</script>
<style>

.elevation-2 {
    box-shadow: none; 
}

</style>