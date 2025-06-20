<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; color: #333; margin: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #0056b3; }
        .welcome-text { font-size: 1.1em; }
        .section { border-top: 1px solid #ddd; margin-top: 20px; padding-top: 20px; }
        .section ul { list-style: none; padding: 0; }
        .section li { margin-bottom: 10px; }
        .section a { display: inline-block; background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; transition: background-color 0.2s; }
        .section a:hover { background-color: #218838; }
        .section .locked { color: #999; background-color: #e9ecef; cursor: not-allowed; }
        .section .tool-link { background-color: #17a2b8; }
        .section .tool-link:hover { background-color: #138496; }
        .logout-link { display: inline-block; margin-top: 20px; color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Dashboard</h2>
        <p class="welcome-text">
            Selamat datang, <strong><?= esc(session()->get('username')) ?></strong> (Peran: <?= esc(session()->get('role')) ?>)
        </p>

        <div class="section">
            <h3>Game Edukasi Keamanan Siber</h3>
            <ul>
                <li>
                    <a href="/game/level/1">Mulai Level 1: Identifikasi Insiden</a>
                </li>
                <li>
                    <?php if (session()->get('level_unlocked') && session()->get('level_unlocked') > 1): ?>
                        <a href="/game/level/2">Mulai Level 2: Mitigasi & Dampak</a>
                    <?php else: ?>
                        <a href="#" class="locked">Level 2 (Terkunci)</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>

        <div class="section">
            <h3>Tools & Simulasi</h3>
            <ul>
                <li>
                    <a href="/securedata" class="tool-link">Demonstrasi Enkripsi Data</a>
                </li>
                <li>
                    <a href="/attack/simulate" class="tool-link">Simulasi Analisis Serangan</a>
                </li>
            </ul>
        </div>

        <a href="/logout" class="logout-link">Logout</a>
    </div>
</body>
</html>