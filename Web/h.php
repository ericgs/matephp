<?php
require_once '../Controladores/ControladorHistorias.php';
/* create
$h = new Historia();
$h->setCosto(5);
$h->setDetalle('sin detalle para esta historia3');
$h->setIdProyecto(1);
$h->setRiesgo(12);
$h->setTitulo('his2 nombre completo');
$h->setNombreCorto('h3');


createHistoriaDAO($h);
*/
/* delete
deleteHistoriaControlador(12);*/

/*update*/
$h = new Historia();
$h->setId(12);
$h->setCosto(12);
$h->setDetalle('123123 12312 312 3123 12 3');
/*$h->setIdProyecto(1);*/
$h->setRiesgo(9);
$h->setTitulo('123123123123123 12312 312 3');
$h->setNombreCorto('h123123123');

updateHistoriaControlador($h);