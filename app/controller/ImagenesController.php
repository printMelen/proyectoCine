<?php
class ImagenesController
{
    public static function inicio()
    {
        $_SESSION['imgPelis']= Imagenes::sacarImagenes();
    }
}