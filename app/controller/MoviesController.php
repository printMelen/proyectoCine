<?php
class MoviesController
{
    public static function inicio()
    {
        ViewController::cargarVista("moviesPage");
    }
}