# UD5 - Desarrollo de servicios web

**Alumno:** Francisco Pérez Ruiz
**Asignatura:** Desarrollo Web en Entorno Servidor (DWES)

---

## Introducción

En esta unidad damos un salto importante: pasamos de "hacer cosas con PHP" a empezar a entender **cómo se comunica realmente un navegador con un servidor**. Para eso aparecen el protocolo HTTP, las cabeceras, el JSON, las sesiones, las cookies y, ya al final, un sistema de autenticación de usuarios con SQLite y un CRUD completo en arquitectura MVC.

### ¿Qué es HTTP?

El **Protocolo de Transferencia de Hipertexto (HTTP)** es la base de la World Wide Web. Su función es permitir el intercambio de información entre un cliente (por ejemplo, el navegador) y un servidor.

Cuando entro a una página web pasa lo siguiente:

1. El cliente envía una **solicitud** al servidor pidiendo un recurso.
2. El servidor procesa la petición y devuelve una **respuesta** con un código de estado (`200 OK`, `404 Not Found`, `500`...) y el contenido pedido.

HTTP es un protocolo "sin estado": cada petición es independiente, el servidor no recuerda nada de las anteriores. Para sortear esa limitación existen las **sesiones** y las **cookies**, que se ven en esta unidad.

Una solicitud HTTP contiene, a grandes rasgos:

1. La versión del protocolo.
2. La URL del recurso.
3. El método HTTP (`GET`, `POST`, `PUT`, `DELETE`...).
4. Las cabeceras (`headers`).
5. Un cuerpo opcional con datos.

---

## P1 - Subida de archivos

Primer ejercicio: un formulario HTML que permite subir un archivo, y un script PHP que lo recibe, lo guarda en la carpeta `uploads/` y comprueba el tamaño máximo permitido. Si el archivo pesa más de 2MB lo rechaza.

**Formulario `subir.html`:**

![code_p1_form](image/Entrega6/1762986909248.png)

**Procesador `subir.php` (validación y carpeta):**

![code_p1_subir_1](image/Entrega6/1762918202283.png)

**Procesador `subir.php` (mover archivo y comprobar tamaño):**

![code_p1_subir_2](image/Entrega6/1762978154956.png)

Formulario en el navegador:

![out_p1_form](image/Entrega6/1762980627366.png)

Al subir un fichero se crea automáticamente la carpeta `uploads/` si no existe, y se valida que no supere los 2MB.

---

## P2 - Cabeceras HTTP

Las **cabeceras** (`headers`) son los metadatos que viajan junto con la petición o la respuesta HTTP. Sirven para indicar tipo de contenido, política de caché, redirecciones, errores, etc.

### Ejemplo 1 - Cabecera JSON

`header('Content-Type: application/json')` indica al navegador que la respuesta es JSON. Después convierto un array PHP a JSON con `json_encode()`.

![code_p2_ej1](image/Entrega6/1762918643289.png)

![out_p2_ej1](image/Entrega6/1762987357784.png)

### Ejemplo 2 - Devolver un error 404

Sirve para devolver explícitamente una respuesta `404 No encontrado` desde PHP, sin que la página realmente exista.

![code_p2_ej2](image/Entrega6/1762991800726.png)

### Ejemplo 3 - Cabeceras combinadas y `headers_list()`

Aquí mando varias cabeceras (`Content-Type`, `Cache-Control`, `Pragma`) y después imprimo todas las cabeceras que se van a enviar con `headers_list()`.

![code_p2_ej3](image/Entrega6/1762915280071.png)

![out_p2_ej3](image/Entrega6/1762989935942.png)

### Ejemplo 4 - Caducidad con `Expires`

Práctica con la cabecera `Expires`, que indica cuándo caduca un recurso. Aquí pruebo con expiraciones distintas (3 horas, 1 año).

![code_p2_ej4](image/Entrega6/1762928656152.png)

![out_p2_ej4](image/Entrega6/1762991955921.png)

---

## P3 - Trabajar con JSON

