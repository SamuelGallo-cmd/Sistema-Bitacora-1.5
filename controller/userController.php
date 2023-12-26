<?php
    class ControllerUser{
        
         //recibe como parámetro la cédula de un usuario y retorna el nombre completo del usuario correspondiente a dicha cédula.
        static public function ctrNameUser($cedula){
            
            $respuesta = User::mdlNameUser($cedula);
            return $respuesta;

        }

        public function ctrLoginUser(){

            if(isset($_POST["ingUser"])){
                
                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUser"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                    $valor = $_POST["ingUser"];
                    //loginUser para obtener los datos del usuario que se está intentando ingresar
                    $incrypt = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');
                    // Si el usuario existe y su estado es 'Activo', se comprueba si los datos ingresados coinciden con los almacenados en la base de datos.
                    $respuesta = User::loginUser($valor, $incrypt);
                    //Si coinciden, se establecen las variables de sesión correspondientes y se redirige al usuario a la página de inicio. Si no coinciden, 
                    //se muestra un mensaje de error. Si el usuario no existe o su estado no es 'Activo', también se muestra un mensaje de error
                    if(($respuesta != null) && ($respuesta["estado" ]== 'Activo')){
                    
                        if(($respuesta["cedula"] == $_POST["ingUser"]) && ($respuesta["password"] == $incrypt)){
                            $_SESSION["iniciarSesion"] = "ok";
                            $_SESSION["estado"] = $respuesta["estado"];
                            $_SESSION["cedula"] = $respuesta["cedula"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["apellidos"] = $respuesta["apellido"];
                            $_SESSION["telefono"] = $respuesta["telefono"];
                            $_SESSION["role"] = $respuesta["role"];

                        
                        
                        echo '<script>
                                window.location = "inicio"
                            </script>';
                        
                    }else{
                        echo '<br><div class="alert alert-danger">ERROR al ingresar, vuelve a intentarlo</div>';
                    }
                }else{
                    echo '<br><div class="alert alert-danger">ERROR al ingresar, vuelve a intentarlo</div>';
                }
                }

            }
        }

        static public function verificarExiste($item, $valor){

            $respuesta = User::mdlShow($item, $valor);

            if(($respuesta == null) && ($respuesta["estado" ] != 'Activo')){
                session_destroy();
            }
        }





        /**REGISTRO DE EMPLEADOS */
        static public function ctrCreateUser(){
            if(isset($_POST["idUser"])){
                 // verifica que se hayan enviado los datos del formulario y que cumplan con ciertos patrones de validación 

                if(preg_match('/^[a-zA-Z0-9]{1,20}$/', $_POST["idUser"])){//solo acepta numeros y letras
                    if(preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["nameUser"]) && 
                        preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["lastNameUser"])){ //solo acepta letras
                            if(preg_match('/^[a-zA-Z0-9]{8,20}$/', $_POST["passwordUser"])){ //solo acepta numeros y letras entre 8 y 20 digitos
                                if(preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $_POST["emailUser"])){ //acepta un correo valido
                                        if(preg_match('/^[a-zA-Z0-9ÑñáéíóúÁÉÍÓÚ, ]{1,200}$/', $_POST["directionUser"])){
                                            if(preg_match('/^[0-9]{1,15}$/', $_POST["telefonoUser"])){
                                                //crypt de PHP para cifrar la contraseña del usuario y almacenarla en una variable.
                                                $incrypt = crypt($_POST["passwordUser"], '$2a$07$usesomesillystringforsalt$');
                                                $datas = array("cedula" => $_POST["idUser"], 
                                                                "nombre" => $_POST["nameUser"], 
                                                                "apellidos" => $_POST["lastNameUser"],
                                                                "email" => $_POST["emailUser"],
                                                                "role" => $_POST["roleUser"],
                                                                "password" => $incrypt,
                                                                "telefono" => $_POST["telefonoUser"],
                                                                "direccion" => $_POST["directionUser"],
                                                                "estado" => $_POST["estadoUser"]);
                                                $respuesta = User::mdlAdd($datas);
                                                var_dump($datas);
                                                error_log("Respuesta del servidor: " . print_r($respuesta, true), 3, "error_log.txt");
                                                if($respuesta == "ok"){
                                                    echo "<script>
                                                    
                                                        Swal.fire({
                                                            title: 'El usuario se agregó correctamente',
                                                            icon: 'success',
                                                        }).then((result) => {
                                                            window.location = 'users';
                                                        })
                            
                                                    </script>";
                                                }else{

                                                    echo "<script>
                                                    
                                                    Swal.fire({
                                                        title: 'No se puede agregar el usuario',
                                                        icon: 'error',
                                                    }).then((result) => {
                                                        window.location = 'users';
                                                    })
                                                    </script>";
                                                }
                                            }
                                        }
                                    
                                }
                            }
                    }
                    
                }

            }
        }

        static public function ctrShowUser($item, $valor){
            //User y permite obtener información de un usuario específico en la base de datos.
            //parámetros: $item que indica el campo de la tabla donde se buscará la información (por ejemplo, "idUsuario", "nombre", "cedula", etc.), y $valor que es el valor que se buscará en ese campo para 
            //obtener la información específica de ese usuario.
            //sino no hay parametros trae todos los usuarios
            
            $respuesta = User::mdlShow($item, $valor);
            return $respuesta;
        }



        

        static public function ctrUpdateUser(){
             //ctrUpdateUser actualiza los datos de un usuario en la base de datos y su imagen de perfil en caso de haberla modificado.
            //se verifica si se ha enviado un ID de usuario a través del método POST y si su formato es correcto. Luego se establece la tabla de la base de 
            //datos en la que se realizará la actualización.

            if(isset($_POST["idUserm"])){

                if(preg_match('/^[a-zA-Z0-9]{1,20}$/', $_POST["idUserm"])){//solo acepta numeros y letras
                    if(preg_match('/^[a-zA-Z0-9]{8,20}$/', $_POST["passwordUserm"]) || $_POST["passwordUserm"] === ""){
                        if(preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["nameUserm"]) && 
                            preg_match('/^[a-zA-ZÑñáéíóúÁÉÍÓÚ ]{1,45}$/', $_POST["lastNameUserm"])){ //solo acepta letras
                                if(preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $_POST["emailUserm"])){ //acepta un correo valido
                                        if(preg_match('/^[a-zA-Z0-9ÑñáéíóúÁÉÍÓÚ, ]{1,200}$/', $_POST["directionUserm"])){
                                            if(preg_match('/^[0-9]{1,8}$/', $_POST["telefonoUserm"])){
                                                
                                                $table = "usuario";
                                                
                                                /**CAMBIAR CONTRASEÑA */

                                                if($_POST["passwordUserm"] != ""){
                                                    $incrypt = crypt($_POST["passwordUserm"], '$2a$07$usesomesillystringforsalt$');
                                                }else{
                                                    $incrypt = $_POST["passwordActual"];
                                                }

                                                $datas = array("cedula" => $_POST["idUserm"], 
                                                                "nombre" => $_POST["nameUserm"], 
                                                                "apellidos" => $_POST["lastNameUserm"],
                                                                "email" => $_POST["emailUserm"],
                                                                "role" => $_POST["roleUserm"],
                                                                "estado" => $_POST["estadoUserm"],
                                                                "password" =>  $incrypt,
                                                                "telefono" => $_POST["telefonoUserm"],
                                                                "direccion" => $_POST["directionUserm"]);
                                                
                                                $respuesta = User::mdlUpdate($datas);
                                                
                                                
                                                if($respuesta == "ok"){  
                                                

                                                    //Guarda los nuevos datos de las variables session y los actualiza
                                                    if( $_SESSION['cedula'] == $_POST["idUserm"] ){
                                                        
                                                        $_SESSION["cedula"] = $_POST["idUserm"];
                                                        $_SESSION["nombre"] = $_POST["nameUserm"];
                                                        $_SESSION["apellidos"] = $_POST["lastNameUserm"];
                                                        $_SESSION["email"] = $_POST["emailUserm"];
                                                        $_SESSION["role"] = $_POST["roleUserm"];
                                                        $_SESSION["estado"] = $_POST["estadoUserm"];
                                                        $_SESSION["telefonoUserm"] = $_POST["telefonoUserm"];
                                                        $_SESSION["direccion"] = $_POST["directionUserm"];
                                                    }
                                                                

                                                    echo "<script>
                                                    
                                                        Swal.fire({
                                                            title: 'El usuario se modificó correctamente',
                                                            icon: 'success',
                                                        }).then((result) => {
                                                            window.location = 'users';
                                                        })
                                                    </script>";
                                                }
                                            }
                                        }
                                    
                                }
                                
                        }
                    
                    }
                    
                }
            }
        }

        static public function ctrDeleteUser(){
            if(isset($_GET["idEmpleadoE"])){
                $table = "empleado";
                $data = $_GET["idEmpleadoE"];
                
                $rutaImagen = User::getUserImagePath($data);
                $respuesta = User::mdlDelete($data);
                
                if (strpos($respuesta, 'Error en la conexión a la base de datos') !== false) {
                    echo "<script>
                        Swal.fire({
                            title: 'Error en la conexión a la base de datos',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false,
                            icon: 'error',
                        }).then((result) => {
                            if(result.value){
                                window.location = 'users';
                            }
                        });
                    </script>";
                } else if(strpos($respuesta, 'No se puede eliminar un usuario con rol de super administrador.') !== false){
                    echo "<script>
                        Swal.fire({
                            title: '".$respuesta."',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false,
                            icon: 'error',
                        }).then((result) => {
                            if(result.value){
                                window.location = 'users';
                            }
                        });
                    </script>";
                }else{
                    echo "<script>
                        Swal.fire({
                            title: 'El usuario se eliminó correctamente',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false,
                            icon: 'success',
                        }).then((result) => {
                            if(result.value){
                                window.location = 'users';
                            }
                        })
                    </script>";

                    if( $_SESSION['cedula'] == $data ){
                        session_destroy();
                    }
                }
                
            }
        }
    }
    


?>  