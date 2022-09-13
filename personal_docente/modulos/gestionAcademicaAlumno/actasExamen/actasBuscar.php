
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
 

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              
              <div class="card-header">
                <h3 class="card-title">Gestión de Actas</h3>

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
                <option>Seleccione el tipo de ACTAS</option>
                <option>ACTAS- PARA REGULAR</option>
                <option>ACTAS- PARA LIBRE</option>
                <option>ACTAS- PARA EQUIVALENCIA</option>
                <option>ACTAS- PARA TERMINAL</option>
                
                </select>
          
              
<script type="text/javascript">

$('#imagenProceso').hide();

       $.blockUI({ 
        message: '<h1>Espere !!</h1>',
        css: { 
        border: 'none', 
        padding: '15px', 
        backgroundColor: '#000', 
        '-webkit-border-radius': '10px', 
        '-moz-border-radius': '10px', 
        opacity: .5, 
        color: '#fff' 
    } }); 



    $("#buscarTipo").change(function(){

      buscarTipo= $('#buscarTipo').val();


      

      if (buscarTipo!='Seleccione el tipo de ACTAS') {
      
      
       $.ajax({
          type:"post",
          data:'buscarTipo=' + buscarTipo,
          url:'modulos/gestionAcademicaAlumno/actasExamen/elementos/seccionACTA.php',
          beforeSend: function() {
            $('#imagenProceso').show();
                              },
          success:function(r){

           
              $('#tablaInstitucional').html(''); 
               $('#tablaInstitucional').load('modulos/gestionAcademicaAlumno/actasExamen/actaTabla.php');
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

           
           $('#buscarTablaInstitucional').html('');
            $('#tablaInstitucional').html('');
             $('#contenidoAyuda').html('');


             
  
           $("#collapseOne").collapse('show');

      
      $("#circularesP").removeClass("nav-link active");
      $("#circularesP").addClass("nav-link");

      

     <?php 

     session_start();

      if ($_SESSION["inscrpcion_pregunta"] != 'NO') {   ?>

      $("#actaExamen").removeClass("nav-link active");
      $("#actaExamen").addClass("nav-link");


        <?php 
            }
    
      if ($_SESSION["libreta_pregunta"] != 'NO') {   ?>

      $("#libretaDigitalDocente").removeClass("nav-link active");
      $("#libretaDigitalDocente").addClass("nav-link");

          <?php 
            }
    
      if ($_SESSION["d_j_pregunta"] != 'NO') {   ?>

      $("#dj").removeClass("nav-link active");
      $("#dj").addClass("nav-link");

       <?php 
            }
      ?>

      $("#generarPedido").removeClass("nav-link active");
      $("#generarPedido").addClass("nav-link");

    


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




