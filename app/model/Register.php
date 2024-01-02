<?php
class Register
{
    public static function comprobar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and clean input values
            $nombreApellidos = Register::clean_input($_POST["nombreApellidos"]);
            $nif = Register::clean_input($_POST["nif"]);
            $email = Register::clean_input($_POST["email"]);
            $password = Register::clean_input($_POST["password"]);
            $confirm_password = Register::clean_input($_POST["confPassword"]);

            $nombre = explode(",", $nombreApellidos);
            
            // Validate Name and Surnames
            if (empty($nombreApellidos)) {
                //PONER EL VALUE EN NOMBRE
            } elseif (Register::starts_with_number($nombre[0]) || Register::starts_with_number($nombre[1])) {
                echo $error_message = "Name and Surnames cannot start with a number.";
            }
            // Validate NIF
            elseif (!Register::validate_nif($nif)) {
                echo $error_message = "Invalid NIF format.";
            }
            // Validate Email
            elseif (!Register::validate_email($email)) {
                echo  $error_message = "Invalid email address.";
            }
            // Validate Password and Confirm Password
            elseif (empty($password) || empty($confirm_password) || $password !== $confirm_password) {
                echo $error_message = "Password and Confirm Password do not match.";
            }
            // If all validations pass, you can proceed with registration
            else {
                // Perform registration logic here

                // For demonstration purposes, let's just display a success message
                echo "Registration successful!";
                Register::registrar($nombre[0],$nombre[1],$nif,$email,$password);
                ControllerCorreo::enviarCorreo($_SESSION['email']);
            }
        }
    }

    public static function registrar($nombre, $apellidos, $nif, $email, $password)
    {
        try {
            $db = Conectar::conexion();
            $sql = "INSERT INTO `usuariosc`(`correo`, `nombre`, `apellidos`, `NIF`, `activo`, `avatar`, `hash_pass`, `rol`) VALUES (?,?,?,?,'0','avatarPorDefecto.svg',?,'cliente')";
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
            $_SESSION["email"]=$email;
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
