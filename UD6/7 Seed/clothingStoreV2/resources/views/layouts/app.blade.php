<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Clothing Store') - 👕 Tienda de Ropa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            color: #e4e4e4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 0;
            margin-bottom: 30px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo span {
            background: linear-gradient(135deg, #e94560, #ff6b6b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Cards */
        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Títulos */
        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        h1::before {
            content: '👕';
            font-size: 1.5rem;
        }

        /* Tablas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background: linear-gradient(135deg, #e94560, #ff6b6b);
        }

        th {
            padding: 15px 20px;
            text-align: left;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        th:first-child {
            border-radius: 10px 0 0 10px;
        }

        th:last-child {
            border-radius: 0 10px 10px 0;
        }

        td {
            padding: 18px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(233, 69, 96, 0.1);
            transform: scale(1.01);
        }

        tbody tr:hover td {
            color: #fff;
        }

        /* Botones */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #e94560, #ff6b6b);
            color: #fff;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(233, 69, 96, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: #e4e4e4;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .btn-success {
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: #fff;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 184, 148, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #fdcb6e, #f39c12);
            color: #1a1a2e;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(253, 203, 110, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #d63031, #e74c3c);
            color: #fff;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(214, 48, 49, 0.4);
        }

        .btn-info {
            background: linear-gradient(135deg, #0984e3, #74b9ff);
            color: #fff;
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(9, 132, 227, 0.4);
        }

        .btn-sm {
            padding: 8px 14px;
            font-size: 0.8rem;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        /* Formularios */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #e4e4e4;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 14px 18px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #e94560;
            box-shadow: 0 0 20px rgba(233, 69, 96, 0.2);
            background: rgba(255, 255, 255, 0.08);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        /* Detalles */
        .detail-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .detail-label {
            font-weight: 600;
            color: #e94560;
            min-width: 120px;
        }

        .detail-value {
            color: #fff;
        }

        /* Badge para colores */
        .color-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            font-size: 0.85rem;
        }

        /* Price */
        .price {
            font-weight: 600;
            color: #00b894;
            font-size: 1.1rem;
        }

        /* Form actions */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 30px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
        }

        /* Animaciones */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeIn 0.5s ease;
        }

        /* Grid para formularios */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Mensaje de éxito/error */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: rgba(0, 184, 148, 0.2);
            border: 1px solid rgba(0, 184, 148, 0.3);
            color: #00b894;
        }

        .alert-error {
            background: rgba(214, 48, 49, 0.2);
            border: 1px solid rgba(214, 48, 49, 0.3);
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="{{ route('clothing-items.index') }}" class="logo">
                👕 <span>Clothing NiggStore</span>
            </a>
        </div>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <p>🛍️ Clothing Store © {{ date('Y') }} - Hecho con ❤️ y Laravel</p>
    </footer>
</body>
</html>
