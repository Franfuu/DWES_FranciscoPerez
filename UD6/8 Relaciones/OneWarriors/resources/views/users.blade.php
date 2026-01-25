<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users and Warrior Equipment</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: #fff;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            font-family: 'Cinzel', serif;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: #e94560;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        h1::after {
            content: '⚔️';
            display: block;
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .warriors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .warrior-card {
            background: linear-gradient(145deg, #1f2937 0%, #111827 100%);
            border-radius: 15px;
            padding: 25px;
            border: 2px solid #e94560;
            box-shadow: 0 10px 30px rgba(233, 69, 96, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .warrior-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #e94560, #f39c12, #e94560);
        }

        .warrior-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(233, 69, 96, 0.3);
            border-color: #f39c12;
        }

        .warrior-avatar {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #e94560, #f39c12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(233, 69, 96, 0.4);
        }

        .warrior-name {
            font-family: 'Cinzel', serif;
            font-size: 1.4rem;
            color: #fff;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .equipment-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #9ca3af;
            margin-bottom: 5px;
        }

        .equipment-value {
            font-size: 1.1rem;
            color: #f39c12;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .equipment-value::before {
            content: '🛡️';
        }

        .no-equipment {
            color: #6b7280;
            font-style: italic;
        }

        .no-equipment::before {
            content: '❌';
        }

        footer {
            text-align: center;
            margin-top: 50px;
            color: #6b7280;
            font-size: 0.9rem;
        }

        footer span {
            color: #e94560;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Warriors & Equipment</h1>

        <div class="warriors-grid">
            @foreach($users as $user)
                <div class="warrior-card">
                    <div class="warrior-avatar">⚔️</div>
                    <div class="warrior-name">{{ $user->name }}</div>
                    <div class="equipment-label">Equipment</div>
                    @if($user->championship)
                        <div class="equipment-value">{{ $user->championship->warrior_equipment }}</div>
                    @else
                        <div class="equipment-value no-equipment">No equipment assigned</div>
                    @endif
                </div>
            @endforeach
        </div>

        <footer>
            <p>OneWarriors Championship <span>❤️</span> Laravel</p>
        </footer>
    </div>
</body>
</html>