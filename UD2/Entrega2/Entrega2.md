# Entrega 2

**Alumno:** Francisco Pérez Ruiz
**Asignatura:** Desarrollo Web en Entorno Servidor (DWES)

---

## Introducción

Esta segunda entrega ya da el salto a las estructuras de control y a los formularios, que es donde PHP empieza a tener sentido de verdad. En la primera entrega aprendimos a "imprimir cosas", pero aquí ya hay decisiones (`if`, `switch`, `match`), bucles, funciones reutilizables, arrays más serios y formularios que reciben datos del usuario.

Los programas van del 11 al 34, y se pueden agrupar más o menos así:

- Decisiones (11, 12, 13): `if/else`, `switch`, `match`.
- Bucles (14, 15): `for`, `while`, `do/while`, `foreach`.
- Funciones (16, 17, 18, 19): declaración, argumentos, referencias, `include`/`require`.
- Funciones útiles (20): cadenas, fechas, números y arrays.
- Arrays (21, 22, 23, 24): asociativos, bidimensionales, punteros internos y CRUD.
- Formularios (25, 26, 27, 28, 29): `$_POST`, `$_GET`, `$_REQUEST` y validación.
- Inputs (30, 31, 32, 33): login, radios, checkboxes y select.
- Validación de email (34).

---

## Programa 11

Sentencias condicionales `if`, `else` y `elseif`. Hay dos ejemplos en el archivo.

El primer ejemplo crea un usuario y una edad, y comprueba si es mayor o menor de edad:

![code_prog11_1](image/Entrega2/1762956186862.png)

El segundo ejemplo compara dos variables `a` y `b` con `if`, `else if` y `else`:

![code_prog11_2](image/Entrega2/1762928006321.png)

Salida:

![prog11](image/Entrega2/1762962212653.png)

---

## Programa 12

Sentencia `switch` con un caso muy básico: según el valor de `$dia`, imprime un día de la semana. El detalle importante es el `break`: si se te olvida, los casos siguientes también se ejecutan.

![code_prog12_1](image/Entrega2/1762940861467.png)

Salida:

![prog12](image/Entrega2/1762977964053.png)

---

## Programa 13

Expresión `match`, que es la versión moderna del `switch`. La diferencia es que `match` devuelve un valor que se puede asignar a una variable, es estricto en tipos (`===`) y no hace falta `break`.

Primer ejemplo, con un videojuego que se clasifica según su género:

![code_prog13_1](image/Entrega2/1762939931143.png)

Segundo ejemplo, con un usuario y un rol, donde el mensaje cambia según el rol:

![code_prog13_2](image/Entrega2/1762950091384.png)

Tercer ejemplo, donde el resultado del `match` se guarda en `$return_value`:

![code_prog13_3](image/Entrega2/1762930722152.png)

Salida:

![prog13](image/Entrega2/1762923776162.png)

---

## Programa 14

Los tres bucles principales: `for`, `while` y `do...while`. El truco para saber cuál usar:

- `for` cuando sabes cuántas veces vas a iterar.
- `while` cuando iteras mientras se cumpla una condición.
- `do...while` cuando quieres que se ejecute al menos una vez, aunque la condición sea falsa desde el principio.

Ejemplo con `for`:

![code_prog14_1](image/Entrega2/1762944547076.png)

Ejemplo con `while`:

![code_prog14_2](image/Entrega2/1762924954065.png)

Ejemplo con `do...while`:

![code_prog14_3](image/Entrega2/1762917394092.png)

Salida:

![prog14](image/Entrega2/1762965563435.png)

---

## Programa 15

`foreach` aplicado a varios casos. Lo bueno de `foreach` es que no tienes que llevar tú el índice, y si pones `as $clave => $valor` te da las dos cosas a la vez.

Recorrido simple y formato clave => valor:

![code_prog15_1](image/Entrega2/1762903514627.png)

Matriz bidimensional (un array de arrays asociativos con `nombre` y `genero`):

