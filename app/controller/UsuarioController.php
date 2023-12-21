<?php
class UsuarioController
{
    public static function inicio()
    {
        echo "<br><h4> Estoy en el método inicio de UsuarioController</h4><br> ";
        echo "<br>LLamo al metodo mostrarTodos() mi propia clase<br>";
        self::mostrarTodos();
    }
    public static function mostrarTodos()
    {
        echo "<br><h4>Estoy en el metodo mostrarTodos() de UsuarioController y llamo al getTodosUsuarios() de la clase Usuarios del modelo</h4>";
        echo "<br><h4>UsuarioController recibe un array del Modelo. Muestra los resultados llamando a una vista:</h4><br>";
        $datos = Usuarios::getTodosUsuarios();
        echo "<br><h4>Carga la vista usuariosV.php a través del método cargarVista() de ViewController:</h4><br>";


        //include "app/view/usuariosV.php";

        ViewController::cargarVista("usuariosV", $datos);


        //LLama al QrController para hacer una prueba
        QrController::generarQr();
    }
}
