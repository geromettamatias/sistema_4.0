
<br>

<section class="content">
      <div class="container-fluid">
<div class="row justify-content-center">
  <div class="col-12 col-sm-6">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-warning">
    <div class="card-header text-center">
      <a href="javascript:void(0)" class="h1"><b>Personal</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Bienvenido al sistema autogestión de la E.E.T. N°16, primero debe iniciar sesión</p>

      <form id="formPrecept" class="needs-validation" novalidate>
        <div class="input-group mb-3">
           <label>DNI (SOLO NUMEROS)</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <input id="dniPre" type="text" class="form-control" data-inputmask='"mask": "99999999"' data-mask>
                  </div>
        
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append claveVer">
            <div  class="input-group-text">
              <span class="fa fa-eye icon cambio"></span>
            </div>
          </div>
          <input id="passwordPrecep" type="password" class="form-control" placeholder="Contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="form-check">
            <input type="checkbox" class="form-check-input" id="micheckbox" required>
            <label class="form-check-label" for="micheckbox">Verificación</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button  class="btn btn-outline-info btn-block">Iniciar sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

 </div>
</div>
</div>
</section>
<br>




  <script type="text/javascript">
$('[data-mask]').inputmask()


      function mostrarContrasena(){
      var tipo = document.getElementById("passwordPrecep");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }

$( ".claveVer" ).mouseup(function() {

    $(".cambio").removeClass("fa fa-eye-slash icon");
    $(".cambio").addClass("fa fa-eye icon");
    mostrarContrasena();
  }).mousedown(function() {
    $(".cambio").removeClass("fa fa-eye icon");
    $(".cambio").addClass("fa fa-eye-slash icon");
    mostrarContrasena();
  });

 


      $('#imagenProceso').hide();
   // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()


 $(document).ready(function() { 

    $('#formPrecept').submit(function(e){
   e.preventDefault();
   var dni = $.trim($("#dniPre").val());    
   var passwordPrecep =$.trim($("#passwordPrecep").val());

     if (document.getElementById('micheckbox').checked)
                    {
                       
    
   if(dni.length == "" || passwordPrecep == ""){
      Swal.fire({
          type:'warning',
          title:'Debe ingresar un dni y/o contraseña',
      });
      return false; 
    }else{

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
           url:"modulos/usuarios/personales/elementos/loginPrecep.php",
           type:"POST",
           datatype: "json",
           data: {dni:dni, passwordPrecep:passwordPrecep}, 
           success:function(data){ 
                   
               if(data == "null"){
                   
                    toastr.error('Usuario y/o password incorrecta !!');

                      Swal.fire({
                                          icon: 'error',
                                          title: 'Oops...',
                                          text: 'Usuario/Contraseña Incorrecta!!',
                                          footer: '<a href=""></a>'
                                        })

                        $.unblockUI();
               }else{

                $.unblockUI();
                 Swal.fire({
                                          title: '¡Conexión exitosa!',
                                          text: "Aclaración: No olvidar de guardar los datos nuevos o editados antes de salir !!!",
                                          icon: 'warning',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Ingresar al Sistema'
                                        }).then((result) => {
                                          if (result.isConfirmed) {
                                            
                                            window.location.href = "../personal/";
                                          }
                                        })


                   
               }
           }    
        });
    } 

    }    
});

    });


 

  $.unblockUI();
  </script>