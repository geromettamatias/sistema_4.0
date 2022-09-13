
    <style>
   
            table.table-bordered{
    border:1px solid black;
 
        }
      table.table-bordered > thead > tr > th{
          border:1px solid black;
      }
      table.table-bordered > tbody > tr > td{
          border:1px solid black;
      }
    </style>
<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();


if (isset($_SESSION['buscar'])){
$buscar=$_SESSION['buscar'];



?>

 
<br>

            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                    Nombre, Apellido o DNI del Alumno: <?php echo $buscar ?>
                </h3>
              </div>
              <div class="card-body">

            
        


                <?php
  

            $consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor` FROM `datosalumnos` WHERE `nombreAlumnos` LIKE '%$buscar%' OR `dniAlumnos` LIKE '%$buscar%'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


 <table id="tablaAlumnoNuevo" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>N°</th> 
                            <th>DNI</th>
                            <th>Apellido y Nombre</th> 
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                     
                            $colorFinal='';

                            $contadorColores=0;
                           
                    foreach($data as $dat) { 

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

                            <td><?php echo $dat['idAlumnos'] ?></td>
                            <td><?php echo $dat['dniAlumnos'] ?></td>
                            <td><?php echo $dat['nombreAlumnos'] ?></td>
                            <td>

                                <button type="button" class="btn btn-success"  title='DATOS' class="dropdown-item" onclick="btnEditar_Alumno_datos(<?php echo $dat['idAlumnos'] ?>)">Visualizar datos</button>

                                <button type="button" class="btn btn-info"  title='Libreta' class="dropdown-item" onclick="btnEditar_Alumno_Libre(<?php echo $dat['idAlumnos'] ?>)">Libreta</button>

                                <button type="button" class="btn btn-danger"  title='INFORME' class="dropdown-item" onclick="btnEditar_Alumno_Libre_INFORME(<?php echo $dat['idAlumnos'] ?>)">Informe</button>

                      


                            </td>
                        </tr>
                    <?php   }  ?>                                
                    </tbody>        
                </table>

               
              </div>
              <!-- /.card -->
            </div>





<br>

            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                    Nombre, Apellido o DNI del Docente: <?php echo $buscar ?>
                </h3>
              </div>
              <div class="card-body">

            
        


                <?php
  

            $consulta = "SELECT `idDocente`, `dni`, `nombre` FROM `datos_docentes` WHERE `nombre` LIKE '%$buscar%' OR `dni` LIKE '%$buscar%'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


 <table id="tablaDocente" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>N°</th> 
                            <th>DNI</th>
                            <th>Apellido y Nombre</th> 
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                     
                            $colorFinal='';

                            $contadorColores=0;
                           
                    foreach($data as $dat) { 

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

                                 <td><?php echo $dat['idDocente'] ?></td>
                                <td><?php echo $dat['dni'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>

                      
                            <td>

                           
                                
                                  <button type="button" class="btn btn-success"  title='DATOS' class="dropdown-item" onclick="btnEditar_Docente_datos(<?php echo $dat['idDocente'] ?>)">Visualizar datos</button>

                                <button type="button" class="btn btn-info"  title='DJ' class="dropdown-item" onclick="btnEditar_Docente_dj(<?php echo $dat['idDocente'] ?>)">ESTADO</button>

                           

                            </td>
                        </tr>
                    <?php   }  ?>                                
                    </tbody>        
                </table>

               
              </div>
              <!-- /.card -->
            </div>









                  
 


<script type="text/javascript">

$('#imagenProceso').hide();
      $('#cargaCiclo').hide();
    var tablaAlumno = $('#tablaAlumnoNuevo').DataTable({ 

          
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


    var tablaDocente = $('#tablaDocente').DataTable({ 

          
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






















function btnEditar_Alumno_datos(idAlumnos){
         

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
                url: "modulos/buscarDocentesAlumnos/elementos/crud_AlumnosDatosLetura.php",
                type: "POST",
                dataType: "json",
                data: {idAlumnos:idAlumnos},
                 beforeSend: function() {
                                $("#imagenProceso").show();
                                
                              },
                success: function(data){  
                
                    idAlumnos = data[0].idAlumnos;            
                    nombreAlumnos = data[0].nombreAlumnos;
                    dniAlumnos = data[0].dniAlumnos;

                    cuilAlumnos = data[0].cuilAlumnos;
                    domicilioAlumnos = data[0].domicilioAlumnos;
                    emailAlumnos = data[0].emailAlumnos;
                    telefonoAlumnos = data[0].telefonoAlumnos;



                    discapasidadAlumnos = data[0].discapasidadAlumnos;
                    nombreTutor= data[0].nombreTutor;
                    dniTutor = data[0].dniTutor;
                    TelefonoTutor = data[0].TelefonoTutor;
               
                    nombre = data[0].nombre;


                    fechaNacimiento = data[0].fechaNa;
                    nLegajo = data[0].nLegajos;
                    nacido = data[0].nacido;
                    procedencia = data[0].procedencia;
                    nacionalidadTutor = data[0].nacionalidadTutor;


          Swal.fire({
                title: 'Datos',
                html:'<div class="col-12">  <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Apellido y Nombre: </span></div>'+nombreAlumnos+'</div>                                                                                <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">DNI: </span></div>'+dniAlumnos+'</div>                                                              <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">CUIL: </span></div>'+cuilAlumnos+'</div>                                                                                                    <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Domicilio: </span></div>'+domicilioAlumnos+'</div> <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Email: </span></div>'+emailAlumnos+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Telefono: </span></div>'+telefonoAlumnos+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Discapasidad: </span></div>'+discapasidadAlumnos+'</div>                                                                  <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Fecha de Nacimiento </span></div>'+fechaNacimiento+'</div>                                                 <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">N° Legajo </span></div>'+nLegajo+'</div>                                                                    <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Nacionalidad </span></div>'+nacido+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Procedencia </span></div>'+procedencia+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Fecha de Nacimiento Tutor</span></div>'+nacionalidadTutor+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Nombre y Apellido del Tutor </span></div>'+nombreTutor+'</div>  <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Especialidad </span></div>'+nombre+'</div>                                                        </div>', 
                focusConfirm: false,
                showCancelButton: true,                         
                }).then((result) => {

                     $.unblockUI();
              
          });

                










                       
                   $("#imagenProceso").hide();
                                         
                      
        }        
    });
  
}



function btnEditar_Docente_datos(idDocente){
   

 
 
    $.ajax({
        url: "modulos/buscarDocentesAlumnos/elementos/crud_DocenteDatosLetura.php",
        type: "POST",
        dataType: "json",
        data: {idDocente:idDocente},
        beforeSend: function() {
                                $("#imagenProceso").show();
                                
                              },
        success: function(data){  
           
            idDocente = data[0].idDocente;            
            nombre = data[0].nombre;
            dni = data[0].dni;
            domicilio = data[0].domicilio;
            email = data[0].email;
            telefono = data[0].telefono;
            titulo = data[0].titulo;
            password= data[0].passwordDocente;
            passwordDocente=atob(password);
            hijos= data[0].hijos;
            
            Swal.fire({
                title: 'Datos',
                html:'<div class="col-12">  <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Apellido y Nombre: </span></div>'+nombre+'</div>  <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">DNI: </span></div>'+dni+'</div>  <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Domicilio: </span></div>'+domicilio+'</div> <div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Email: </span></div>'+email+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Telefono: </span></div>'+telefono+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Titulo: </span></div>'+titulo+'</div><div class="input-group input-group-sm mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Posee Hijos en escolaridad? Indique en que nivel : </span></div>'+hijos+'</div><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-sm">Contraseña: </span></div>'+passwordDocente+'</div></div>', 
                focusConfirm: false,
                showCancelButton: true,                         
                }).then((result) => {

                   
              
          });

                

            $("#imagenProceso").hide();
                                    
               
        }        
    });



    
}







function btnEditar_Docente_dj(idDocente) {



   $.ajax({
          type:"post",
          data:'idDocente=' + idDocente,
          url:'modulos/buscarDocentesAlumnos/elementos/tablaasignDpce.php',
          success:function(r){ 


              ret=`<select class="form-control" id="cicloLectivoFina">
               
                `+r+`
                </select></div>`;
     

                  Swal.fire({
                          title: 'AÑO LECTIVO',
                          html:ret, 
                          focusConfirm: false,
                          showCancelButton: true,                         
                          }).then((result) => {
                            if (result.value) {                                             
                              cicloLectivoFina = document.getElementById('cicloLectivoFina').value;
                          
                   

                              btnEditar_Docente_dj_Final(cicloLectivoFina,idDocente);
                                              
                            }
                    });

 
            
      


      }
        });

}

function btnEditar_Docente_dj_Final(cicloLectivoFina,idDocente) {
    $.ajax({
          type:"post",
          data:'idDocente=' + idDocente + '&cicloLectivoFina=' + cicloLectivoFina,
          url:'modulos/buscarDocentesAlumnos/elementos/imprimirDJ.php',
          success:function(r){ 

                window.open('modulos/buscarDocentesAlumnos/elementos/crud_DocenteDatosLetura2.php', '_blank'); 

                
            }
        });

}



function btnEditar_Alumno_Libre_INFORME(idAlumnos) {


   $.ajax({
          type:"post",
          data:'idAlumnos=' + idAlumnos,
          url:'modulos/buscarDocentesAlumnos/elementos/tablaasignDpce.php',
          success:function(r){ 


              ret=`<select class="form-control" id="cicloLectivoFina">
               
                `+r+`
                </select></div>`;
     

                  Swal.fire({
                          title: 'AÑO LECTIVO',
                          html:ret, 
                          focusConfirm: false,
                          showCancelButton: true,                         
                          }).then((result) => {
                            if (result.value) {                                             
                              cicloLectivoFina = document.getElementById('cicloLectivoFina').value;
                          
                   

                             btnEditar_Alumno_Libre_INFORME_Final(cicloLectivoFina,idAlumnos);
                                              
                            }
                    });

 
            
      


      }
        });

}







function btnEditar_Alumno_Libre_INFORME_Final(cicloLectivoFina,idAlumnos) {


    $.ajax({
          type:"post",
          data:'idAlumnos=' + idAlumnos + '&cicloLectivoFina=' + cicloLectivoFina,
          url:'modulos/buscarDocentesAlumnos/elementos/imprimirLibreta.php',
          success:function(res){ 

            if (res=='1') {
                window.open('modulos/buscarDocentesAlumnos/elementos/informe.php', '_blank'); 
            }else{
                toastr.error('El Alumno NO POSEE LIBRETA EN ESE AÑO LIECTIVO en el sistema');

            }

                


            }
        });

}









function btnEditar_Alumno_Libre(idAlumnos) {


   $.ajax({
          type:"post",
          data:'idAlumnos=' + idAlumnos,
          url:'modulos/buscarDocentesAlumnos/elementos/tablaasignDpce.php',
          success:function(r){ 


              ret=`<select class="form-control" id="cicloLectivoFina">
               
                `+r+`
                </select></div>`;
     

                  Swal.fire({
                          title: 'AÑO LECTIVO',
                          html:ret, 
                          focusConfirm: false,
                          showCancelButton: true,                         
                          }).then((result) => {
                            if (result.value) {                                             
                              cicloLectivoFina = document.getElementById('cicloLectivoFina').value;
                          
                   

                             btnEditar_Alumno_Libre_Final(cicloLectivoFina,idAlumnos);
                                              
                            }
                    });

 
            
      


      }
        });

}











function btnEditar_Alumno_Libre_Final(cicloLectivoFina,idAlumnos) {


    $.ajax({
          type:"post",
          data:'idAlumnos=' + idAlumnos + '&cicloLectivoFina=' + cicloLectivoFina,
          url:'modulos/buscarDocentesAlumnos/elementos/imprimirLibreta.php',
          success:function(res){ 

            if (res=='1') {
                window.open('modulos/buscarDocentesAlumnos/elementos/libretaAlumno.php', '_blank'); 
            }else{
                toastr.error('El Alumno NO POSEE LIBRETA EN ESE AÑO LIECTIVO en el sistema');

            }

                


            }
        });

}











 $.unblockUI();

</script>

  



<?php } ?> 

