<?php
class DefaultController
{
    public static function inicio()
    {
        echo "<br><h4>Estoy en DefaultController y llamo al metodo mostrarTodos() de UsuarioController</h4><br>";
        UsuarioController::mostrarTodos();
    }
}
