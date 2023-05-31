<?php 
class Calculadora {
    private $num1;
    private $num2;
  
    public function __construct($num1, $num2) {
      $this->num1 = $num1;
      $this->num2 = $num2;
    }
  
    public function sumarYRestar(): string{
      $suma = $this->num1 + $this->num2;
      $diferencia = $this->num1 - $this->num2;
      $mensaje= "$this->num1 es mayor que {$this->num2}. ";
      $sumaString = "La suma de {$this->num1} y {$this->num2} es {$suma}. ";
      $diferenciaString = "La diferencia de {$this->num1} y {$this->num2} es {$diferencia}. ";
      $res = $mensaje . $sumaString . $diferenciaString;
      return $res;
    }
  
    public function multiplicarYDividir() {
      $producto = $this->num1 * $this->num2;
      $productoString = "El producto de {$this->num1} y {$this->num2} es {$producto}. ";
      try {
        if ($this->num2 === 0) {
          throw new Exception("La división entre 0 no está determinada");
        }
      } catch (Exception $error) {
        echo $error->getMessage() . " ";
      }
      $division = $this->num1 / $this->num2;
      $divisionString = "La división de {$this->num1} y {$this->num2} es {$division}. ";
      $mensaje= "$this->num2 es mayor que {$this->num1}. ";
      $res = $mensaje . $productoString . $divisionString;
      return $res;
    }
  }
  
?>