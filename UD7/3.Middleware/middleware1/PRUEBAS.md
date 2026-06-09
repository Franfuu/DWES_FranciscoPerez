# Guía de Pruebas - Middleware Admin

Este documento contiene ejemplos para probar el middleware usando diferentes herramientas.

---

## 1️⃣ Usando cURL (Terminal)

### ✅ Pruebas que pasan (200 OK)

#### Query String
```bash
curl "http://localhost:8000/api/admin/ping?user=admin"
```

#### Header
```bash
curl -H "X-User: admin" http://localhost:8000/api/admin/ping
```

#### Body JSON (POST)
```bash
curl -X POST http://localhost:8000/api/admin/ping \
  -H "Content-Type: application/json" \
  -d '{"user": "admin"}'
```

---

### ❌ Pruebas que bloquean (403 Forbidden)

#### Sin parámetro
```bash
curl http://localhost:8000/api/admin/ping
```

#### Usuario incorrecto
```bash
curl "http://localhost:8000/api/admin/ping?user=pepe"
```

#### Body con usuario incorrecto
```bash
curl -X POST http://localhost:8000/api/admin/ping \
  -H "Content-Type: application/json" \
  -d '{"user": "juan"}'
```

---

## 2️⃣ Usando Postman

### Configuración GET con Query String

1. **Método**: GET
2. **URL**: `http://localhost:8000/api/admin/ping`
3. **Params**:
   - Key: `user`
   - Value: `admin`

### Configuración GET con Header

1. **Método**: GET
2. **URL**: `http://localhost:8000/api/admin/ping`
3. **Headers**:
   - Key: `X-User`
   - Value: `admin`

### Configuración POST con Body JSON

1. **Método**: POST
2. **URL**: `http://localhost:8000/api/admin/ping`
3. **Headers**:
   - Key: `Content-Type`
   - Value: `application/json`
4. **Body** (raw, JSON):
```json
{
    "user": "admin"
}
```

---

## 3️⃣ Usando Thunder Client (VS Code)

### Nueva Request GET

```
GET http://localhost:8000/api/admin/ping?user=admin
```

### Con Header

```
GET http://localhost:8000/api/admin/ping

Headers:
X-User: admin
```

### POST con Body

```
POST http://localhost:8000/api/admin/ping
Content-Type: application/json

{
    "user": "admin"
}
```

---

## 4️⃣ Usando PHP (Navegador)

Crea un archivo `test.php` en la raíz del proyecto:

```php
<?php

// Test 1: Query String
echo "<h2>Test 1: Query String con admin</h2>";
$url1 = "http://localhost:8000/api/admin/ping?user=admin";
$response1 = file_get_contents($url1);
echo "<pre>$response1</pre>";

// Test 2: Sin usuario
echo "<h2>Test 2: Sin usuario (debe fallar)</h2>";
$url2 = "http://localhost:8000/api/admin/ping";
$response2 = @file_get_contents($url2);
echo "<pre>$response2</pre>";

// Test 3: POST con cURL
echo "<h2>Test 3: POST con Body JSON</h2>";
$ch = curl_init("http://localhost:8000/api/admin/ping");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['user' => 'admin']));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response3 = curl_exec($ch);
curl_close($ch);
echo "<pre>$response3</pre>";
```

Accede a: `http://localhost:8000/test.php`

---

## 5️⃣ Usando JavaScript (Fetch API)

```html
<!DOCTYPE html>
<html>
<head>
    <title>Test Middleware</title>
</head>
<body>
    <h1>Pruebas del Middleware</h1>
    <button onclick="testQueryString()">Test Query String</button>
    <button onclick="testHeader()">Test Header</button>
    <button onclick="testBody()">Test Body JSON</button>
    <button onclick="testFail()">Test Sin Usuario</button>
    
    <pre id="result"></pre>

    <script>
        const resultDiv = document.getElementById('result');

        async function testQueryString() {
            const response = await fetch('http://localhost:8000/api/admin/ping?user=admin');
            const data = await response.json();
            resultDiv.textContent = 'Query String:\n' + JSON.stringify(data, null, 2);
        }

        async function testHeader() {
            const response = await fetch('http://localhost:8000/api/admin/ping', {
                headers: {
                    'X-User': 'admin'
                }
            });
            const data = await response.json();
            resultDiv.textContent = 'Header:\n' + JSON.stringify(data, null, 2);
        }

        async function testBody() {
            const response = await fetch('http://localhost:8000/api/admin/ping', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ user: 'admin' })
            });
            const data = await response.json();
            resultDiv.textContent = 'Body JSON:\n' + JSON.stringify(data, null, 2);
        }

        async function testFail() {
            const response = await fetch('http://localhost:8000/api/admin/ping');
            const data = await response.json();
            resultDiv.textContent = 'Sin Usuario (403):\n' + JSON.stringify(data, null, 2);
        }
    </script>
</body>
</html>
```

---

## 📋 Checklist de Pruebas

- [ ] GET con query string `?user=admin` → 200 OK
- [ ] GET con header `X-User: admin` → 200 OK
- [ ] POST con body `{"user": "admin"}` → 200 OK
- [ ] GET sin parámetros → 403 Forbidden
- [ ] GET con `?user=pepe` → 403 Forbidden
- [ ] POST con `{"user": "juan"}` → 403 Forbidden

---

## 🔍 Respuestas Esperadas

### ✅ Éxito (200)
```json
{
    "ok": true,
    "message": "Bienvenido administrador",
    "status": "Acceso concedido",
    "timestamp": "2026-02-06 13:45:30"
}
```

### ❌ Error (403)
```json
{
    "error": "Acceso denegado",
    "message": "Solo los administradores pueden acceder a este recurso",
    "required_user": "admin",
    "received_user": "pepe"
}
```

---

## 🎯 Tips

1. **CORS**: Si pruebas desde JavaScript y tienes problemas de CORS, asegúrate de que Laravel tiene configurado CORS correctamente.

2. **Cache**: Si haces cambios y no se reflejan, limpia la caché:
   ```bash
   php artisan cache:clear
   php artisan route:clear
   ```

3. **Logs**: Para ver errores en tiempo real:
   ```bash
   tail -f storage/logs/laravel.log
   ```

4. **Debugging**: Agrega esto al middleware para ver qué recibe:
   ```php
   \Log::info('User recibido:', [
       'query' => $request->query('user'),
       'header' => $request->header('X-User'),
       'body' => $request->input('user'),
   ]);
   ```
