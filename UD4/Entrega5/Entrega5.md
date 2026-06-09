# UD4 - Acceso a datos con PHP

**Alumno:** Francisco Pérez Ruiz
**Asignatura:** Desarrollo Web en Entorno Servidor (DWES)

---

## Introducción

En esta unidad damos el paso de "hacer cosas con PHP" a "hacer cosas con PHP **conectado a una base de datos**". Es uno de los apartados más prácticos, porque casi cualquier aplicación web real necesita guardar y leer datos en algún sitio.

Durante la unidad se ven dos formas de conectarse a MySQL desde PHP:

- **MySQLi**: la extensión "clásica", específica de MySQL. Tiene una API procedural y otra orientada a objetos.
- **PDO** (PHP Data Objects): una capa de abstracción que sirve para muchas bases de datos (MySQL, SQLite, PostgreSQL, etc.). Es la opción más moderna.

También se tocan temas alrededor: transacciones, prevención de **inyección SQL**, patrón **MVC**, **SQLite** como alternativa ligera y, al final, manejo de **ficheros** y generación de **PDFs** con FPDF.

---

## Un poco de historia de PHP

PHP nació en 1994 de la mano de Rasmus Lerdorf. Empezó como una herramienta personal para gestionar su página web, pero con el tiempo se convirtió en uno de los lenguajes más usados en el mundo del desarrollo web.

Algunos hitos importantes:

- **PHP 3 (1998):** se sentaron las bases del lenguaje moderno: analizador sintáctico nuevo, soporte para muchas bases de datos.
- **PHP 4 (2000):** apareció el motor Zend, que aumentó mucho la velocidad de ejecución.
- **PHP 5 (2004):** la POO en PHP se vuelve seria de verdad. Estuvo en el mercado más de 11 años.
- **PHP 7 (2015):** mejoras enormes de rendimiento (la versión 6 se saltó). De aquí se pasa a PHP 8.
- **PHP 8 (2020 en adelante):** JIT, tipos más estrictos, atributos.

---

## P1 - Primera conexión con MySQLi

El punto de partida: conectarse a una base de datos `dwes` en MySQL y leer una tabla `ud4_persona`.

Pasos clave:

1. Crear la base de datos `dwes` desde phpMyAdmin.
2. Crear la tabla `ud4_persona` con los campos `id`, `nombre`, `apellidos`, `telefono`.
3. Desde PHP, usar `mysqli_connect("localhost", "root", "", "dwes")` para conectarse.
4. Lanzar una `SELECT` con `mysqli_query()` y recorrer el resultado con `foreach`.

**Código de la conexión + consulta:**

![code_p1_conexion](image/Entrega5/1762942124032.png)

---

## P2 - CRUD completo con MySQLi y transacciones

Este apartado da un salto en complejidad. Ya no es solo "leer datos", sino hacer **CRUD completo** (Create, Read, Update, Delete) con buenas prácticas: **prepared statements** (para evitar inyección SQL) y **transacciones** (para garantizar que las operaciones críticas se hagan en bloque o se reviertan).

### Conexión centralizada

En vez de copiar la conexión en cada archivo, se centraliza en una función `db()` que devuelve siempre la misma conexión.

![code_p2_conexion](image/Entrega5/1762930163989.png)

### Insertar con transacción

`mysqli_begin_transaction` + `mysqli_commit` (o `mysqli_rollback` si algo falla). Si una de las dos inserciones falla, **ninguna** se guarda.

![code_p2_insertar](image/Entrega5/1762969119118.png)

### Select con bloqueo `FOR UPDATE`

Lectura de una fila con bloqueo, para garantizar que nadie más la modifique entre que la leo y la actualizo.

![code_p2_select](image/Entrega5/1762921911976.png)

### Actualizar con validación

Update protegido: si no se afecta exactamente 1 fila, se lanza una excepción y se hace `rollback`.

![code_p2_actualizar](image/Entrega5/1762991997011.png)

### Borrar con validación

Misma idea para el `DELETE`. Si no se borra 1 fila, se cancela.

![code_p2_delete](image/Entrega5/1762914160522.png)

### Inyección SQL (mal ejemplo)

Aquí se ve por qué **nunca** se debe concatenar la entrada del usuario directamente en una consulta. Con `' OR '1'='1` se consigue que se muestren todos los empleados.

![code_p2_inyeccion](image/Entrega5/1762981364229.png)

La forma correcta es usar marcadores (`?` o `:nombre`) y `bind_param` / `bindValue`, como en los ejemplos anteriores.

---

## P3 - Conexión con PDO

PDO es la alternativa "moderna" a MySQLi. La gran ventaja: el mismo código sirve para MySQL, SQLite, PostgreSQL, etc., cambiando solo el DSN.

### Conexión centralizada con PDO

![code_p3_conexion](image/Entrega5/1762977521068.png)

Detalle importante: configuro `ERRMODE_EXCEPTION` para que cualquier error de SQL lance una excepción (mucho más fácil de manejar que comprobar códigos a mano), y `EMULATE_PREPARES => false` para usar prepares nativos del motor.

### Listado de canciones con CSS

Ejemplo práctico: conexión PDO + lectura completa de la tabla `ud4_musica` + presentación en HTML con la librería Pico.css.

Primera parte (conexión + consulta):

![code_p3_read_1](image/Entrega5/1762995275309.png)

Segunda parte (HTML con la tabla):

![code_p3_read_2](image/Entrega5/1762957299491.png)

---

## P5_Login - Login con patrón MVC

Aquí se introduce el **patrón Modelo-Vista-Controlador (MVC)** aplicado a un sistema de login. La idea es separar bien las responsabilidades:

