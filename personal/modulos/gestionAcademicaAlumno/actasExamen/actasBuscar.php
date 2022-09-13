
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
 

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              
              <div class="card-header">
                <h3 class="card-title">BUSCAR EL TIPO DE ACTA</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button onclick="remover4()" type="button" class="btn btn-tool" data-card-widget="remove">
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


      

      if (buscarTipo!='Seleccione el tipo de ACTAS') {
      
      
       $.ajax({
          type:"post",
          data:'buscarTipo=' + buscarTipo,
          url:'modulos/gestionAcademicaAlumno/actasExamen/elementos/seccionACTA.php',
          beforeSend: function() {
            $('#imagenProceso').show();
                              },
          success:function(r){




              toastr.info('Se seleccionó '+buscarTipo);


           
              $('#tablaInstitucional').html(''); 
               $('#tablaInstitucional').load('modulos/gestionAcademicaAlumno/actasExamen/actaTabla.php');
              $('#contenidoAyuda').html(''); 
            

    
              $('#imagenProceso').hide();
          }
        });

      }else{

        toastr.warning('No hay ninguna Acta seleccionado');

        $('#tablaInstitucional').html('');

         $.unblockUI();
      }

      });


 $.unblockUI();






function remover4 () {

  
        
       $("#planillaDocente").removeClass("nav-link active");
      $("#planillaDocente").addClass("nav-link");

      $("#ciclo").removeClass("nav-link active");
      $("#ciclo").addClass("nav-link");

      $("#encabesados").removeClass("nav-link active");
      $("#encabesados").addClass("nav-link");
      $("#informes").removeClass("nav-link active");
      $("#informes").addClass("nav-link");

    

      $("#usuarioOtro").removeClass("nav-link active");
      $("#usuarioOtro").addClass("nav-link");

      $("#posteo").removeClass("nav-link active");
      $("#posteo").addClass("nav-link");


      $("#modeloDos").removeClass("nav-link active");
      $("#modeloDos").addClass("nav-link");

      $("#modeloUno").removeClass("nav-link active");
      $("#modeloUno").addClass("nav-link");


      $("#datosSitio").removeClass("nav-link active");
      $("#datosSitio").addClass("nav-link");

      $("#datos_Institucion").removeClass("nav-link active");
      $("#datos_Institucion").addClass("nav-link");

      $("#datosPlanEstudios").removeClass("nav-link active");
      $("#datosPlanEstudios").addClass("nav-link");


      $("#asignaturas").removeClass("nav-link active");
      $("#asignaturas").addClass("nav-link");

      $("#anuncioAlumnoCantidadEstadistica").removeClass("nav-link active");
      $("#anuncioAlumnoCantidadEstadistica").addClass("nav-link");


      $("#usuariosEstadistica").removeClass("nav-link active");
      $("#usuariosEstadistica").addClass("nav-link");

      $("#cursos").removeClass("nav-link active");
      $("#cursos").addClass("nav-link");

      $("#cargaAlumno").removeClass("nav-link active");
      $("#cargaAlumno").addClass("nav-link");

      $("#cargaAlumnoPre").removeClass("nav-link active");
      $("#cargaAlumnoPre").addClass("nav-link");

$("#habilitarDocente").removeClass("nav-link active");
      $("#habilitarDocente").addClass("nav-link");


      $("#cargaDocente").removeClass("nav-link active");
      $("#cargaDocente").addClass("nav-link");

      $("#inscripNota").removeClass("nav-link active");
      $("#inscripNota").addClass("nav-link");

      $("#libretaDigital").removeClass("nav-link active");
      $("#libretaDigital").addClass("nav-link");

      $("#planillaCentralizadora").removeClass("nav-link active");
      $("#planillaCentralizadora").addClass("nav-link");

      $("#analiticos").removeClass("nav-link active");
      $("#analiticos").addClass("nav-link");

      $("#asistenciaAlumno").removeClass("nav-link active");
      $("#asistenciaAlumno").addClass("nav-link");

      $("#actas").removeClass("nav-link active");
      $("#actas").addClass("nav-link");

    

     
      $("#circularProfe").removeClass("nav-link active");
      $("#circularProfe").addClass("nav-link");

    

      $("#novedades").removeClass("nav-link active");
      $("#novedades").addClass("nav-link");

      $("#directivoDatos").removeClass("nav-link active");
      $("#directivoDatos").addClass("nav-link");

      $("#historia").removeClass("nav-link active");
      $("#historia").addClass("nav-link");

      $("#anuncioAlumno").removeClass("nav-link active");
      $("#anuncioAlumno").addClass("nav-link");

      $("#anuncioProfe").removeClass("nav-link active");
      $("#anuncioProfe").addClass("nav-link");

      $("#estadisticaApro").removeClass("nav-link active");
      $("#estadisticaApro").addClass("nav-link");

      $("#planillaNotas").removeClass("nav-link active");
      $("#planillaNotas").addClass("nav-link");

      


     
         $("#generarPedidoAdmin").removeClass("nav-link active");
      $("#generarPedidoAdmin").addClass("nav-link");

          $("#generarPedido").removeClass("nav-link active");
      $("#generarPedido").addClass("nav-link");

           $("#correos").removeClass("nav-link active");
      $("#correos").addClass("nav-link");

           $("#correosSER").removeClass("nav-link active");
      $("#correosSER").addClass("nav-link");


            $("#notificacion").removeClass("nav-link active");
      $("#notificacion").addClass("nav-link");

     $("#ingresoSistema").removeClass("nav-link active");
      $("#ingresoSistema").addClass("nav-link");


        $("#collapseOne").collapse('show');
  
 
        $('#contenidoAyuda').html(''); 
           $('#contenidoCursos').html('');
        $('#tablaInstitucional').html('');
        
        $('#buscarTablaInstitucional').html(''); 



}









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




