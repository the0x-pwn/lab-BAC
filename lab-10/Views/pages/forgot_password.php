<div class="card">
    <div class="eyebrow">ACCOUNT RECOVERY</div>
    <h1>Forgot Password</h1>
    <div class="panel">
        <p class="desc">Enter the username associated with your account, and we'll send you a link
            to reset your password.</p>
        <form id="form-forgot-password" method="post" action="/forgot-password">
            <label for="identifier">Username</label>
            <input name="username" type="text" id="inputForgotPassword" placeholder="Enter your username">
            <p class="alert">username is required.</p>
            <button type="submit" class="send-btn">Send Reset Link</button>
        </form>
        <?php if (session()->exists('code')): ?>
            <a href="/email-clint" class="send-btn" style="display:inline-block;text-decoration:none;">Email Clint</a>
        <?php endif; ?>
        <a href="/" class="back-link">Back to Login</a>
    </div>
</div>
<script>
    const form = document.getElementById('form-forgot-password');
    const message = document.querySelector('.alert');

    form.addEventListener('submit', (e) => {
        isValid = true;
        const inputForgotPassword = document.getElementById('inputForgotPassword');

        if (inputForgotPassword.value.length <= 3) {
            message.style.display = 'block';
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
</script>