- **Modelo** (`Persona.php`): lógica de negocio, acceso a datos.
- **Vista** (`Login.php`, `welcome.php`): solo HTML.
- **Controlador** (`PersonaController.php`): recibe la petición, llama al modelo y elige la vista.
- **Configuración** (`config/database.php`): conexión PDO encapsulada en una clase `Database`.

### Conexión `database.php`

![code_p5login_db](image/Entrega5/1762903889186.png)

### Modelo `Persona.php`

![code_p5login_model](image/Entrega5/1762957822248.png)

### Controlador `PersonaController.php`

![code_p5login_ctrl](image/Entrega5/1762941697645.png)

### Punto de entrada `index.php`

![code_p5login_index](image/Entrega5/1762993014681.png)

---

## P5_CRUD_MVC - CRUD completo de coches con MVC

Misma arquitectura MVC pero ahora con todas las operaciones CRUD aplicadas a una tabla `coches`. El controlador tiene los métodos típicos:

- `index()` → muestra todos los coches.
- `crear()` → inserta uno nuevo.
- `editar()` → modifica uno existente.
- `eliminar()` → borra uno.

### Modelo `Coche.php`

![code_p5crud_model](image/Entrega5/1762919715637.png)

### Controlador `CocheController.php`

![code_p5crud_ctrl](image/Entrega5/1762959522668.png)

### Punto de entrada `index.php`

![code_p5crud_index](image/Entrega5/1762925241155.png)

---

## P6 - CRUD con SQLite

En este apartado se cambia el motor: en vez de MySQL/MariaDB se usa **SQLite**. SQLite no necesita un servidor: la base de datos es **un archivo dentro del propio proyecto**.

Esto es muy práctico para proyectos pequeños o pruebas, porque no hay que tener nada arrancado (ni el puerto 3306 de MySQL).

### `config.php` (crea la BD y la tabla si no existen, e inserta jugadores de prueba)

![code_p6_config](image/Entrega5/1762902934294.png)

### Modelo `Jugador.php`

![code_p6_model](image/Entrega5/1762940251001.png)

### Controlador `JugadorController.php`

![code_p6_ctrl](image/Entrega5/1762961557703.png)

Capturas del proyecto en funcionamiento:

![p6_screenshot1](image/Entrega5/1762983064122.png)

![p6_screenshot2](image/Entrega5/1762902992952.png)

![p6_screenshot3](image/Entrega5/1762980363493.png)

---

## P7 - Manejo de ficheros

Aquí se trabaja con archivos directamente desde PHP: lectura, escritura, CSV y PDF.

### Ejemplo 1 - Crear/escribir y leer un archivo de texto

Crea (o sobrescribe) `notas.txt`, escribe dos líneas y luego lee el archivo línea a línea.

![code_p7_ej1](image/Entrega5/1762915062053.png)

### Ejemplo 2 - Leer un archivo completo

Lee el contenido entero con `file_get_contents` y también lo divide en un array con `file()`.

![code_p7_ej2](image/Entrega5/1762917181683.png)

### Ejemplo 3 - Añadir al final (modo `'a'`)

Modo "append": añade contenido al final del archivo sin borrar lo anterior.

![code_p7_ej3](image/Entrega5/1762911820884.png)

### Ejemplo 4 - Generar y descargar un CSV

Crea un archivo CSV con `fputcsv` y manda cabeceras para que el navegador lo descargue.

![code_p7_ej4](image/Entrega5/1762967102371.png)

### Ejemplo 5 - PDF con FPDF

Primer PDF con la librería **FPDF**: añadir página, fuente y un par de líneas de texto.

![code_p7_ej5](image/Entrega5/1762957515606.png)

### Ejemplo 6 - Convertir `notas.txt` a PDF

Lee el archivo de texto línea a línea y vuelca cada línea en un PDF.

![code_p7_ej6](image/Entrega5/1762915738537.png)

Capturas del manejo de ficheros en navegador:

![p7_screenshot1](image/Entrega5/1762940531794.png)

![p7_screenshot2](image/Entrega5/1762935931730.png)

![p7_screenshot3](image/Entrega5/1762938646823.png)

![p7_screenshot4](image/Entrega5/1762959500723.png)

![p7_screenshot5](image/Entrega5/1762925779733.png)

![p7_screenshot6](image/Entrega5/1762990319235.png)

---

## P8 - MySQLi + PDF

El apartado final junta dos cosas que ya se han visto por separado: **MySQLi** para leer datos + **FPDF** para generar el documento.

El script se conecta a `dwes`, lee la tabla `ud4_coches` (id, marca, modelo, año) y genera un PDF con esos datos en formato de tabla.

![code_p8](image/Entrega5/1762910638001.png)

Captura del PDF generado:

![p8_screenshot](image/Entrega5/1762956428955.png)

---

## Conclusiones

- **MySQLi** y **PDO** son dos formas válidas de hablar con MySQL. PDO es más portable y suele ser la opción recomendada hoy en día.
- Las **transacciones** son fundamentales cuando varias operaciones tienen que ir "todo o nada". Si una falla, se hace `rollback` y la base de datos queda como estaba.
- La **inyección SQL** se evita SIEMPRE con prepared statements. Concatenar entrada del usuario en SQL es uno de los errores más graves que se pueden cometer.
- El **patrón MVC** ordena el código en proyectos medianos/grandes. Separa lógica, presentación y datos.
- **SQLite** es perfecto para proyectos pequeños: BD en un archivo, sin servidor.
- **FPDF** es la forma más clásica de generar PDFs en PHP. Para informes a partir de la BD, es lo más rápido.

Esta es la unidad donde por fin se siente que PHP es "un lenguaje serio para hacer aplicaciones reales", porque ya hay base de datos, capas separadas y exportación a formatos profesionales.
