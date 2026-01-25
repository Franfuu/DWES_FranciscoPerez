<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>⚔️ Players & Roles</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --bg-dark: #0f0f1a;
      --bg-card: #1a1a2e;
      --bg-card-hover: #252542;
      --accent-gold: #ffd700;
      --accent-purple: #9b59b6;
      --accent-blue: #3498db;
      --accent-green: #2ecc71;
      --accent-red: #e74c3c;
      --text-primary: #ffffff;
      --text-secondary: #a0a0b0;
      --border-color: #2a2a4a;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--bg-dark);
      background-image: 
        radial-gradient(ellipse at top, #1a1a3e 0%, transparent 50%),
        radial-gradient(ellipse at bottom, #0f0f2a 0%, transparent 50%);
      min-height: 100vh;
      color: var(--text-primary);
      padding: 2rem;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
    }

    header {
      text-align: center;
      margin-bottom: 3rem;
      padding: 2rem;
      background: linear-gradient(135deg, var(--bg-card) 0%, #16162a 100%);
      border-radius: 16px;
      border: 1px solid var(--border-color);
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--accent-purple), var(--accent-gold), var(--accent-purple));
    }

    h1 {
      font-family: 'Cinzel', serif;
      font-size: 2.5rem;
      background: linear-gradient(135deg, var(--accent-gold) 0%, #fff5cc 50%, var(--accent-gold) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.5rem;
      text-shadow: 0 0 30px rgba(255, 215, 0, 0.3);
    }

    header p {
      color: var(--text-secondary);
      font-size: 1rem;
    }

    .players-grid {
      display: grid;
      gap: 1.5rem;
    }

    .player-card {
      background: var(--bg-card);
      border-radius: 12px;
      border: 1px solid var(--border-color);
      padding: 1.5rem;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .player-card:hover {
      background: var(--bg-card-hover);
      transform: translateY(-4px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
      border-color: var(--accent-purple);
    }

    .player-card::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      background: linear-gradient(180deg, var(--accent-purple), var(--accent-blue));
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .player-card:hover::after {
      opacity: 1;
    }

    .player-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .player-avatar {
      width: 60px;
      height: 60px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--accent-purple) 0%, var(--accent-blue) 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      font-weight: 700;
      color: white;
      text-transform: uppercase;
      box-shadow: 0 4px 15px rgba(155, 89, 182, 0.4);
    }

    .player-info {
      flex: 1;
    }

    .player-name {
      font-family: 'Cinzel', serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 0.25rem;
    }

    .player-rank {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      color: var(--text-secondary);
      font-size: 0.85rem;
    }

    .level-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.3rem;
      background: linear-gradient(135deg, #2a2a4a 0%, #1a1a3e 100%);
      padding: 0.4rem 0.8rem;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 600;
      border: 1px solid var(--border-color);
    }

    .level-badge span {
      color: var(--accent-gold);
    }

    .roles-section {
      margin-top: 1rem;
    }

    .roles-label {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--text-secondary);
      margin-bottom: 0.5rem;
    }

    .roles-list {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .role-tag {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.4rem 0.8rem;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 500;
      transition: all 0.2s ease;
    }

    .role-tag:hover {
      transform: scale(1.05);
    }

    .role-warrior { background: rgba(231, 76, 60, 0.2); color: #e74c3c; border: 1px solid rgba(231, 76, 60, 0.3); }
    .role-mage { background: rgba(155, 89, 182, 0.2); color: #9b59b6; border: 1px solid rgba(155, 89, 182, 0.3); }
    .role-rogue { background: rgba(52, 73, 94, 0.3); color: #95a5a6; border: 1px solid rgba(149, 165, 166, 0.3); }
    .role-priest { background: rgba(241, 196, 15, 0.2); color: #f1c40f; border: 1px solid rgba(241, 196, 15, 0.3); }
    .role-paladin { background: rgba(255, 215, 0, 0.2); color: #ffd700; border: 1px solid rgba(255, 215, 0, 0.3); }
    .role-druid { background: rgba(46, 204, 113, 0.2); color: #2ecc71; border: 1px solid rgba(46, 204, 113, 0.3); }
    .role-hunter { background: rgba(230, 126, 34, 0.2); color: #e67e22; border: 1px solid rgba(230, 126, 34, 0.3); }
    .role-warlock { background: rgba(142, 68, 173, 0.2); color: #8e44ad; border: 1px solid rgba(142, 68, 173, 0.3); }
    .role-default { background: rgba(52, 152, 219, 0.2); color: #3498db; border: 1px solid rgba(52, 152, 219, 0.3); }

    .no-roles {
      color: var(--text-secondary);
      font-style: italic;
      font-size: 0.85rem;
    }

    .stats-bar {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    .stat-card {
      background: var(--bg-card);
      padding: 1.5rem;
      border-radius: 12px;
      border: 1px solid var(--border-color);
    }

    .stat-value {
      font-family: 'Cinzel', serif;
      font-size: 2rem;
      font-weight: 700;
      color: var(--accent-gold);
    }

    .stat-label {
      font-size: 0.8rem;
      color: var(--text-secondary);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 0.25rem;
    }

    .role-icon {
      font-size: 1rem;
    }

    footer {
      text-align: center;
      margin-top: 3rem;
      padding: 1.5rem;
      color: var(--text-secondary);
      font-size: 0.85rem;
      border-top: 1px solid var(--border-color);
    }

    @media (max-width: 600px) {
      body {
        padding: 1rem;
      }
      
      h1 {
        font-size: 1.8rem;
      }
      
      .stats-bar {
        grid-template-columns: 1fr;
      }
      
      .player-header {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>⚔️ Players & Roles</h1>
      <p>Many-to-many relationship demo • Powered by Laravel & Eloquent</p>
    </header>

    <div class="stats-bar">
      <div class="stat-card">
        <div class="stat-value">{{ count($players) }}</div>
        <div class="stat-label">Total Players</div>
      </div>
      <div class="stat-card">
        <div class="stat-value">{{ $players->sum(fn($p) => $p->roles->count()) }}</div>
        <div class="stat-label">Roles Assigned</div>
      </div>
      <div class="stat-card">
        <div class="stat-value">{{ $players->max('level') ?? 0 }}</div>
        <div class="stat-label">Max Level</div>
      </div>
    </div>

    <div class="players-grid">
      @foreach ($players as $player)
        <article class="player-card">
          <div class="player-header">
            <div class="player-avatar">
              {{ substr($player->name, 0, 2) }}
            </div>
            <div class="player-info">
              <div class="player-name">{{ $player->name }}</div>
              <div class="player-rank">
                <div class="level-badge">
                  ⭐ Level <span>{{ $player->level }}</span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="roles-section">
            <div class="roles-label">Active Roles</div>
            <div class="roles-list">
              @if($player->roles->isEmpty())
                <span class="no-roles">No roles assigned</span>
              @else
                @foreach($player->roles as $role)
                  @php
                    $roleClass = 'role-' . strtolower($role->name);
                    $icons = [
                      'warrior' => '⚔️',
                      'mage' => '🔮',
                      'rogue' => '🗡️',
                      'priest' => '✨',
                      'paladin' => '🛡️',
                      'druid' => '🌿',
                      'hunter' => '🏹',
                      'warlock' => '💀',
                    ];
                    $icon = $icons[strtolower($role->name)] ?? '🎮';
                  @endphp
                  <span class="role-tag {{ $roleClass }}" title="{{ $role->description }}">
                    <span class="role-icon">{{ $icon }}</span>
                    {{ $role->name }}
                  </span>
                @endforeach
              @endif
            </div>
          </div>
        </article>
      @endforeach
    </div>

    <footer>
      Made with ❤️ using Laravel • N:M Relationship Demo
    </footer>
  </div>
</body>
</html>