<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Pendukung Keputusan</title>
  <link rel="shortcut icon" href="{{ asset('asset/dist/img/favicon.ico') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('asset/dist/css/adminlte.min.css')}}">
  
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset ('asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>    
           
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
      <img src="{{ asset ('asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> Admin
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          {{-- Dashboard --}}
          <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link">             
              <i class="nav-icon fas fa-tachometer-alt"></i>            
              <p>
                Dashboard
              </p>
            </a>
          </li>

          {{-- Data Produk batak --}}
          <li class="nav-item">
            <a href="{{route('produk.index')}}" class="nav-link">              
              <i class="fas fa-box nav-icon"></i>
              <p>
                Data Produk Batik
              </p>
            </a>
          </li>

          {{-- Data Alternatif --}}
          <li class="nav-item">
            <a href="{{route('alternatif.index')}}" class="nav-link">
              <i class="fas fa-chart-bar nav-icon"></i>          
              <p>
                Data Alternatif
              </p>
            </a>
          </li>

          {{-- Data Kriteria --}}
          <li class="nav-item">
            <a href="{{route('kriteria.index')}}" class="nav-link">              
              <i class="fas fa-star nav-icon"></i>
              <p>
                Data Kriteria
              </p>
            </a>
          </li>

          {{-- Proses Data --}}
          <li class="nav-item">
            <a href="{{route('proses.index')}}" class="nav-link">
              <i class="fas fa-calculator nav-icon"></i>
              <p>
                Proses Data
              </p>
            </a>
          </li>                   

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('dashboard')
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014 <a href="https://unkhair.ac.id">Universitas Khairun</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">   
        <form method="POST" action="{{ route('logout') }}">
          @csrf
        <button type="submit" class="btn btn-dark"><i class="fas fa-sign-out-alt sm"></i>Keluar</button>        
      </form>    
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset ('asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset ('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset ('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('asset/dist/js/adminlte.js')}}"></script>

@include('sweetalert::alert')
<!-- PAGE  -->
<!-- jQuery Mapael -->
<script src="{{ asset ('asset/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset ('asset/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset ('asset/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ asset ('asset/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('btnShowKriteria').addEventListener('click', function() {
          var tabelKriteria = document.getElementById('tabelKriteria');
          var tabelPerengkingan = document.getElementById('tabelPerengkingan');
          var btnIcon = document.getElementById('btnShowKriteria').querySelector('i');
          btnIcon.classList.remove('fa-calculator');
          btnIcon.classList.add('fa-spinner', 'fa-spin');

          setTimeout(function() {
              if (tabelKriteria.style.display === 'none' && tabelPerengkingan.style.display === 'none') {
                  tabelKriteria.style.display = 'block';
                  tabelPerengkingan.style.display = 'block';
                  btnIcon.classList.remove('fa-spinner', 'fa-spin');
                  btnIcon.classList.add('fa-calculator');
              } else {
                  tabelKriteria.style.display = 'none';
                  tabelPerengkingan.style.display = 'none';
                  btnIcon.classList.remove('fa-spinner', 'fa-spin');
                  btnIcon.classList.add('fa-calculator');
              }
          }, 3000);
      });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('btnShowKriteria').addEventListener('click', function() {
          var title = document.getElementById('title');
          var btnIcon = document.getElementById('btnShowKriteria').querySelector('i');
          btnIcon.classList.remove('fa-calculator');
          btnIcon.classList.add('fa-spinner', 'fa-spin');

          setTimeout(function() {
              if (title.style.display === 'none') {
                  title.style.display = 'block';
                  btnIcon.classList.remove('fa-spinner', 'fa-spin');
                  btnIcon.classList.add('fa-calculator');
              } else {
                  title.style.display = 'none';
                  btnIcon.classList.remove('fa-spinner', 'fa-spin');
                  btnIcon.classList.add('fa-calculator');
              }
          }, 3000);
      });
  });
</script>

<script>
  function downloadTable(tableId) {
      const table = document.getElementById(tableId);
      const headers = Array.from(table.querySelectorAll('thead th')).map(header => header.innerText);
      const rows = Array.from(table.querySelectorAll('tbody tr')).map(row =>
          Array.from(row.querySelectorAll('td')).map(cell => cell.innerText)
      );

      const csvContent = [
          'Hasil Perhitungan',
          headers.join(','),
          ...rows.map(row => row.join(','))
      ].join('\n');
      const blob = new Blob([csvContent], { type: 'text/csv' });
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.style.display = 'none';
      a.href = url;
      a.download = `${tableId}.csv`;
      document.body.appendChild(a);
      a.click();
      window.URL.revokeObjectURL(url);
  }
</script>

<script>
  $(document).ready(function() {
     $('#btn-hitung').click(function(e) {
         e.preventDefault();
 
         var total = 0;
         $('#example1 tbody tr td:not(:last-child)').each(function() {
             var value = $(this).text().trim(); 
             value = value.replace(',', '.'); 
             value = parseFloat(value); 

             if (!isNaN(value)) {
                 total += value;
             } else {
                 console.log('Nilai tidak valid:', value);
             }
         });
 
         $('#total_bobot_kepentingan').text(total);
     });
 });
 </script>
 
 


</body>
</html>
