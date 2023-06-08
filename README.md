# Calculadora en PHP

Esta es una calculadora simple implementada en PHP. Permite realizar operaciones aritméticas básicas y algunas funciones adicionales.

## Características

- Realiza operaciones de suma, resta, multiplicación, división, porcentaje, potencia, raíz cuadrada y cambio de signo.
- Mantiene el estado de la calculadora utilizando sesiones de PHP.
- Interfaz de usuario intuitiva con botones para ingresar números y operaciones.
- Proporciona una pantalla de visualización para mostrar el resultado y la entrada actual.

## Requisitos

- Servidor web con soporte para PHP (por ejemplo, Apache).
- PHP instalado en el servidor.

## Código destacado

El código fuente de la calculadora se encuentra en el archivo `index.php`. Aquí hay algunos fragmentos de código destacados y su explicación:

### Inicialización de las variables de sesión

```php
session_start();

$seccionVariables = ['Numeros', 'valor1', 'valor2', 'Operacion'];

// Inicializar variables de sesión si no existen
foreach ($seccionVariables as $valor) {
    if (!isset($_SESSION[$valor])) {
        $_SESSION[$valor] = '';
    }
}
```

Este fragmento de código inicia la sesión de PHP y luego inicializa las variables de sesión utilizadas en la calculadora. El array `$seccionVariables` contiene los nombres de estas variables. Si alguna de las variables de sesión no existe, se inicializa con una cadena vacía.

### Lógica de la calculadora

```php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["numero"])) {
        // ... lógica para procesar los números ingresados ...
    }
    
    if (isset($_POST["operacion"])) {
        // ... lógica para procesar las operaciones seleccionadas ...
    }
    
    if (isset($_POST["Resultado"])) {
        // ... lógica para calcular el resultado ...
    }
    
    if (isset($_POST["N/P"])) {
        // ... lógica para cambiar el signo del número ...
    }
}
```

Este bloque de código maneja la lógica principal de la calculadora. Verifica si el método de solicitud es POST y realiza diferentes acciones según los valores enviados a través de `$_POST`. Esto incluye procesar los números ingresados, las operaciones seleccionadas, calcular el resultado y cambiar el signo del número. También hay una lógica adicional para borrar las variables de sesión cuando sea necesario.

###Uso

# Calculadora en PHP

Esta es una calculadora simple implementada en PHP. Permite realizar operaciones aritméticas básicas y algunas funciones adicionales.

## Uso

1. Asegúrate de que tu servidor web tenga soporte para PHP y que PHP esté instalado.

   - Verifica que tu servidor web (por ejemplo, Apache) esté configurado para admitir PHP.
   - Si PHP no está instalado, puedes instalarlo siguiendo las instrucciones de la documentación oficial de PHP.

2. Coloca los archivos de la calculadora en el directorio raíz del servidor web.

   - Copia todos los archivos de la calculadora en el directorio raíz de tu servidor web. Esto puede ser `/var/www/html` en Linux o `C:\xampp\htdocs` en Windows si utilizas XAMPP.

3. Accede a la calculadora a través de tu navegador web visitando la URL correspondiente.

   - Abre tu navegador web preferido (por ejemplo, Google Chrome, Mozilla Firefox).
   - Ingresa la URL correspondiente para acceder a la calculadora. Por ejemplo, si estás trabajando de forma local, la URL podría ser `http://localhost/calculadora`.

4. Utiliza los botones de la calculadora para ingresar números y realizar operaciones.

   - Utiliza los botones numéricos para ingresar los números deseados.
   - Selecciona las operaciones utilizando los botones correspondientes.
   - Puedes utilizar las funciones adicionales, como porcentaje, potencia, raíz cuadrada y cambio de signo.

5. Observa el resultado en la pantalla de visualización.

   - El resultado de las operaciones se mostrará en la pantalla de la calculadora.