![code_prog15_2](image/Entrega2/1762971180596.png)

Último bloque, recorriendo `$_SERVER` con `foreach`:

![code_prog15_3](image/Entrega2/1762921187262.png)

Salida:

![prog15](image/Entrega2/1762965825145.png)

---

## Programa 16

Cómo declarar funciones. Hay dos casos en el archivo.

Función simple sin argumentos, que calcula el precio con IVA usando valores fijos:

![code_prog16_1](image/Entrega2/1762907182447.png)

Función condicional: solo se define si se cumple un `if`. Por dentro usa `global` para acceder a una variable externa:

![code_prog16_2](image/Entrega2/1762929682747.png)

Salida:

![prog16](image/Entrega2/1762976652286.png)

---

## Programa 17

Misma función `precioConIVA` pero ya con argumentos tipados (`float $precio`, `float $iva`). El tipado en PHP es opcional pero ayuda a leer el código y a evitar errores tontos.

![code_prog17_1](image/Entrega2/1762957400620.png)

Salida:

![prog17](image/Entrega2/1762927757310.png)

---

## Programa 18

Argumentos por referencia con `&`. La diferencia con el paso por valor es que aquí no se pasa una copia, sino la dirección de memoria, así que si la función cambia la variable, también cambia fuera.

![code_prog18_1](image/Entrega2/1762994466134.png)

Salida:

![prog18](image/Entrega2/1762917831451.png)

---

## Programa 19

`include`, `require`, `include_once` y `require_once`. Sirven para reutilizar código de otros archivos.

| Comando          | Si el fichero falla   | Se puede incluir varias veces |
| ---------------- | --------------------- | ----------------------------- |
| `include`      | Solo avisa, sigue.    | Sí.                          |
| `require`      | Fatal error, se para. | Sí.                          |
| `include_once` | Solo avisa.           | No, solo una vez.             |
| `require_once` | Fatal error.          | No, solo una vez.             |

Primero se declara `funciones.php`, que tiene `saludar`, `despedir`, `multiplicar` y `dividir`:

![code_prog19_funciones](image/Entrega2/1762984477365.png)

Programa 19A, que usa `include`:

![code_prog19_A](image/Entrega2/1762942943901.png)

Programa 19B, que usa `require`:

![code_prog19_B](image/Entrega2/1762971628061.png)

Programa 19C, que usa `include_once` dos veces (la segunda se ignora):

![code_prog19_C](image/Entrega2/1762986490897.png)

Resultados en el navegador:

![prog19A](image/Entrega2/1762948560509.png)

![prog19B](image/Entrega2/1762939928087.png)

![prog19C](image/Entrega2/1762941375276.png)

---

## Programa 20

Recopilación de funciones útiles de PHP que es importante conocer:

- `strlen()` para la longitud de una cadena.
- `strtoupper()` y `strtolower()` para mayúsculas y minúsculas.
- `substr()` para extraer parte de una cadena.
- `date()` para la fecha y hora.
- `number_format()` para formatear números con separadores.
- `rand()` para un número aleatorio en un rango.
- `array_sum()` para sumar valores de un array.
- `in_array()` para comprobar si un valor está en un array.
- `implode()` para convertir un array en una cadena.

Primer bloque (cadenas, fechas y números):

![code_prog20_1](image/Entrega2/1762979156422.png)

Segundo bloque (aleatorios y arrays):

![code_prog20_2](image/Entrega2/1762959859319.png)

Salida:

![prog20](image/Entrega2/1762989723992.png)

---

## Programa 21

Arrays asociativos. Se ve cómo se pueden declarar de dos formas, con `array(...)` y con `[...]`, y también cómo construir un array paso a paso (con índice explícito o sin él).

Definición de `$array1` y `$array2`:

![code_prog21_1](image/Entrega2/1762958370627.png)

Arrays paso a paso (`$modulos1` con índices, `$modulos2` sin índice):

![code_prog21_2](image/Entrega2/1762923024931.png)

Salida:

