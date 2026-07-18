<div class="top-bar"></div>
<div class="content">
  <h1>My Account</h1>
  <p>Your username is: <?= htmlspecialchars($userLogin['username']) ?></p>
  <p>Your email is: <?= htmlspecialchars($userLogin['email']) ?></p>
  <?php if ($userLogin && $userLogin['username'] === 'ahmed'): ?>
    <p style="color:red">flag: 8dce36b963cbedf6e6340b73cf410025938b178f</p>
  <?php endif ?>

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