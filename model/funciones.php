<?php

function portada($oferta_id, $oferta){
  $salida= "";
  $salida = $salida .'<div class="u-expanded-width u-list u-list-1">';
  $salida = $salida .'<div class="u-repeater u-repeater-1">';
  $salida = $salida .'<div class="u-container-style u-list-item u-repeater-item u-white u-list-item-1">';
  $salida = $salida .'<div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">';
  $salida = $salida .'<img class="u-image u-image-default u-image-1" src="'. $oferta["imagen"] .'" alt="'. $oferta["nombre"];
  $salida = $salida .'<div class="u-container-style u-group u-video-cover u-group-1">';
  $salida = $salida .'<div class="u-container-layout u-valign-middle u-container-layout-2">';
  $salida = $salida .'<h3 class="u-custom-font u-font-oswald u-text u-text-2">'. $oferta["nombre"]. '</h3>';
  $salida = $salida .'<p class="u-text u-text-3">'. $oferta["descripcion"]. '</p>';
  $salida = $salida .'<h6 class="u-text u-text-custom-color-1 u-text-4">Antes '. $oferta["precio"] .'<strong> Ahora '. $oferta["precioOferta"].' </strong></h6>';
  $salida = $salida .'<a href="" class="u-btn u-button-style u-grey-10 u-btn-1">agregar al carrito</a></div></div></div></div>';
  return $salida;
}
   

  $ofertas = array();

  $ofertas[001] = array(
    "nombre" => "Drontal / Perro",
    "descripcion" => "Antiparasitante: limpia el sistema digestivo de tu mascota",
    "imagen" => "..\images\ImagesProductos\DRONTAL.png",
    "precio" => 15000,
    "precioOferta" => 12000);

  $ofertas[002] = array(
    "nombre" => "Jueguete",
    "descripcion" => "Los juguetes son una gran herramienta para dar calidad de vida a tu perro.",
    "imagen" => "..\images\ImagesProductos\juguete.jpg",
    "precio" => 5000,
    "precioOferta" => 4000);

  $ofertas[003] = array(
    "nombre" => "Collar",
    "descripcion" => "Asegura tu mascota",
    "imagen" => "..\images\ImagesProductos\collar.jpg",
    "precio" => 16000,
    "precioOferta" => 14000);

  $ofertas[004] = array(
    "nombre" => "Galletas",
    "descripcion" => "Alimenta tu mascota",
    "imagen" => "..\images\ImagesProductos\galleta.jpg",
    "precio" => 13000,
    "precioOferta" => 10000);
?>