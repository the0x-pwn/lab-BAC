<div class="top-bar"></div>
<div class="content">
<div class="flag-container">
    <span class="flag-label">🏁 FLAG</span>
    <code>f9c5e04187d1114a1fc299da64f520c1a3ae102a679527b317</code>
</div>

<style>
.flag-container{
    background:#111827;
    border:1px solid #374151;
    border-left:4px solid #22c55e;
    color:#f9fafb;
    padding:16px 20px;
    border-radius:12px;
    font-family:'Inter',sans-serif;
    max-width:700px;
    margin:20px auto;
    box-shadow:0 10px 25px rgba(0,0,0,.25);
}

.flag-label{
    display:block;
    color:#22c55e;
    font-size:12px;
    font-weight:700;
    letter-spacing:2px;
    margin-bottom:8px;
}

.flag-container code{
    font-size:15px;
    word-break:break-all;
    font-family:'JetBrains Mono', monospace;
}
</style>
</div>
<?php if (session()->get('username') === 'ahmed'): ?>
  <script>
    alert('flag: 7fa94db1c9f77e8b122ec8c0287cc3d16367');
  </script>
<?php endif; ?>