# Clothing Store

v1. Versión sólo con el CRUD

![1768382081860](image/README/1768382081860.png)

## Clonar un Proyecto Laravel de un repositorio de Github![1768382081860](image/README/1768382081860.png)

```
git clone https://github.com/pamariniesfranciscodelosrios/clothingstore.git
```

**2º Instalar dependencias**

```
composer install
```

Instala la carpeta VENDOR

**3º copiar y pegar** .env.example  para convertirlo en **.env**

![1768382202700](image/README/1768382202700.png)

Esto es solo porque usamos SQLite si no, habría que configurar con nuestro Mysql

**4º Generar la clave** para mi proyecto

![1768382297240](image/README/1768382297240.png)

```
php artisan key:generate
```


**5º Migrar y crear el archivo de base de datos**

```
php artisan migrate
```

![1768382407970](image/README/1768382407970.png)

```


php artisan serve
```
