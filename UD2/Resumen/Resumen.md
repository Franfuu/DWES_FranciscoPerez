# Resumen de PHP

**Alumno:** Francisco Pérez Ruiz
**Asignatura:** Desarrollo Web en Entorno Servidor (DWES)

---

## Para qué sirve este resumen

Esto es una recopilación de lo más importante que he ido aprendiendo en PHP durante el curso. Lo uso como chuleta para repasar antes de un examen o para resolver dudas rápidas mientras programo. No pretende ser completo, solo tener a mano lo que más se me olvida.

Los archivos están organizados por temas:

| Archivo                  | Tema                                              |
| ------------------------ | ------------------------------------------------- |
| `1_FuncionEcho.php`      | Imprimir cosas con `echo` y `print`               |
| `2_TiposDatos.php`       | Tipos, clases y ámbito de variables               |
| `3_Imprimir.php`         | Imprimir variables con formato (`printf`)         |
| `4_Datos_Funciones.php`  | `isset` / `unset` / `is_null`, constantes y fechas |
| `5_Control.php`          | Superglobales y estructuras de control            |
| `6_Funciones.php`        | Funciones y reutilización de código               |
| `7_Arrays.php`           | Arrays simples, asociativos y multidimensionales  |
| `8_Formularios.php`      | Formularios HTML y procesado en PHP               |

---

## 1. Imprimir cosas (`1_FuncionEcho.php`)

La forma más rápida de sacar texto por pantalla en PHP.

- `echo` y `print` hacen prácticamente lo mismo.
- Para los saltos de línea en HTML se usa `<br>`.
- Para convertir saltos de línea de un texto (`\n`) a `<br>` se usa `nl2br($texto)`.

```php
echo "Hola Mundo";
```

---

## 2. Tipos de datos (`2_TiposDatos.php`)

En PHP no hace falta declarar el tipo de una variable. La variable adopta el tipo del valor que se le asigne, y se puede cambiar en cualquier momento.

Tipos básicos: entero, flotante, cadena, booleano, array y `null`.

Además se pueden usar clases y objetos. Y hay tres tipos de ámbito: global, local y estático.

```php
$_edad = 25;            // entero
$_nombre = "Francisco"; // cadena
```

---

## 3. Imprimir con formato (`3_Imprimir.php`)

Cuando `echo` se queda corto, está `printf`, que permite meter variables dentro de un texto con marcadores (`%s`, `%d`, `%f`, etc.).

- `printf` imprime directamente.
- `sprintf` devuelve la cadena formateada para usarla cuando quieras.

```php
$_nombre = "Francisco";
print ("Hola " . $_nombre . "! <br>");
```

---

## 4. Comprobaciones, constantes y fechas (`4_Datos_Funciones.php`)

Funciones útiles para gestionar variables:

- `isset($var)` comprueba si una variable está definida y no es `null`.
- `unset($var)` borra una variable.
- `is_null($var)` comprueba si vale `null`.

Constantes:

- `const NOMBRE = "valor";` (en tiempo de compilación, no admite ifs).
- `define("NOMBRE", "valor");` (en tiempo de ejecución, sí se puede usar dentro de un `if`).

Fechas y horas con `date()`:

```php
if (isset($entero)) {
    echo "La variable \$entero está definida y no es null<br>";
} else {
    echo "La variable \$entero no está definida o es null<br>";
}
```

---

## 5. Superglobales y estructuras de control (`5_Control.php`)

Superglobales disponibles en cualquier parte del script:

`$_SERVER`, `$_GET`, `$_POST`, `$_REQUEST`, `$_COOKIE`, `$_SESSION`, `$_FILES`, `$_ENV` y `$GLOBALS`.

Estructuras de control:

- Condicionales: `if / elseif / else`, `switch`, `match`.
- Bucles: `while`, `do/while`, `for`, `foreach`.

```php
$colores = ["rojo", "verde", "azul"];
foreach ($colores as $color) {
    echo "<br>Color: $color";
}
```

---

## 6. Funciones (`6_Funciones.php`)

Las funciones permiten reutilizar bloques de código. Lo más importante:

- Funciones simples y funciones condicionales (definidas dentro de un `if`).
- Argumentos por valor, por defecto, por referencia (`&`) y variables (`...$args`).
- Para reutilizar código de otros archivos: `include`, `require`, `include_once` y `require_once`. La diferencia es que `require` da error fatal si el fichero no existe, y `*_once` evita incluirlo dos veces.

```php
function sumar($a, $b) {
    return $a + $b;
}

echo "2 + 3 = " . sumar(2, 3) . "<br>";
```

---

## 7. Arrays (`7_Arrays.php`)

La estructura de datos más usada en PHP. Hay tres tipos:

- Numéricos: `["rojo", "verde", "azul"]`.
- Asociativos: `["nombre" => "Francisco", "edad" => 21]`.
- Multidimensionales: arrays dentro de arrays.

Se recorren con `for` (si son numéricos) o con `foreach` (que vale para cualquier tipo).

Funciones que uso más:

`is_array()`, `count()`, `in_array()`, `array_search()`, `array_key_exists()`, `unset()` y `array_values()`.

```php
$array1 = array("foo" => "bar", "bar" => "foo");
```

---

## 8. Formularios (`8_Formularios.php`)

La forma estándar de recibir datos del usuario.

- En HTML: `<form method="post" action="...">`.
- En PHP los datos se recogen con `$_POST` o `$_GET` según el método.
- Los checkboxes se reciben como array si el `name` acaba en `[]` (por ejemplo `aficiones[]`).
- Siempre hay que validar: comprobar que hay datos, escapar con `htmlspecialchars`, mantener los valores si hay error.

```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        echo "<p style='color:red;'>El campo nombre está vacío.</p>";
    } else {
        echo "<p>Nombre: " . htmlspecialchars($_POST["nombre"]) . "</p>";
    }

    $aficiones = $_POST["aficiones"] ?? [];
    if (!empty($aficiones)) {
        echo "<p>Aficiones: " . implode(", ", $aficiones) . "</p>";
        if (in_array("deporte", $aficiones))
            echo "<p>Te gusta el deporte!</p>";
    } else {
        echo "<p>No has marcado ninguna afición.</p>";
    }
}
```

---

## Cómo probar los ejemplos

1. Copiar la carpeta dentro de `htdocs/` (XAMPP).
2. Arrancar Apache desde el panel de control de XAMPP.
3. Abrir el navegador y entrar a `http://localhost:8080/.../1_FuncionEcho.php` (cambiando el archivo).

Requisitos: servidor web con PHP (XAMPP, WAMP, MAMP, LAMP) y un navegador.

---

## Lo que cubre este resumen

- Sintaxis básica de PHP.
- Tipos de datos y ámbito de variables.
- Estructuras de control y bucles.
- Funciones y reutilización de código.
- Arrays en sus tres variantes.
- Formularios y validación de datos.

Más vale tener mi propia chuleta corta y a mano, que volver a leerme la documentación entera cada vez que se me olvide una cosa.
