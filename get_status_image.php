<?php

$imagen      = "notfound";
$id_proyecto = 0;


if (isset($_GET['proyecto'])) {
    $id_proyecto = (int) $_GET['proyecto'];
}

if ($id_proyecto !== 0) {

    $proyectos           = new SimpleXMLElement('proyectos.xml', null, true);
    $proyecto_solicitado = $proyectos->xpath("//proyecto[@id={$id_proyecto}]");


    if (count($proyecto_solicitado)) {
        $imagen = $proyecto_solicitado[0]->attributes()->status;
    }   
    
}

$imagen .= '.png';

$recurso_imagen = imagecreatefrompng("img/{$imagen}");

header("Content-type: image/png");
header("Content-Disposition: inline; filename=status.png");
imagepng($recurso_imagen);