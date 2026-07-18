<div class="top-bar"></div>
<div class="content">
  <h1>My Account</h1>
  <p>Your username is: the0x</p>
  <p>Flag: <?= $flag ?></p>

  <div class="account-box">
    <form action="#" method="post">
      <label for="email">Email</label>
      <div class="email-field">
        <input type="email" id="email" name="email" autocomplete="email">
        <span class="email-icon">&#9993;</span>
      </div>
      <button type="submit" class="btn-update">Update email</button>
    </form>
  </div>
</div>