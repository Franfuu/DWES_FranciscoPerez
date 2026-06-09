# DWES - Desarrollo Web en Entorno Servidor

**Alumno:** Francisco Pérez Ruiz
**Ciclo:** Desarrollo de Aplicaciones Web (DAW)
**Curso:** 2025/2026

---

## Introducción

Este repositorio contiene todos los ejercicios, prácticas y proyectos que he ido haciendo durante el curso de **Desarrollo Web en Entorno Servidor (DWES)**. Cada unidad tiene su propia carpeta con el código, las capturas y un README donde explico lo aprendido y los pasos seguidos.

La idea es que sirva como mi propio cuaderno de la asignatura: el código de cada práctica acompañado de la explicación del por qué, las dudas que me iban saliendo y las conclusiones de cada apartado.

---

## Índice de unidades

| Unidad | Carpeta | Tema principal                                                       |
| ------ | ------- | -------------------------------------------------------------------- |
| UD1    | `UD1/`  | Mi primer programa en PHP (Hola Mundo + entorno con XAMPP)           |
| UD2    | `UD2/`  | Funciones, formularios y fundamentos del lenguaje                    |
| UD3    | `UD3/`  | Programación Orientada a Objetos en PHP                              |
| UD4    | `UD4/`  | Acceso a datos: MySQLi, PDO, MVC, SQLite, ficheros y PDFs            |
| UD5    | `UD5/`  | Servicios web: HTTP, cabeceras, JSON, sesiones, cookies, autenticación |
| UD6    | `UD6/`  | Laravel: rutas, controladores, Blade, migraciones, CRUD, relaciones  |
| UD7    | `UD7/`  | APIs REST con Laravel, middlewares, Sanctum y testing                |

---

## Resumen de cada unidad

### UD1 - Inicio

Primer contacto con PHP: montar el entorno con **XAMPP**, escribir un `echo "Hola, Mundo!"` y verlo en el navegador. Sirve para comprobar que todo está bien configurado antes de empezar.

### UD2 - Funciones y formularios

Toda la base del lenguaje: sintaxis, variables, tipos, arrays, funciones, estructuras de control (`if`, `switch`, `match`, bucles), constantes, fechas, **superglobales** y los primeros **formularios** con `$_POST`, `$_GET` y validación.

### UD3 - Programación Orientada a Objetos

POO en PHP: clases, objetos, constructores y destructores, encapsulamiento, herencia, polimorfismo, **clases abstractas**, **interfaces**, `final`, **traits**, **namespaces**, **autoload** y estructuras de la **SPL** (pilas y colas).

### UD4 - Acceso a datos

Conexión a bases de datos desde PHP usando **MySQLi** y **PDO**. Operaciones CRUD con transacciones, prevención de **inyección SQL**, patrón **MVC**, **SQLite** como alternativa ligera y, al final, manejo de **ficheros** y generación de **PDFs** con FPDF.

### UD5 - Herramientas web

El salto a entender HTTP de verdad: **cabeceras**, **JSON**, **redirecciones**, **sesiones**, **cookies** y un sistema completo de **autenticación** con SQLite que va creciendo en cinco mini-proyectos hasta llegar a una arquitectura **MVC** con login.

### UD6 - Laravel

Primer contacto serio con el framework **Laravel**: rutas, controladores, plantillas **Blade**, migraciones, modelos, seeders y un CRUD completo. Termina con relaciones entre modelos (1-N, N-M).

### UD7 - APIs REST con Laravel

Construcción de APIs REST modernas en Laravel: `apiResource`, **Resources** para JSON, **middlewares** personalizados, autenticación por tokens con **Sanctum**, un CRUD completo protegido con autenticación y **testing** automatizado con PHPUnit.

---

## Entorno usado

- **XAMPP** con Apache + MariaDB (puerto **8080** en mi caso).
- **PHP 8.x**.
- **Composer** + **Laravel** (para UD6 y UD7).
- **SQLite** para los proyectos más pequeños.
- **VS Code** con extensiones: Live Server, AutoSave, Prettier, PHP Intelephense.
- **Thunder Client** para probar las APIs sin salir del editor.

---

## Cómo navegar el repositorio

Cada unidad tiene su README dentro de su carpeta. Lo mejor es empezar por el README correspondiente para entender qué contiene cada subcarpeta y qué se ve en cada apartado:

- [UD1 - Mi primer programa](./UD1/mi_primer_programa/README.md)
- [UD2 - Entrega 1](./UD2/Entrega1/Entrega1.md) · [Entrega 2](./UD2/Entrega2/Entrega2.md) · [Resumen](./UD2/Resumen/Resumen.md)
- [UD3 - POO](./UD3/Entrega3.md)
- [UD4 - Acceso a datos](./UD4/Entrega5/Entrega5.md)
- [UD5 - Herramientas web](./UD5/Entrega6.md)
- [UD6 - Laravel](./UD6/Entrega7/Entrega7.md)
- [UD7 - APIs REST](./UD7/README.md)

---

## Conclusión

Cuando empecé el curso me sonaba PHP como "ese lenguaje antiguo que se usa para webs", y ahora salgo con una idea bastante completa de cómo se construye una aplicación web moderna del lado del servidor: desde el `echo` más básico hasta una API REST con autenticación por tokens, todo pasando por la POO, las bases de datos, el patrón MVC y un framework como Laravel.

Este repositorio es el resumen de ese camino.
