# P6_CRUD_SQLite Jugadores (PHP + SQLite)

Estructura mínima en PHP con PDO SQLite. **Campos: usuario, nombre, apellidos.**

El CRUD funciona como una pequeña aplicación web estructurada en tres capas: **modelo** , **controlador** y **vista** .

Cada parte tiene una responsabilidad clara y se comunican mediante el flujo de peticiones que llega desde el navegador.

---

### 1. Inicio y enrutamiento (index.php)

El archivo `index.php` actúa como punto de entrada.

Cuando el navegador solicita la página, por ejemplo

```
http://localhost/crud-jugadores/index.php?action=index
```

este archivo recibe el parámetro `action` y decide qué método del controlador debe ejecutar.

Si no llega ningún parámetro, carga la acción `index` por defecto, que muestra la lista de jugadores.

El `index.php` crea una instancia del **controlador** (`JugadorController`) y le pasa la conexión a la base de datos (`$pdo`).

Después, mediante un bloque `switch`, decide qué método del controlador llamar según el valor de `action`.

* `action=index` → muestra el listado
* `action=crear` → muestra el formulario de alta
* `action=store` → guarda un nuevo jugador (por POST)
* `action=editar&id=3` → muestra el formulario para editar el jugador con id 3
* `action=update&id=3` → actualiza el jugador
* `action=eliminar&id=3` → borra el jugador

Por tanto, el `index.php` solo **dirige el tráfico** a la parte correcta.

---

### 2. Controlador (JugadorController.php)

El controlador coordina la lógica entre los datos y las vistas.

* En `index()` pide al modelo todos los jugadores (`$this->model->all()`) y carga la vista `views/jugadores/index.php` pasando esa lista.
* En `crear()` muestra un formulario vacío.
* En `store()` recibe los datos enviados por POST desde ese formulario y llama al modelo para guardarlos.

Si la inserción es correcta, redirige de nuevo a `?action=index`; si hay errores, vuelve a cargar la vista del formulario con los mensajes correspondientes. * En `editar($id)` obtiene un jugador por su id y muestra el formulario rellenado. * En `update($id)` recibe los nuevos datos por POST y actualiza el registro.

Luego redirige otra vez al listado. * En `eliminar($id)` borra el registro y vuelve al listado.

El controlador no genera HTML: simplemente llama a las vistas correspondientes con los datos preparados.

---

### 3. Modelo (Jugador.php)

El modelo gestiona el acceso a la base de datos SQLite a través de PDO.

* `all()` obtiene todos los registros.
* `find($id)` busca uno por id.
* `create($data)` inserta un jugador nuevo.
* `update($id, $data)` modifica los datos de un jugador existente.
* `delete($id)` elimina un jugador.
* `validate($data)` comprueba que no falten campos y devuelve errores si los hay.

El controlador invoca estos métodos para leer o modificar datos y después pasa los resultados a las vistas.

---

### 4. Vistas (carpeta views/jugadores)

Las vistas contienen el HTML que ve el usuario. No acceden a la base de datos directamente, solo muestran los datos que el controlador les entrega.

* `index.php` muestra la tabla con todos los jugadores y botones para crear, editar o eliminar.

Los enlaces cambian el parámetro `action` para indicar la siguiente operación. * `crear.php` y `editar.php` muestran un formulario (`_form.php`) con los campos usuario, nombre y apellidos.

El formulario envía los datos mediante `POST` a otra acción (`store` o `update`) que el controlador intercepta. * `_form.php` se reutiliza en ambas vistas y muestra los errores de validación si los hay.

---

### 5. Flujo completo de una operación

**Ejemplo: crear un jugador**

1. El usuario hace clic en “Nuevo jugador” → navegador solicita `?action=crear`.
2. `index.php` detecta `action=crear` y llama a `$controller->crear()`.
3. El controlador carga la vista `crear.php` con un formulario vacío.
4. El usuario rellena el formulario y pulsa “Crear”.

El formulario envía los datos por `POST` a `?action=store`. 5. `index.php` detecta `action=store` y llama a `$controller->store()`. 6. El controlador llama al modelo para guardar los datos en SQLite.

Si se guardan bien, hace una redirección a `?action=index`. 7. Al volver al listado, el nuevo jugador aparece en la tabla.

**Editar y eliminar** siguen el mismo patrón, cambiando únicamente la acción y el método del controlador.

---

### 6. Conclusión

* El **index.php** es el punto central que decide qué hacer según la acción.
* El **controlador** coordina las peticiones y llama al modelo y las vistas.
* El **modelo** maneja la base de datos.
* Las **vistas** muestran los datos al usuario.

Cada clic o envío de formulario cambia el valor de `action`, y eso es lo que hace que la aplicación vaya pasando de una parte a otra.
