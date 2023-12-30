<?php
class Register{
    public static function comprobar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and clean input values
            $nombreApellidos = Register::clean_input($_POST["nombreApellidos"]);
            $nif = Register::clean_input($_POST["nif"]);
            $email = Register::clean_input($_POST["email"]);
            $password = Register::clean_input($_POST["password"]);
            $confirm_password = Register::clean_input($_POST["confPassword"]);
        
            $array=explode(",",$nombreApellidos);
            // Validate Name and Surnames
            if (empty($nombreApellidos)) {
                //PONER EL VALUE EN NOMBRE
            } elseif (Register::starts_with_number($name) || Register::starts_with_number($surnames)) {
                $error_message = "Name and Surnames cannot start with a number.";
            }
            // Validate NIF
            elseif (!Register::validate_nif($nif)) {
                $error_message = "Invalid NIF format.";
            }
            // Validate Email
            elseif (!Register::validate_email($email)) {
                $error_message = "Invalid email address.";
            }
            // Validate Password and Confirm Password
            elseif (empty($password) || empty($confirm_password) || $password !== $confirm_password) {
                $error_message = "Password and Confirm Password do not match.";
            }
            // If all validations pass, you can proceed with registration
            else {
                // Perform registration logic here
        
                // For demonstration purposes, let's just display a success message
                $success_message = "Registration successful!";
            }
        }
    }
    
// Function to sanitize and validate input
public static function  clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate NIF (Spanish National Identification Number)
public static function validate_nif($nif) {
    // Implement your NIF validation logic here
    // For simplicity, let's assume a NIF is valid if it is a 9-digit number
    return preg_match('/^\d{9}$/', $nif);
}

// Function to validate email address
public static function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to check if a string starts with a number
public static function starts_with_number($str) {
    return preg_match('/^[0-9]/', $str);
}

// Check if form is submitted
}
?>



