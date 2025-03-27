<?php

class Usuario extends Conectar {

    public function login() {

        $conectar = parent::conexion();
        parent::set_names();

        if (isset($_POST["enviar"])) {          

            // Saneamiento del correo y contraseña
            $correo = $_POST["use_correo"];
            $pass = htmlspecialchars($_POST["use_pass"], ENT_QUOTES, 'UTF-8');

            // Validar que no se permitan caracteres especiales en el correo
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                header("Location:".conectar::ruta()."index.php?m=3"); // Redirigir si el correo no es válido
                exit();
            }

            // Validar que los campos no estén vacíos
            if (empty($correo) && empty($pass)) {
                header("Location:".conectar::ruta()."index.php?m=2");
                exit();
            } else {

                // Consulta SQL para verificar si el usuario existe
                $sql = "SELECT * FROM usuarios WHERE use_correo=? and use_password=?";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $correo);
                $sql->bindValue(2, $pass);

                $sql->execute();
                $resultado = $sql->fetch();

                if (is_array($resultado) && count($resultado) > 0) {

                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_correo"] = $resultado["usu_correo"];

                    header("Location:".conectar::ruta()."view/Home/");
                    exit();

                } else {

                    header("Location:".conectar::ruta()."index.php?m=1");
                    exit();

                }
            }
        }
    }

} 



?>