![prog21](image/Entrega2/1762943880238.png)

---

## Programa 22

Recorrer arrays. Aquí hay un array numérico (`$modulos1`) y uno asociativo bidimensional (`$ciclos`, con DAW y DAM dentro). Para el numérico se usa un `for`, y para el bidimensional un `foreach` anidado.

Array numérico con `for`:

![code_prog22_1](image/Entrega2/1762975580904.png)

Array asociativo bidimensional con `foreach` anidado:

![code_prog22_2](image/Entrega2/1762935876348.png)

Salida:

![prog22](image/Entrega2/1762959742994.png)

---

## Programa 23

Funciones para mover el puntero interno de un array: `reset()`, `next()`, `prev()`, `end()` y `key()`. Cada array tiene un cursor invisible, y estas funciones lo mueven.

Movimiento normal del puntero (al primero, siguiente, anterior y último):

![code_prog23_1](image/Entrega2/1762927593505.png)

Qué pasa cuando se llama a `next()` después del último elemento (la clave actual pasa a ser `null`):

![code_prog23_2](image/Entrega2/1762964229882.png)

Salida:

![prog23](image/Entrega2/1762930645097.png)

---

## Programa 24

Mini-CRUD sobre un array. El array es un concesionario de coches y hay que:

- Añadir un coche nuevo.
- Modificar uno existente.
- Eliminar otro con `unset()`.
- Reindexar si era un array numérico (con `array_values()`).
- Comprobar si una variable es array (`is_array()`), contar (`count()`), buscar valores (`in_array()`, `array_search()`) y claves (`array_key_exists()`).
- Mostrar el array final con `print_r()`.

Primer bloque (añadir, modificar, eliminar y reindexar):

![code_prog24_1](image/Entrega2/1762929812312.png)

Segundo bloque (búsquedas y claves):

![code_prog24_2](image/Entrega2/1762933905459.png)

Salida:

![prog24](image/Entrega2/1762940158562.png)

---

## Programa 25

Primer formulario con POST. El formulario tiene tres campos: nombre, email y mensaje. Cuando se envía, va a `accion.php` que comprueba que la petición sea POST y muestra los datos.

Detalles importantes que apunté:

- Hay que comprobar el método con `$_SERVER["REQUEST_METHOD"] === "POST"`.
- Conviene usar `htmlspecialchars()` para evitar que se inyecte HTML.
- Para los textos con saltos de línea, `nl2br()` los convierte en `<br>`.

Código del formulario `form.html`:

![code_prog25_form](image/Entrega2/code_1762956320301.png)

Código del procesador `accion.php`:

![code_prog25_accion](image/Entrega2/1762946118209.png)

Formulario en el navegador:

![prog25_form](image/Entrega2/1762956320301.png)

---

## Programa 26

Formulario con checkboxes. Lo nuevo es que si en el `name` del input se pone `name="modulos[]"`, PHP lo recibe como un array. En el procesador se recoge con `$_POST['modulos']` y se recorre con `foreach`.

Código del formulario:

![code_prog26_form](image/Entrega2/code_1762928640318.png)

Código del procesador con `$_POST`:

![code_prog26_procesa](image/Entrega2/1762938194394.png)

Formulario en el navegador:

![prog26_form](image/Entrega2/1762928640318.png)

---

## Programa 27

Demuestra qué hace `$_REQUEST`. Esta superglobal recoge datos de GET, POST y COOKIE a la vez. Es cómoda pero no se recomienda usarla en producción porque mezcla orígenes y es peor para la seguridad. Lo correcto es usar `$_GET` o `$_POST` según el método del formulario.

Aquí el formulario manda los datos por GET, pero el procesador usa `$_POST` para el nombre (a propósito da error) y `$_REQUEST` para los módulos (sí funciona).

Código del formulario con `method="GET"`:

![code_prog27_form](image/Entrega2/1762922911223.png)

Código del procesador, mezclando `$_POST` y `$_REQUEST`:

