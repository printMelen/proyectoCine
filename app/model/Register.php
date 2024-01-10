<?php
class Register
{
    public static function comprobar()
    {
        $devolver=false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and clean input values
            $nombreApellidos = Register::clean_input($_POST["nombreApellidos"]);
            $nif = Register::clean_input($_POST["nif"]);
            $email = Register::clean_input($_POST["email"]);
            $password = Register::clean_input($_POST["password"]);
            $confirm_password = Register::clean_input($_POST["confPassword"]);
            $error_message="";
            $nombre = explode(",", $nombreApellidos);
            
            
            // Validate Name and Surnames
            if (empty($nombreApellidos)) {
                $_SESSION["nombreApellidos"]="Nombre,Apellido1 Apellido2";
                $error_message = "No puede estar vacio";
                //PONER EL VALUE EN NOMBRE
            } elseif (Register::starts_with_number($nombre[0]) || Register::starts_with_number($nombre[1])) {
                $_SESSION["nombreApellidos"]="Nombre,Apellido1 Apellido2";
                $error_message = "Name and Surnames cannot start with a number.";
            }else{
                $_SESSION["nombreApellidos"]=$nombreApellidos;
            }
            // Validate NIF
            if (!Register::validate_nif($nif)) {
                $_SESSION["nif"]="12345678L";
                $error_message = "Invalid NIF format.";
            }else{
                $_SESSION["nif"]=$nif;
            }
            // Validate Email
            if (!Register::validate_email($email)) {
                $_SESSION["correo"]="correo@gmail.com";
                $error_message = "Invalid email address.";
            }else{
                $_SESSION["correo"]=$email;
            }
            // Validate Password and Confirm Password
            if (empty($password) || empty($confirm_password) || $password !== $confirm_password) {
                echo $error_message = "Password and Confirm Password do not match.";
            }
            // If all validations pass, you can proceed with registration
            if ($error_message=="") {
                $devolver=true;
                echo "Registration successful!";
                Register::registrar($nombre[0],$nombre[1],$nif,$email,$password);
                $_SESSION['correo']=$email;
                CrearCookieController::crear($email);
                ControllerCorreo::enviarCorreo($_SESSION['correo']);
            }
            
        }
        return $devolver;
    }

    public static function registrar($nombre, $apellidos, $nif, $email, $password)
    {
        try {
            $db = Conectar::conexion();
            $sql = "INSERT INTO `usuariosc`(`correo`, `nombre`, `apellidos`, `NIF`, `activo`, `avatar`, `hash_pass`, `rol`) VALUES (?,?,?,?,'0','avatarSudadera.png',?,'cliente')";
            $resultado = $db->prepare($sql);
            $resultado->bindParam(1, $email, PDO::PARAM_STR);
            $resultado->bindParam(2, $nombre, PDO::PARAM_STR);
            $resultado->bindParam(3, $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(4, $nif, PDO::PARAM_STR);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $resultado->bindParam(5, $hashed_password, PDO::PARAM_STR);
            $resultado->execute(); 
            
            $resultado->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
            $resultado = null; // obligado para cerrar la conexión
            $db = null; 
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();  
            echo "<br>Línea del error: " . $e->getLine();  
            echo "<br>Archivo del error: " . $e->getFile();
        }
        
    }
    // Function to sanitize and validate input
    public static function  clean_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Function to validate NIF (Spanish National Identification Number)
    public static function validate_nif($nif)
    {
        // Implement your NIF validation logic here
        // For simplicity, let's assume a NIF is valid if it is a 9-digit number
        return preg_match('/^\d{8}[a-zA-Z]$/', $nif);
    }

    // Function to validate email address
    public static function validate_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Function to check if a string starts with a number
    public static function starts_with_number($str)
    {
        return preg_match('/^[0-9]/', $str);
    }

    // Check if form is submitted
}
