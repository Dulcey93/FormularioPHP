<?php
session_start();

$seccionVariables = ['Numeros', 'valor1', 'valor2', 'Operacion'];

// Inicializar variables de sesión si no existen
foreach ($seccionVariables as $valor) {
    if (!isset($_SESSION[$valor])) {
        $_SESSION[$valor] = '';
    }
}

// Lógica de la calculadora
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["numero"])) {
        $numero = $_POST["numero"];
        $_SESSION['Numeros'] .= $numero;
        if (substr($_SESSION['Numeros'], 0, 1) == $_SESSION['Operacion']) {
            $_SESSION['Numeros'] = substr($_SESSION['Numeros'], 1);
        }
    }
    
    if (isset($_POST["operacion"])) {
        $_SESSION['valor1'] = $_SESSION['Numeros'];
        $_SESSION['Operacion'] = $_POST["operacion"];
        $_SESSION['Numeros'] = $_SESSION['Operacion'];
    }
    
    if (isset($_POST["Resultado"])) {
        $_SESSION['valor2'] = $_SESSION['Numeros'];
        $_SESSION['Numeros'] = '';
        $num1 = $_SESSION['valor1'];
        $num2 = $_SESSION['valor2'];
        $operacion = $_SESSION['Operacion'];
        $_SESSION['Numeros'] = match($operacion) {
            "+" => strval($num1 + $num2),
            "-" => strval($num1 - $num2),
            "*" => strval($num1 * $num2),
            "/" => strval($num2 == "0" ? $num1 : $num1 / $num2),
            "%" => strval(sqrt($num2 == "0" ? $num1 : $num1 % $num2)),
            default => $num1,
        };
    }
    
    if (isset($_POST["N/P"])) {
        if (substr($_SESSION['Numeros'], 0, 1) !== '-') {
            $_SESSION['Numeros'] = '-' . $_SESSION['Numeros'];
        } else {
            $_SESSION['Numeros'] = substr($_SESSION['Numeros'], 1);
        }
    }
}

// Borrar todas las variables de sesión
if (isset($_POST["borrar"])) {
    foreach ($seccionVariables as $valor) {
        $_SESSION[$valor] = '';
    }
}

// Borrar el último carácter de la variable 'Numeros'
if (isset($_POST["borrarUno"])) {
    $_SESSION['Numeros'] = substr($_SESSION['Numeros'], 0, -1);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Calculadora</title>
</head>
<body>
    <div class="contenedor">
        <div class="container">
            <svg viewBox="0 0 960 300">
                <symbol id="s-text">
                    <text text-anchor="middle" x="50%" y="80%">Calculadora</text>
                </symbol>
        
                <g class="g-ants">
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                </g>
            </svg>
        </div>
        <div class="container container-form">
        <form action="api.php" method="POST" id="calculator">
            <input type="text" class="pantalla" name="inputNumerico" value="<?php echo isset($_SESSION['Numeros']) ? $_SESSION['Numeros'] : '0'; ?>" readonly>
            <br>
            <table>
                <tr>
                    <td><button class="botonCal" type="submit" name="operacion" value="%">  % </button></td>
                    <td><button class="botonCal" type="submit" name="borrar" value="C">  C </button></td>
                    <td><button class="botonCal" type="submit" name="borrarUno" value="borrarUno">  <- </button></td>
                    <td><button class="botonCal" type="submit" name="operacion" value="/"> / </button></td>
                </tr>
                <tr>
                    <td><button class="botonCal" type="submit" name="numero" value="7"> 7 </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="8"> 8 </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="9"> 9 </button></td>
                    <td><button class="botonCal" type="submit" name="operacion" value="*"> X </button></td>
                </tr>
                <tr>
                    <td><button class="botonCal" type="submit" name="numero" value="4"> 4 </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="5"> 5 </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="6"> 6 </button></td>
                    <td><button class="botonCal" type="submit" name="operacion" value="-"> - </button></td>
                </tr>
                <tr>
                    <td><button class="botonCal" type="submit" name="numero" value="1"> 1 </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="2"> 2 </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="3"> 3 </button></td>
                    <td><button class="botonCal" type="submit" name="operacion" value="+"> + </button></td>
                </tr>
                <tr>
                    <td><button class="botonCal" type="submit" name="N/P" value="-/+">  -/+ </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="0"> 0 </button></td>
                    <td><button class="botonCal" type="submit" name="numero" value="."> . </button></td>
                    <td><button class="botonCal" type="submit" name="Resultado" value="="> = </button></td>
                </tr>
            </table>
        </form>
        </div>
    </div>    
</body>
</html>
