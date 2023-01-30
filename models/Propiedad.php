<?php

namespace Model;

class Propiedad extends ActiveRecord {
  protected static $tabla = 'propiedades';
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? NULL;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? NULL;
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->titulo = $args['titulo'] ?? '';
    $this->vendedores_id = $args['vendedores_id'] ?? '';
  }

  public function validar() {
    //Validación
    if (!$this->titulo) {
      self::$errores[] = "Añadir título es obligatorio";
    }
    if (!$this->precio) {
      self::$errores[] = "Añadir precio es obligatorio";
    }
    if (strlen($this->descripcion) < 50) {
      self::$errores[] = "Añadir descripción es obligatorio (mínimo de 50 caracteres)";
    }
    if (!$this->habitaciones) {
      self::$errores[] = "Añadir número de habitaciones es obligatorio";
    }
    if (!$this->wc) {
      self::$errores[] = "Añadir número de baños es obligatorio";
    }
    if (!$this->estacionamiento) {
      self::$errores[] = "Añadir número de estacionamiento es obligatorio";
    }
    if (!$this->vendedores_id) {
      self::$errores[] = "Indicar el vendedor es obligatorio";
    }
    if (!$this->imagen) {
      self::$errores[] = "Añadir imagen de la vivienda es obligatorio";
    }

    return self::$errores;
  }
}