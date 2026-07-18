<div class="top-bar"></div>
<div class="content">
  <h1>My Account</h1>
  <p>Your username is: <?= htmlspecialchars($userLogin['username']) ?></p>
  <p>Your email is: <?= htmlspecialchars($userLogin['email']) ?></p>

  <div class="account-box">
    <!-- email -->
    <form id="form-update-email" action="update-email" method="post">
      <input type="hidden" name="_csrf" value="<?= session()->get('csrf') ?>">
      <label for="email">Email</label>
      <div class="email-field">
        <input type="email" id="email" name="email" autocomplete="email">
        <span class="email-icon">&#9993;</span>
      </div>
      <button type="submit" class="btn-update">Update email</button>
    </form>

    <!-- password -->
    <form id="form-update-password" action="update-password" method="post">
      <input type="hidden" name="_csrf" value="<?= session()->get('csrf') ?>">
      <label for="email">Password</label>
      <div class="email-field">
        <input type="password" id="password" name="password" autocomplete="email"
          value="<?= $userLogin['password_text'] ?>">
        <span class="email-icon">&#9993;</span>
      </div>
      <button type="submit" class="btn-update">Update password</button>
    </form>
  </div>
</div>
<?php if (session()->get('username') === 'ahmed'): ?>
  <script>
    alert('flag: 7fa94db1c9f77e8b122ec8c0287cc3d16367');
  </script>
<?php endif; ?>