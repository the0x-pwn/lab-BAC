<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        color: #333;
        background: #fff;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 40px;
        background: #f3f3f3;
        border-bottom: 3px solid #e3721a;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .logo {
        font-size: 26px;
        font-weight: bold;
        line-height: 1.1;
        color: #1a1a1a;
        padding-right: 20px;
    }

    .logo span {
        background: #e3721a;
        color: #fff;
        padding: 0 6px;
        border-radius: 3px;
        font-size: 20px;
        margin-left: 4px;
    }

    nav.account-nav {
        text-align: right;
        padding: 15px 40px;
        font-size: 14px;
    }

    nav.account-nav a {
        color: #1a6ecc;
        text-decoration: none;
    }

    nav.account-nav a:hover {
        text-decoration: underline;
    }

    .hero {
        text-align: center;
        padding: 40px 0 10px;
    }

    .hero .eyebrow {
        letter-spacing: 8px;
        color: #999;
        font-size: 16px;
    }

    .hero h1 {
        font-size: 46px;
        color: #1a4c6e;
        margin: 5px 0 0;
        font-weight: 900;
        letter-spacing: 2px;
    }

    .login-wrap {
        display: flex;
        justify-content: center;
        padding: 30px 20px 80px;
    }

    .login-card {
        width: 100%;
        max-width: 380px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        padding: 30px 30px 34px;
        background: #fff;
    }

    .login-card h2 {
        margin: 0 0 6px;
        font-size: 20px;
        color: #1a4c6e;
        text-align: center;
    }

    .login-card p.sub {
        margin: 0 0 24px;
        font-size: 13px;
        color: #888;
        text-align: center;
        line-height: 1.5;
    }

    .field {
        margin-bottom: 18px;
    }

    .field label {
        display: block;
        font-size: 13px;
        font-weight: bold;
        color: #444;
        margin-bottom: 6px;
    }

    .field input {
        width: 100%;
        padding: 10px 12px;
        font-size: 18px;
        letter-spacing: 6px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 3px;
        outline: none;
        transition: border-color 0.2s ease;
    }

    .field input:focus {
        border-color: #e3721a;
    }

    .login-btn {
        display: block;
        width: 100%;
        padding: 10px 0;
        background: #e3721a;
        color: #fff;
        border: none;
        border-radius: 3px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: background 0.2s ease;
        margin-top: 6px;
    }

    .login-btn:hover {
        background: #c95f10;
    }

    .login-footer {
        text-align: center;
        margin-top: 18px;
        font-size: 13px;
        color: #888;
    }

    .login-footer a {
        color: #1a6ecc;
        text-decoration: none;
    }

    .login-footer a:hover {
        text-decoration: underline;
    }

    .resend-timer {
        text-align: center;
        margin-top: 10px;
        font-size: 12px;
        color: #aaa;
    }

    .hidden {
        display: none !important;
    }

    .error {
        border: 1.5px solid #c0392b !important;
        background: #fdf2f1 !important;
    }

    .error-msg {
        color: #c0392b;
        font-size: 12px;
        margin: 6px 0 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        font-family: Arial, sans-serif;
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

    .status-error {
        border-left-color: #c0392b;
    }

    .status-error .icon {
        background: #c0392b;
    }

    .status-error .title {
        color: #c0392b;
    }
</style>

<div class="hero">
    <span class="eyebrow">FINAL STEP</span>
    <h1>2FA VERIFICATION</h1>
</div>

<div class="login-wrap">
    <div class="login-card">
        <h2>Enter verification code</h2>
        <p class="sub">We've sent a 6-digit code to the verification method linked to your account. Enter it below
            to complete sign in.</p>

        <form id="form" action="/email-verification" method="post">
            <div class="field">
                <label for="code">Verification code</label>
                <input type="text" id="code" name="code" placeholder="000000" maxlength="6" inputmode="numeric"
                    autocomplete="one-time-code">
                <p id="errorCode" class="error-msg hidden">
                    <span style="font-weight:bold;">✕</span>
                    Code must be 6 digits
                </p>
            </div>

            <button type="submit" class="login-btn">Verify and continue</button>
        </form>
        <div class="resend-timer" id="resendTimer">You can resend the code in <span id="seconds">30</span> seconds
        </div>

        <div class="login-footer">
            Didn't receive a code? <a href="#" id="resendLink" style="display:none;">Resend</a>
        </div>
        <a target="_blank" href="/email-clint" class="login-btn">Email client</a>
    </div>
</div>

<div class="status-msg status-error hidden" id="toastError">
    <div class="icon">✕</div>
    <div>
        <div class="title">Verification failed</div>
        <div class="body" id="toastErrorBody">The code is incorrect or has expired</div>
    </div>
</div>

<script>
    let form = document.getElementById('form');
    let codeInput = document.getElementById('code');
    let errorCode = document.getElementById('errorCode');

    // Only allow digits
    codeInput.addEventListener('input', () => {
        codeInput.value = codeInput.value.replace(/[^0-9]/g, '');
    });

    form.addEventListener('submit', (e) => {
        let isValid = true;

        if (codeInput.value.length !== 6) {
            codeInput.classList.add('error');
            errorCode.classList.remove('hidden');
            isValid = false;
        } else {
            codeInput.classList.remove('error');
            errorCode.classList.add('hidden');
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    // Resend countdown
    let seconds = 30;
    let secondsEl = document.getElementById('seconds');
    let resendTimer = document.getElementById('resendTimer');
    let resendLink = document.getElementById('resendLink');

    let interval = setInterval(() => {
        seconds--;
        secondsEl.textContent = seconds;
        if (seconds <= 0) {
            clearInterval(interval);
            resendTimer.classList.add('hidden');
            resendLink.style.display = 'inline';
        }
    }, 1000);

    resendLink.addEventListener('click', (e) => {
        e.preventDefault();
        seconds = 30;
        secondsEl.textContent = seconds;
        resendTimer.classList.remove('hidden');
        resendLink.style.display = 'none';
        interval = setInterval(() => {
            seconds--;
            secondsEl.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(interval);
                resendTimer.classList.add('hidden');
                resendLink.style.display = 'inline';
            }
        }, 1000);
    });
</script>