![code_prog27_procesa](image/Entrega2/1762977365989.png)

Formulario en el navegador:

![prog27_form](image/Entrega2/1762920920955.png)

---

## Programa 28

Cómo mantener los valores del formulario después de enviarlo. Aquí se usan varios trucos:

- `empty()` para comprobar si un campo está vacío.
- `value="<?= ... ?>"` para meter en el `value` del input el dato que ya envió el usuario.
- `checked` en los checkboxes según si el valor está dentro del array enviado (`in_array(...)`).

Procesado POST y comprobación de aficiones:

![code_prog28_1](image/Entrega2/1762992237457.png)

Formulario que recuerda los valores enviados:

![code_prog28_2](image/Entrega2/1762931497710.png)

Salida:

![prog28](image/Entrega2/1762957614013.png)

---

## Programa 29

Formulario más completo, con varias comprobaciones a la vez. Comprueba que el nombre no esté vacío, que se haya marcado al menos un módulo, y si no es así muestra el error en rojo. Además, mantiene los valores ya escritos para que el usuario no tenga que volver a teclear.

![code_prog29_1](image/Entrega2/1762932043065.png)

Salida:

![prog29](image/Entrega2/1762959581918.png)

---

## Programa 30

Formulario de login con usuario y contraseña. Es solo educativo: nunca se debe almacenar ni mostrar una contraseña en claro. En la vida real se usa `password_hash` y `password_verify`, pero eso lo veremos más adelante.

![code_prog30_1](image/Entrega2/1762927041128.png)

Salida:

![prog30](image/Entrega2/1762992640811.png)

---

## Programa 31

Formulario con radio buttons para elegir un turno (mañana, tarde o noche). Como son `radio`, solo se puede seleccionar uno. Después de enviar, el `checked` se mantiene en el que se haya elegido.

![code_prog31_1](image/Entrega2/1762904459186.png)

Salida:

![prog31](image/Entrega2/1762975462321.png)

---

## Programa 32

Formulario con checkboxes para elegir aficiones (música, deporte, lectura, cine, viajes). Aquí sí se pueden marcar varias, y PHP las recibe como un array porque el `name` es `aficiones[]`.

![code_prog32_1](image/Entrega2/1762953311965.png)

Salida:

![prog32](image/Entrega2/1762984047340.png)

---

## Programa 33

Formulario con un `select` para elegir un país de una lista (España, Francia, Italia, Alemania, Portugal). Las opciones se imprimen con un `foreach` y se mantiene el `selected` en la opción que ya se haya elegido.

![code_prog33_1](image/Entrega2/1762921070876.png)

Salida:

![prog33](image/Entrega2/1762992418302.png)

---

## Programa 34

Validación de email con `filter_var($email, FILTER_VALIDATE_EMAIL)`. Comprueba dos cosas: que el campo no esté vacío y que el formato sea correcto. Si falla, mete los errores en un array `$errores` y los pinta en rojo. Si todo está bien, muestra un mensaje de confirmación.

Lógica de validación:

![code_prog34_1](image/Entrega2/1762988205785.png)

Formulario con los mensajes de error y confirmación:

![code_prog34_2](image/Entrega2/1762942124498.png)

Salida:

![prog34](image/Entrega2/1762949876276.png)

---

## Conclusiones de la entrega

Lo que me llevo de esta segunda parte:

- `match` me parece mucho más limpio que `switch`, lo voy a usar siempre que pueda.
- `foreach` es probablemente el bucle que más voy a usar.
- Separar las funciones en un `funciones.php` y reutilizarlas con `require_once` es una costumbre que conviene coger pronto.
- Los formularios siempre se validan, sin excepciones. No se puede confiar en lo que envía el usuario.
- `$_REQUEST` no se debe usar a la ligera; mejor `$_GET` o `$_POST` según el caso.
- Para autenticación, nunca contraseñas en claro.

La parte de formularios es la que más se va a usar en proyectos reales, así que es importante tenerla bien clara antes de seguir.
