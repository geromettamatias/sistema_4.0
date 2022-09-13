<?php

session_start();

?>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
 

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              
              <div class="card-header">
                <h3 class="card-title">TIPOS DE ACTAS</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button onclick="remover()" type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>


              <div class="card-body">
                <div class="chart">
                  

                <select class="form-control" id="buscarTipo">
                <option>Seleccione el ACTAS</option>
                <option>ACTAS- PARA REGULAR</option>
                <option>ACTAS- PARA LIBRE</option>
                <option>ACTAS- PARA EQUIVALENCIA</option>
                <option>ACTAS- PARA TERMINAL</option>
                
                </select> 





<script type="text/javascript">

  $('#imagenProceso').hide();

    $("#buscarTipo").change(function(){


              $.blockUI({ 
                                    message: '<h1>Espere !! <i class="fa fa-sync fa-spin"></i></h1>',
                                    css: { 
                                    border: 'none', 
                                    padding: '15px', 
                                    backgroundColor: '#000', 
                                    '-webkit-border-radius': '10px', 
                                    '-moz-border-radius': '10px', 
                                    opacity: .5, 
                                    color: '#fff' 
                                } });






      buscarTipo= $('#buscarTipo').val();
      

      if (buscarTipo!='Seleccione el ACTAS') {
      
       $.ajax({
          type:"post",
          data:'buscarTipo=' + buscarTipo,
          url:'modulos/gestionAcademicaAlumno/inscrp_Mesa/elementos/seccionACTA.php',
          beforeSend: function() {
            $('#imagenProceso').show();
                              },
          success:function(r){

           
              $('#tablaInstitucional').html(''); 
               $('#tablaInstitucional').load('modulos/gestionAcademicaAlumno/inscrp_Mesa/actaTabla.php');
              $('#contenidoAyuda').html(''); 
            

    
              $('#imagenProceso').hide();
          }
        });

      }else{


        $('#tablaInstitucional').html('');

           $.unblockUI();



      }

      });


function remover(){

            $("#collapseOne").collapse('show');
           $('#buscarTablaInstitucional').html('');
            $('#tablaInstitucional').html('');
             $('#contenidoAyuda').html('');


             
    <?php  if ($_SESSION["analitico_pregunta"] != 'NO') {   ?>

      
      $("#analiticoAlumno").removeClass("nav-link active");
      $("#analiticoAlumno").addClass("nav-link");

     <?php  }   ?>


      <?php  if ($_SESSION["libreta_pregunta"] != 'NO') {   ?>


      $("#libretaDigitalAlumno").removeClass("nav-link active");
      $("#libretaDigitalAlumno").addClass("nav-link");

       <?php  }   ?>


      <?php  if ($_SESSION["inasistencia_pregunta"] != 'NO') {   ?>


      $("#inasistencia").removeClass("nav-link active");
      $("#inasistencia").addClass("nav-link");

       <?php  }   ?>


      $("#mensajeAdministrador").removeClass("nav-link active");
      $("#mensajeAdministrador").addClass("nav-link");

     <?php  if ($_SESSION["inscrpcion_pregunta"] != 'NO') {   ?>


      $("#actaExamen").removeClass("nav-link active");
      $("#actaExamen").addClass("nav-link");

      <?php  }   ?>


      <?php  if ($_SESSION["inscrpcion_pregunta"] != 'NO') {   ?>


      $("#inscrpMesasExamen").removeClass("nav-link active");
      $("#inscrpMesasExamen").addClass("nav-link");


      <?php  }else{   ?>

      $("#visualizarNotaMesa").removeClass("nav-link active");
      $("#visualizarNotaMesa").addClass("nav-link");

      <?php  }   ?>


}


   $.unblockUI();

  </script>
  




                </div>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>






