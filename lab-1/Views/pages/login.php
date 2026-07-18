<div class="hero">
  <span class="eyebrow">WELCOME BACK</span>
  <h1>LOGIN</h1>
</div>

<div class="login-wrap">
  <div class="login-card">
    <h2>Sign in to your account</h2>
    <p class="sub">Enter your details below to continue</p>

    <form id="form" action="/login" method="post">
      <div class="field">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="username">
        <p id="errorUsername" class="hidden"
          style="color:#c0392b; font-size:12px; margin:4px 0 0; display:flex; align-items:center; gap:4px; font-family:Arial, sans-serif;">
          <span style="font-weight:bold;">✕</span>
          username must be at least 3 characters
        </p>
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password"
          autocomplete="current-password">
        <p id="errorPassword" class="hidden"
          style="color:#c0392b; font-size:12px; margin:4px 0 0; display:flex; align-items:center; gap:4px; font-family:Arial, sans-serif;">
          <span style="font-weight:bold;">✕</span>
          password must be at least 3 characters
        </p>
      </div>
      <button type="submit" class="login-btn">Log in</button>
    </form>
  </div>
</div>
<script>
  let form = document.getElementById('form');
  form.addEventListener('submit', (e) => {
    isValid = true;

    let username = document.getElementById('username');
    let password = document.getElementById('password');
    let titleUsername = document.getElementById('errorUsername');
    let titlePassword = document.getElementById('errorPassword');

    function clearError(field, title) {
      field.classList.remove('error');
      title.classList.add('hidden');
    }

    if (username.value.length < 3) {
      username.classList.add('error');
      titleUsername.classList.remove('hidden');
      isValid = false;
    } else {
      clearError(username, titleUsername);
    }

    if (password.value.length < 3) {
      password.classList.add('error');
      titlePassword.classList.remove('hidden');
      isValid = false;
    } else {
      clearError(password, titlePassword);
    }

    if (!isValid) {
      e.preventDefault();
    }
  });
</script>