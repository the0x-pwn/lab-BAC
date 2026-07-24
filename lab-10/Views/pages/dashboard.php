<div class="top-bar"></div>
<div class="content">
  <h1>My Account</h1>
  <p>Your username is: <?= session()->get('username') ?></p>
  <p>Your email is: <?= session()->get('email') ?></p>
  <p>Your role is: <?= session()->get('roleid') == 2 ? 'admin' : 'user' ?></p>

  <div class="account-box">
    <!-- email -->
    <form id="form-update-email" action="update-email" method="post">
      <label for="email">Email</label>
      <div class="email-field">
        <input type="email" id="email" name="email" autocomplete="email">
        <span class="email-icon">&#9993;</span>
      </div>
      <a href="/forgot-password" class="forgot-password">Forgot your password?</a><br><br>
      <button type="submit" class="btn-update">Update email</button>
    </form>
  </div>
</div>