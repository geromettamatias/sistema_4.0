<?php
session_start();

if($_SESSION["s_usuarioEstudiante"] === null){
    header("Location: ../index.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Modulos -->
<link rel="icon" type="image/png" href="../elementos/logo_LIBR2.png" />
 <div id="titulo"></div>



  <!-- Google Font: Source Sans Pro -->
  <link href="estructuras/plugins/css.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    
  <!-- iCheck -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../elementos/estructuras/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/summernote/summernote-bs4.min.css">


 

  <!-- Custom fonts for this template-->
  <link href="../elementos/estructuras/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 
    <!--datables CSS básico-->
  
    <link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">


   
   <link rel="stylesheet" href="../elementos/estructuras/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


  
<!-- SweetAlert2 -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../elementos/estructuras/plugins/toastr/toastr.min.css">



</head>
<body id="body1" class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- Preloader -->
  <div style="background-color:#0A0200" class="preloader flex-column justify-content-center align-items-center">
    
    <img id="mostrarimagenLoFFF" class="animation__shake" src="../elementos/carga.gif" alt="AdminLTELogo" height="200" width="200" >



  </div>

  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Menú -->

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./index.php"  class="nav-link">Inicio</a>
      </li>

 
    




    </ul>
     <!-- Fin -->

    <!-- Buscador Menú   class="img-circle"  -->

  
    <ul class="navbar-nav ml-auto">

      <!-- Carga --------------------------------------- -->
      <div id="imagenProceso">  
        <li class="nav-item">
            <img  src="../elementos/cargando.gif"  style="width: 150px;">
        </li>   
      </div>
     <!-- Fin ----------------------------------------- -->

      <!-- Navbar Search -->
 

       <!-- Fin -->








       <!-- Expandi pantalla -->


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>


       <!-- Fin -->

       <!-- configuracion -->



      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>


       <!-- Fin -->


   <?php if ($_SESSION["ajustes_pregunta"] != 'NO') {   ?>
       <!-- Cierre Ajuste -->


      <li class="nav-item">
        <a class="nav-link"  href="javascript:void(0)" role="button" id="ajustesFinal">
          <i class="fas fa-cog fa-spin"></i>
        </a>
      </li>
    <?php }  ?>

       <!-- Fin -->



       <!-- Cierre Seesion -->


      <li class="nav-item">
        <a class="nav-link"  href="javascript:void(0)" role="button" id="btn_Finalizar">
          <i class="fas fa-power-off"></i>
        </a>
      </li>


       <!-- Fin -->


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


       <!-- Menú  -titulo y Logo o imagen -->


        <a id="autoGestionTitulo" class="brand-link">
      <img id="mostrarimagenLo" src="#" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Auto-Gestión</span>
    </a>




       <!-- Fin -->



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


       <!-- Nombre de usuario y su foto o avatar -->


      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../elementos/estructuras/dist/img/estudiante.gif" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a id="usuarioTexto" class="d-block">Alumno/a</a>
        </div>
      </div>


       <!-- Fin -->



      <!-- SidebarSearch Form -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

    

          <!-- MENÚ LATERAL  -->

       


          <!-- ////  -->



  


          <!-- Fin  -->



          <!-- Menú Lateral que se expande  -->



          <li class="nav-header">Gestión Academica</li>
          

          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-pencil-alt"></i>
              <p>
                Admin-Alumno
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>



            <ul class="nav nav-treeview">
           


          

           <?php  if ($_SESSION["analitico_pregunta"] == 'SI') {  ?>



              <li class="nav-item">
                <a id="analiticoAlumno" class="nav-link">
                  <i class="fa fa-paste nav-icon"></i>
                  <p>Analítico</p>
                </a>
              </li>


               <?php   } ?>


              <?php  if ($_SESSION["libreta_pregunta"] == 'SI') {  ?>


              <li class="nav-item">
                <a id="libretaDigitalAlumno" class="nav-link">
                  <i class="fa fa-columns nav-icon"></i>
                  <p>Libreta Digital</p>
                </a>
              </li>


              <?php   } ?>

                <?php  if ($_SESSION["inscrpcion_pregunta"] == 'SI') {  ?>



              <li class="nav-item">
                <a id="inscrpMesasExamen" class="nav-link">
                  <i class="fa fa-edit nav-icon"></i>
                  <p>Inscrip a Mesas</p>
                </a>
              </li>

              <?php   }else{ ?>


              <li class="nav-item">
                <a id="visualizarNotaMesa" class="nav-link">
                  <i class="far fa-clipboard nav-icon"></i>
                  <p>Notas de Mesas</p>
                </a>
              </li>


               <?php   } ?>

                <?php  if ($_SESSION["inasistencia_pregunta"] == 'SI') {  ?>

              <li class="nav-item">
                <a id="inasistencia" class="nav-link">
                  <i class="fa fa-chart-bar nav-icon"></i>
                  <p>Inasistencia</p>
                </a>
              </li>

               <?php   } ?>



             


            </ul>
          </li>





     <!-- Fin  Menú Lateral -->
      
             
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Contenido para reutilizar-->
          <input hidden="" type="text" id="tituloMenuURL"> 
          <!-- fin-->
          <!--MODULOS-->
          <div id="iconos" ></div>
          <div id="buscarTablaInstitucional" ></div>
          <div id="tablaInstitucional"></div>
          <div id="contenidoAyuda"></div>



           
          <!--FIN -->
        </div>   
      </div>
    </section>



    <section id="chat_final_estudiante">
      
      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/62c8d11d7b967b117998b8bc/1g7g71msu';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
      </script>
      <!--End of Tawk.to Script-->


    </section>
    <!-- /.content -->
  </div>
  
  <div id="cerrarCesionFinal"></div>

 
  <footer class="main-footer">
    <strong>Gerometta Mathias <a href="https://adminlte.io">Sitio</a>.</strong>
    Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 4.0
    </div>
  </footer>


  <aside class="control-sidebar control-sidebar-dark"></aside>

</div>
<!-- ./wrapper -->

<!-- jQuery -->



<script src="../elementos/estructuras/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->


<?php
include_once 'estructuras/main.php';
?>

<script src="../elementos/estructuras/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../elementos/estructuras/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../elementos/estructuras/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../elementos/estructuras/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../elementos/estructuras/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../elementos/estructuras/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../elementos/estructuras/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../elementos/estructuras/plugins/moment/moment.min.js"></script>
<script src="../elementos/estructuras/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../elementos/estructuras/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../elementos/estructuras/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../elementos/estructuras/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../elementos/estructuras/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../elementos/estructuras/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes)

<script src="../elementos/estructuras/dist/js/pages/dashboard.js"></script>

 -->













   



    
    <script src="../elementos/estructuras/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../elementos/estructuras/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../elementos/estructuras/js/sb-admin-2.min.js"></script>

   
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      
    
     <script type="text/javascript" src="../elementos/estructuras/vendor/datatables/datatables.min.js"></script> 
       <!-- para usar botones en datatables JS -->  
      <script src="../elementos/estructuras/vendor/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
      <script src="../elementos/estructuras/vendor/datatables/JSZip-2.5.0/jszip.min.js"></script>    
      <script src="../elementos/estructuras/vendor/datatables/pdfmake.js"></script>    
      <script src="../elementos/estructuras/vendor/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
      <script src="../elementos/estructuras/vendor/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

   <!-- datatables JS -->
   <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.bootstrap4.min.css">
   <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script> 



          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.5/jquery.textcomplete.js"></script>

          
       
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



<script src="../elementos/estructuras/js/jquery.blockUI.js"></script>

 



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.rtl.min.css" />


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<script src="../elementos/estructuras/plugins/inputmask/jquery.inputmask.min.js"></script>


<!-- SweetAlert2 -->
<script src="../elementos/estructuras/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="../elementos/estructuras/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
     const Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})



<?php

$actualizar_datos=$_SESSION["actualizar_datos"];

if ($actualizar_datos=='SI') {


 ?>



Toast.fire({
  icon: 'warning',
  title: 'Actualice sus DATOS'
})


<?php }else{ ?>




Toast.fire({
  icon: 'success',
  title: 'Bienvenido !!'
})


<?php } ?>



</script>




</body>
</html>