JSON es el formato estándar para intercambiar datos entre cliente y servidor. Aquí lo veo en su forma más sencilla: un formulario HTML que envía datos por POST, y un PHP que los recibe, valida y devuelve la respuesta en JSON.

**Formulario `index.html`:**

![code_p3_form](image/Entrega6/1762922870068.png)

**Procesador `procesar.php`:**

![code_p3_procesar](image/Entrega6/1762930365493.png)

Formulario en el navegador:

![out_p3_form](image/Entrega6/1762990449528.png)

Cuando el formulario se envía, el servidor responde con un JSON tipo:

```json
{ "status": "success", "mensaje": "Datos recibidos correctamente.", "datos": { ... } }
```

---

## P4 - Redirecciones HTTP

Las redirecciones se hacen mandando una cabecera `Location` junto con un código de estado. Cada código tiene un significado:

| Código | Significado                                  |
| ------ | -------------------------------------------- |
| 301    | Redirección permanente                       |
| 302    | Redirección temporal                         |
| 303    | Redirección después de un POST               |
| 307    | Redirección temporal (HTTP/1.1)              |
| 308    | Redirección permanente (HTTP/1.1)            |

**Formulario para elegir el tipo de redirección:**

![code_p4_form](image/Entrega6/1762964096526.png)

**Procesador que lanza la redirección:**

![code_p4_redir](image/Entrega6/1762948778800.png)

Formulario en el navegador:

![out_p4_form](image/Entrega6/1762943756651.png)

---

## P5 - Sesiones

Como HTTP es sin estado, para "recordar" cosas entre peticiones se usan las **sesiones**. Una sesión es un array asociativo (`$_SESSION`) que se guarda en el servidor y se identifica con una cookie que envía el navegador.

Funciones que se usan:

- `session_start()` para iniciar o recuperar la sesión.
- `$_SESSION['clave'] = 'valor'` para guardar datos.
- `unset($_SESSION['clave'])` para borrar una variable concreta.
- `session_unset()` borra todas las variables.
- `session_destroy()` destruye la sesión entera.

### Ejemplo 1 - Iniciar sesión y guardar un usuario

![code_p5_ej1](image/Entrega6/1762999319445.png)

![out_p5_ej1](image/Entrega6/1762991941180.png)

### Ejemplo completo - Contador de visitas y fechas

Este programa mezcla varios casos: crear variables de sesión, eliminarlas, llevar un contador de visitas y guardar la fecha de cada visita.

Primera parte (crear, mostrar y eliminar variables):

![code_p5_index_1](image/Entrega6/1762954149368.png)

Segunda parte (contador de visitas, fechas, botón para destruir):

![code_p5_index_2](image/Entrega6/1762942306696.png)

Salida en el navegador:

![out_p5_index](image/Entrega6/1762964022992.png)

---

## P6 - Cookies

Las **cookies** son pequeños trozos de información que el servidor guarda en el navegador y que se envían en cada petición. A diferencia de las sesiones, viven en el cliente.

Para crear o modificar una cookie se usa `setcookie(nombre, valor, expiración, ruta)`. Para borrarla se pone una fecha de expiración en el pasado.

Aquí pruebo varios casos en un mismo archivo: guardar un puntaje, modificar un nivel, eliminar cookies, guardar volumen, idioma, y un foreach que borra todas las cookies almacenadas.

Primera parte (puntaje, nivel, eliminar):

![code_p6_1](image/Entrega6/1762964276300.png)

Segunda parte (volumen, idioma, borrar todas y tabla de cookies):

![code_p6_2](image/Entrega6/1762953013946.png)

Salida en el navegador:

![out_p6_ej1](image/Entrega6/1762956089731.png)

---

## P7 - Autenticación

Este apartado son **cinco mini-proyectos** que van subiendo de complejidad: desde un login pelado contra una base de datos SQLite hasta un CRUD completo con sesiones, autenticación y arquitectura MVC.

### 1. Login básico (texto plano)

