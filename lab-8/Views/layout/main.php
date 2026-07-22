<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg-deep: #0A0E1A;
            --violet: #7C5CFF;
            --cyan: #3ECFFF;
            --pink: #FF6FD8;
            --ink: #F5F6FA;
        }

        * {
            font-family: 'Inter', 'Space Grotesk', sans-serif;
        }

        html,
        body {
            height: 100%;
        }

        body {
            background: radial-gradient(ellipse at top, #10142a 0%, #0A0E1A 60%);
            overflow: hidden;
        }

        /* Animated mesh background */
        .aurora {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(100px);
            opacity: .6;
            mix-blend-mode: screen;
            will-change: transform;
        }

        .blob-1 {
            width: 42rem;
            height: 42rem;
            background: radial-gradient(circle at 30% 30%, var(--violet), transparent 70%);
            top: -15%;
            right: -12%;
            animation: float1 18s ease-in-out infinite;
        }

        .blob-2 {
            width: 36rem;
            height: 36rem;
            background: radial-gradient(circle at 60% 40%, var(--cyan), transparent 70%);
            bottom: -18%;
            left: -12%;
            animation: float2 22s ease-in-out infinite;
        }

        .blob-3 {
            width: 30rem;
            height: 30rem;
            background: radial-gradient(circle at 50% 50%, var(--pink), transparent 70%);
            top: 35%;
            left: 38%;
            animation: float3 26s ease-in-out infinite;
        }

        .blob-4 {
            width: 24rem;
            height: 24rem;
            background: radial-gradient(circle at 40% 60%, #5CE1E6, transparent 70%);
            top: 10%;
            left: 15%;
            animation: float4 20s ease-in-out infinite;
            opacity: .35;
        }

        @keyframes float1 {

            0%,
            100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }

            33% {
                transform: translate(-8%, 10%) scale(1.15) rotate(15deg);
            }

            66% {
                transform: translate(-4%, -6%) scale(0.95) rotate(-10deg);
            }
        }

        @keyframes float2 {

            0%,
            100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }

            50% {
                transform: translate(10%, -8%) scale(1.12) rotate(-12deg);
            }
        }

        @keyframes float3 {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(-12%, -12%) scale(1.2);
            }
        }

        @keyframes float4 {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(15%, 12%) scale(1.25);
            }
        }

        /* Drifting particles */
        .particle {
            position: absolute;
            border-radius: 9999px;
            background: rgba(255, 255, 255, .55);
            animation: drift linear infinite;
        }

        @keyframes drift {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-110vh) translateX(var(--dx, 20px));
                opacity: 0;
            }
        }

        .grid-overlay {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: radial-gradient(ellipse at center, black 0%, transparent 75%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 8px 40px rgba(0, 0, 0, .5), inset 0 1px 0 rgba(255, 255, 255, .06);
        }

        .field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.14);
            transition: border-color .25s ease, box-shadow .25s ease, background .25s ease;
        }

        .field:focus {
            outline: none;
            border-color: var(--cyan);
            box-shadow: 0 0 0 4px rgba(62, 207, 255, 0.15);
            background: rgba(255, 255, 255, 0.08);
        }

        .field.error {
            border-color: #FF5D8F;
            box-shadow: 0 0 0 4px rgba(255, 93, 143, 0.15);
        }

        .shake {
            animation: shake .45s cubic-bezier(.36, .07, .19, .97) both;
        }

        @keyframes shake {

            10%,
            90% {
                transform: translateX(-1px);
            }

            20%,
            80% {
                transform: translateX(2px);
            }

            30%,
            50%,
            70% {
                transform: translateX(-4px);
            }

            40%,
            60% {
                transform: translateX(4px);
            }
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--violet), var(--cyan));
            transition: filter .25s ease, transform .15s ease;
        }

        .btn-gradient:hover {
            filter: brightness(1.12);
        }

        .btn-gradient:active {
            transform: scale(.98);
        }

        .err-msg {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all .25s ease;
        }

        .err-msg.show {
            max-height: 40px;
            opacity: 1;
            margin-top: .35rem;
        }

        .logo-ring {
            background: conic-gradient(from 0deg, var(--violet), var(--cyan), var(--pink), var(--violet));
            animation: spin 6s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .fade-up {
            animation: fadeUp .7s cubic-bezier(.22, 1, .36, 1) both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .status-msg {
            min-width: 260px;
            max-width: 320px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-left: 4px solid;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 12px 16px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #2b3a4a;
            font-size: 14px;
            font-family: Arial, sans-serif;
            position: fixed;
            top: 16px;
            right: 16px;
        }

        .status-msg .icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .status-msg .title {
            font-weight: bold;
        }

        .status-msg .body {
            margin-top: 2px;
        }

        .status-success {
            border-left-color: #2e7d32;
        }

        .status-success .icon {
            background: #2e7d32;
        }

        .status-success .title {
            color: #2e7d32;
        }

        .status-error {
            border-left-color: #c0392b;
        }

        .status-error .icon {
            background: #c0392b;
        }

        .status-error .title {
            color: #c0392b;
        }

        :root {
            --bg: #0A0E1A;
            --violet: #7C5CFF;
            --pink: #FF5D8F;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            background: var(--bg);
            overflow-x: hidden;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 24px;
        }

        /* ---------- Aurora background ---------- */
        .aurora {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(90px);
            opacity: 0.35;
            animation: float 18s ease-in-out infinite;
        }

        .blob-1 {
            width: 420px;
            height: 420px;
            background: #7C5CFF;
            top: -120px;
            left: -100px;
        }

        .blob-2 {
            width: 380px;
            height: 380px;
            background: #FF5D8F;
            bottom: -140px;
            right: -100px;
            animation-delay: -4s;
        }

        .blob-3 {
            width: 320px;
            height: 320px;
            background: #2CD4D9;
            top: 40%;
            right: -140px;
            animation-delay: -9s;
        }

        .blob-4 {
            width: 300px;
            height: 300px;
            background: #5C8DFF;
            bottom: 10%;
            left: -120px;
            animation-delay: -13s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(30px, -40px) scale(1.08);
            }
        }

        .grid-overlay {
            position: fixed;
            inset: 0;
            z-index: 1;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
            background-size: 44px 44px;
            mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);
        }

        /* ---------- Glass card ---------- */
        .glass {
            background: rgba(255, 255, 255, 0.045);
            border: 1px solid rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(22px);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.35);
        }

        .logo-ring {
            background: linear-gradient(135deg, var(--violet), var(--pink));
        }

        .field {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.09);
            transition: border-color .2s, background .2s;
        }

        .field:focus {
            outline: none;
            border-color: rgba(124, 92, 255, 0.6);
            background: rgba(255, 255, 255, 0.06);
        }

        .field.invalid {
            border-color: rgba(255, 93, 143, 0.7);
        }

        .err-msg {
            display: none;
            margin-top: 6px;
        }

        .err-msg.show {
            display: block;
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--violet), var(--pink));
            transition: filter .2s, transform .2s;
        }

        .btn-gradient:hover {
            filter: brightness(1.08);
        }

        .btn-gradient:active {
            transform: scale(0.98);
        }

        .fade-up {
            animation: fadeUp .6s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- Solution button ---------- */
        #solutionBtn svg {
            transition: transform .2s;
        }

        #solutionBtn:hover svg {
            transform: translateX(2px);
        }

        /* ---------- VSCode-style solution panel ---------- */
        #solutionPanel {
            font-family: 'JetBrains Mono', monospace;
        }

        #codeBlock {
            padding: 16px 0;
            white-space: pre;
            color: #d4d4d4;
            margin: 0;
        }

        .code-line {
            display: block;
            padding: 0 20px;
            min-height: 1.6em;
        }

        .code-line:hover {
            background: rgba(255, 255, 255, 0.035);
        }

        .ln {
            display: inline-block;
            width: 34px;
            color: #5a5a5a;
            user-select: none;
            text-align: right;
            margin-right: 18px;
        }

        .tok-kw {
            color: #C586C0;
        }

        .tok-str {
            color: #CE9178;
        }

        .tok-num {
            color: #B5CEA8;
        }

        .tok-com {
            color: #6A9955;
        }

        .tok-fn {
            color: #DCDCAA;
        }

        .tok-cls {
            color: #4EC9B0;
        }

        .tok-self {
            color: #9CDCFE;
        }

        #solutionOverlay {
            backdrop-filter: blur(2px);
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        @media (prefers-reduced-motion: reduce) {

            .blob,
            .fade-up {
                animation: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen w-full relative flex items-center justify-center px-4">
    {{content}}
    <?php if (flash()->ExistsType('success')): ?>
        <div class="status-msg status-success" style="z-index:9999999">
            <div class="icon">✓</div>
            <div>
                <div class="title">Status: Success</div>
                <div class="body">
                    <?= flash()->get('success'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (flash()->ExistsType('error')): ?>
        <div class="status-msg status-error" style="z-index:9999999">
            <div class="icon">✕</div>
            <div>
                <div class="title">Status: Error</div>
                <div class="body">
                    <?= flash()->get('error'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('loginForm');
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const usernameErr = document.getElementById('usernameErr');
            const passwordErr = document.getElementById('passwordErr');

            form.addEventListener('submit', function (e) {
                let valid = true;

                if (username.value.trim() === '') {
                    usernameErr.textContent = 'This field is required';
                    usernameErr.classList.add('show');
                    username.classList.add('error');
                    valid = false;
                } else {
                    usernameErr.classList.remove('show');
                    username.classList.remove('error');
                }

                if (password.value.trim() === '') {
                    passwordErr.textContent = 'This field is required';
                    passwordErr.classList.add('show');
                    password.classList.add('error');
                    valid = false;
                } else {
                    passwordErr.classList.remove('show');
                    password.classList.remove('error');
                }

                if (!valid) {
                    e.preventDefault(); // stop submission only if a field is empty
                }
                // if valid, form submits normally
            });
        });
    </script>
</body>

</html>