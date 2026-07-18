<div class="top-bar"></div>
<div class="content">
  <h1>My Account</h1>
  <p>Your username is: <?= htmlspecialchars(session()->get('username')) ?></p>
  <p>Your email is: <?= htmlspecialchars(session()->get('email')) ?></p>

  <div class="account-box">
    <form id="form-update-email" action="update-email" method="post">
      <input type="hidden" name="_csrf" value="<?= session()->get('csrf') ?>">
      <label for="email">Email</label>
      <div class="email-field">
        <input type="email" id="email" name="email" autocomplete="email">
        <span class="email-icon">&#9993;</span>
      </div>
      <button type="submit" class="btn-update">Update email</button>
    </form>
  </div>
</div>