





  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
 

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              
              <div class="card-header">
                <h3 class="card-title">BUSCAR ALUMNO-ANALITICO</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button  type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>


              <div class="card-body">
                <div class="chart">
                  

                
             <?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();

$operacion=$_SESSION["operacion"];


 
$consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor` FROM `datosalumnos`";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>


 <div class="table-responsive">  


                <table id="tablaAlumnoNuevo2" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                         
                                <th>N°</th> 
                                <th>DNI</th>
                                <th>Apellido y Nombre</th> 
                         
                                <th>Botones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php      
                            $colorFinal='';

                            $contadorColores=0;                       
                            foreach($data as $dat) {           

                             $idAlumnos=$dat['idAlumnos'];
                             $dniAlumnos=$dat['dniAlumnos'];
                             $nombreAlumnos=$dat['nombreAlumnos'];


                             if ($contadorColores<=6) {
                                 $contadorColores++;

                                 if ($contadorColores==1) {
                                     $colorFinal='success';
                                 }else{
                                        if ($contadorColores==2) {
                                            $colorFinal='primary';
                                         }else{
                                                 if ($contadorColores==3) {
                                                    $colorFinal='secondary';
                                                 }else{
                                                    if ($contadorColores==4) {
                                                        $colorFinal='danger';
                                                     }else{
                                                        if ($contadorColores==5) {
                                                            $colorFinal='warning';
                                                         }else{
                                                            $colorFinal='info';
                                                         }
                                                     }
                                                 }
                                         }
                                 }

                             }else{
                                $contadorColores=1;
                                $colorFinal='success';
                             }




                            ?>
                            <tr class="table-<?php echo $colorFinal; ?>">
                             
                                <td><?php echo $idAlumnos; ?></td>
                                <td><?php echo $dniAlumnos; ?></td>
                                <td><?php echo $nombreAlumnos; ?></td>
<td>

                                <?php if ($operacion=='Lectura y Escritura'){ ?>

                                
                                <button id='btn1' class="btn btn-outline-danger glyphicon glyphicon-pencil" title="Formatear Analítico (se borrara todas las notas)" onclick="eliminarAnalitico('<?php echo $idAlumnos; ?>')" ><i class='fas fa-retweet'></i></button>


                                    <?php } ?>

                                    <button id='btn2' class="btn btn-outline-primary glyphicon glyphicon-pencil" title="Ingresar al Analítico" onclick="analiticosFinal('<?php echo $idAlumnos; ?>')"><i class='fas fa-sign-in-alt'></i></button>

                                    </td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>  
               

               
              </div>




 <script type="text/javascript">
$(document).ready(function(){

  $('#imagenProceso').hide();

    $('#tablaAlumnoNuevo2').DataTable({ 

          
  "destroy":true,
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
      {
        extend:    'excelHtml5',
        text:      '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success'
      },
      {
        extend:    'pdfHtml5',
        text:      '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger'
      },
      {
        extend:    'print',
        text:      '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info'
      },
    ]         
    });



    
});






function analiticosFinal(idAlumnos) {



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
    

  cadena="idAlumnos=" + idAlumnos;

  

$.ajax({
    type:"POST",
    url:"modulos/gestionAcademicaAlumno/analitico/elementos/probarAnalitico.php",
    data:cadena,
  
    success:function(res){



      if (res==0) {

          $.unblockUI();

            Swal.fire({
                        title: 'Problema',
                        text: "El Alumno no tiene cargado el analitico, desea cargar el mismo?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Cargar'
                      }).then((result) => {
                        if (result.isConfirmed) {
                         
                          cargaAnalitico(cadena);
                        }
                      })

                   

      }else{

        

          $('#contenidoAyuda').html(''); 
          $('#buscarTablaInstitucional').html('');
          $('#tablaInstitucional').load('modulos/gestionAcademicaAlumno/analitico/alumnosAnalitico2.php');
          


      }
    
    
        

    }
  });



  


    

}

 <?php if ($operacion=='Lectura y Escritura'){ ?>

                                


function eliminarAnalitico(idAlumnos) {


Swal.fire({
      title: 'Formatear Analítico',
      html:'<div class="col-12"><input type="text" class="form-control" id="pass"></div><br><p>Aclaración: Se borrara todas las notas</p></div>', 
              focusConfirm: false,
              showCancelButton: true,                         
              }).then((result) => {
                if (result.value) {                                             
                  pass = document.getElementById('pass').value,
                        
                 
                 eliminarAnaliticoFina(idAlumnos,pass);

                                  
                }
        });



}



function eliminarAnaliticoFina(idAlumnos,pass) {

  cadena="idAlumnos=" + idAlumnos+"&pass=" + pass;

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

       

$.ajax({
    type:"POST",
    url:"modulos/gestionAcademicaAlumno/analitico/elementos/eliminarAnalitico.php",
    data:cadena,
    success:function(res){
           $.unblockUI();

        if (res==1) {

           Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Se elimino completamente el analítico !!!',
              showConfirmButton: false,
              timer: 1500
            })

            toastr.success('Se elimino completamente el analítico !!!');

    

        }else{

        toastr.warning('Contraseña incorrecta !!!');

          Swal.fire({
                  icon: 'warning',
                  title: 'Problema',
                  text: 'Contraseña Incorrecta',
                  footer: '<a href>Why do I have this issue?</a>'
                })
        }
    

    }
  });



  


  

}


 


<?php } ?>


function cargaAnalitico(cadena) {

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

  
  $.ajax({
    type:"POST",
    url:"modulos/gestionAcademicaAlumno/analitico/elementos/seccionAnalitico.php",
    data:cadena,
  
    success:function(r){

      
        $.unblockUI();

          
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Se cargo el analítico exitosamente !!!',
          showConfirmButton: false,
          timer: 1500
        })

        toastr.success('Se cargo el analítico exitosamente !!!');

    
     

    }
  });
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



       











      
                                          

        