Primera versión muy básica. Crea una tabla en SQLite con `(user, pass)`, inserta un usuario `admin/admin`, y un script `comprueba_login.php` que compara directamente lo que envía el usuario contra la base de datos.

**Crear la tabla y meter el usuario inicial:**

![code_p7_1_crear](image/Entrega6/1762932658531.png)

**Formulario `login.php`:**

![code_p7_1_login](image/Entrega6/1762989946337.png)

**Validador `comprueba_login.php`:**

![code_p7_1_comprueba](image/Entrega6/1762975257976.png)

Login en el navegador:

![out_p7_1_login](image/Entrega6/1762932412649.png)

> Nota: este ejemplo es solo educativo. **Nunca** se debe guardar la contraseña en claro en la base de datos. Esto se arregla en el siguiente apartado.

### 2. Login con hash

Aquí la contraseña ya no se guarda en texto plano. Al crear el usuario se usa `password_hash()`, y al hacer login se comprueba con `password_verify()`. Esa es la forma correcta de manejar contraseñas en PHP.

**Crear la BD y el usuario con contraseña hasheada:**

![code_p7_2_crear](image/Entrega6/1762906335032.png)

**Procesador de login con `password_verify`:**

![code_p7_2_procesar](image/Entrega6/1762914537555.png)

Página de login:

![out_p7_2_index](image/Entrega6/1762901103549.png)

### 3. Login + Productos

Tercer paso: una vez logueado, el usuario tiene acceso a una zona protegida. Aparece `funciones.php` con funciones de utilidad como `comprobarSesion()` para que las páginas protegidas redirijan al login si no hay sesión activa.

**`funciones.php`:**

![code_p7_3_funciones](image/Entrega6/1762971054533.png)

Página inicial del proyecto:

![out_p7_3_index](image/Entrega6/1762954448836.png)

### 4. CRUD paginado

Aquí ya hay un CRUD completo de productos: listar, añadir, editar y eliminar, con paginación. Todo va contra SQLite y solo accesible si hay sesión activa.

**`config.php` (conexión central a la BD):**

![code_p7_4_config](image/Entrega6/1762908816268.png)

Página inicial:

![out_p7_4_index](image/Entrega6/1762905904493.png)

### 5. CRUD paginado con arquitectura MVC

La versión final: el mismo CRUD pero reorganizado en **Modelo-Vista-Controlador**. Hay un `index.php` que actúa como front controller, controladores (`AuthController`, `ProductController`), modelos (`User`, `Product`) y vistas separadas (auth, layout, product).

**Front controller `index.php`:**

![code_p7_5_index](image/Entrega6/1762962894615.png)

**Modelo `User`:**

![code_p7_5_user](image/Entrega6/1762953998972.png)

**Modelo `Product`:**

![code_p7_5_product](image/Entrega6/1762962252321.png)

**Controlador `AuthController`:**

![code_p7_5_auth](image/Entrega6/1762956470626.png)

Login en el navegador:

![out_p7_5_login](image/Entrega6/1762928417915.png)

---

## Conclusiones

Lo que me llevo de esta unidad:

- HTTP es la base de toda la web, y entender qué viaja en una petición y en una respuesta es lo que me ha permitido empezar a "ver" lo que pasa entre el navegador y el servidor.
- Las **cabeceras** son la herramienta para casi todo: cambiar el tipo de contenido, devolver errores, redirigir, controlar la caché...
- **JSON** es el formato estándar para intercambiar datos. Cualquier API moderna devuelve JSON.
- Las **sesiones** y las **cookies** sirven para mantener estado, que es lo que HTTP por sí solo no hace.
- Para las **contraseñas** siempre `password_hash` + `password_verify`. Nunca en claro, nunca con MD5 o SHA1.
- El **MVC** ordena el código en proyectos grandes: el front controller decide qué hacer, los controladores procesan, los modelos hablan con la BD y las vistas se encargan de mostrar.

Esta unidad es donde por primera vez se monta algo que se parece a una aplicación web "de verdad", con varios usuarios, base de datos y sesiones. Es de las más útiles del curso.
