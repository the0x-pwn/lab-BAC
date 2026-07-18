<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= env('APP_NAME'); ?></title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php if (flash()->ExistsType('success')): ?>
        <div class="status-msg status-success">
            <div class="icon">✓</div>
            <div>
                <div class="title">Status: Success</div>
                <div class="body"><?= flash()->get('success'); ?></div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (flash()->ExistsType('error')): ?>
        <div class="status-msg status-error">
            <div class="icon">✕</div>
            <div>
                <div class="title">Status: Error</div>
                <div class="body"><?= flash()->get('error'); ?></div>
            </div>
        </div>
    <?php endif; ?>

    <header class="header">
        <div class="header-left">
            <svg class="logo-svg" viewBox="0 0 214 48" xmlns="http://www.w3.org/2000/svg" role="img"
                aria-label="BAC - Broken Access Control logo">
                <defs>
                    <linearGradient id="bacMarkGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#3a8fc9" />
                        <stop offset="55%" stop-color="#1a4c6e" />
                        <stop offset="100%" stop-color="#0f2c40" />
                    </linearGradient>
                    <linearGradient id="bacAccentGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#ff8a4c" />
                        <stop offset="100%" stop-color="#d94f1f" />
                    </linearGradient>
                    <filter id="bacSoftShadow" x="-20%" y="-20%" width="140%" height="140%">
                        <feDropShadow dx="0" dy="1.5" stdDeviation="1.5" flood-color="#0f2c40" flood-opacity="0.25" />
                    </filter>
                </defs>

                <rect x="1" y="1" width="44" height="44" rx="13" fill="url(#bacMarkGrad)"
                    filter="url(#bacSoftShadow)" />

                <g fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round">
                    <path d="M15 20 v-4 a8 8 0 0 1 8 -8" />
                    <path d="M31 12 a8 8 0 0 1 2 5 v3" stroke-opacity="0.55" />
                </g>
                <rect x="12" y="20" width="22" height="17" rx="4" fill="#ffffff" />
                <circle cx="23" cy="27" r="2.6" fill="url(#bacAccentGrad)" />
                <path d="M23 29 l-1.8 5 h3.6 Z" fill="url(#bacAccentGrad)" />
                <path d="M17 20 L21 27 L17.5 30 L23 37" stroke="#d94f1f" stroke-width="1.6" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" />

                <text x="60" y="27" font-family="'Segoe UI', Arial, Helvetica, sans-serif" font-size="24"
                    font-weight="800" letter-spacing="0.5" fill="#16324a">BAC</text>
                <text x="60" y="40" font-family="'Segoe UI', Arial, Helvetica, sans-serif" font-size="8.5"
                    font-weight="600" letter-spacing="1.2" fill="#e3721a">BROKEN ACCESS CONTROL</text>
            </svg>
            <div>
                <div class="lab-title"><?= env('TITLE_LAB') ?></div>
            </div>
        </div>
    </header>

    <nav class="account-nav">
        <?php
        echo '<a href="/">Home</a>';

        if (!session()->exists('login')) {
            echo '&nbsp;|&nbsp; <a href="/login">My account</a>';
        }

        if (session()->get('roleid') == 2) {
            $flag = 'e10fe1371a30530aa7ac015389c080e0403dee0e';
            echo '&nbsp;|&nbsp; <a href="javascript:alert(\'flag:' . $flag . '\')">Admin Panel</a>';
        }

        if (session()->exists('login')) {
            echo '&nbsp;|&nbsp;
                        <a href="/dashboard">Dashboard</a>
                        &nbsp;|&nbsp;
                        <form method="post" action="/logout" style="display:inline;">
                            <button class="logout-btn" style="background:transparent;border:none;padding:0;color:#1a6ecc;margin:0;outline:none;box-shadow:none;appearance:none;cursor:pointer;">
                                Log Out
                            </button>
                        </form>';
        }
        ?>
    </nav>
    {{content}}
</body>

</html>