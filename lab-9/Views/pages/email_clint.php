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
        margin-left: 12px;
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

    .mail-wrap {
        display: flex;
        justify-content: center;
        padding: 30px 20px 80px;
    }

    .mail-app {
        width: 100%;
        max-width: 900px;
        display: flex;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        background: #fff;
        overflow: hidden;
        min-height: 480px;
    }

    .mail-list {
        width: 320px;
        border-right: 1px solid #eee;
        background: #fafafa;
    }

    .mail-list-header {
        padding: 16px 18px;
        border-bottom: 1px solid #eee;
        font-size: 13px;
        font-weight: bold;
        color: #444;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mail-list-header .count {
        background: #e3721a;
        color: #fff;
        font-size: 11px;
        padding: 2px 7px;
        border-radius: 10px;
    }

    .mail-item {
        padding: 14px 18px;
        border-bottom: 1px solid #eee;
        cursor: pointer;
        transition: background 0.15s ease;
    }

    .mail-item:hover {
        background: #f0f0f0;
    }

    .mail-item.active {
        background: #eef4fa;
        border-left: 3px solid #1a4c6e;
    }

    .mail-item .from {
        font-size: 13px;
        font-weight: bold;
        color: #222;
        margin-bottom: 3px;
    }

    .mail-item .subject {
        font-size: 13px;
        color: #444;
        margin-bottom: 3px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .mail-item .time {
        font-size: 11px;
        color: #999;
    }

    .mail-item .unread-dot {
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #e3721a;
        margin-right: 6px;
    }

    .mail-empty {
        padding: 40px 18px;
        text-align: center;
        font-size: 13px;
        color: #999;
    }

    .mail-body {
        flex: 1;
        padding: 28px 32px;
    }

    .mail-body-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #aaa;
        font-size: 14px;
    }

    .mail-subject-line {
        font-size: 20px;
        color: #1a4c6e;
        font-weight: bold;
        margin: 0 0 14px;
    }

    .mail-meta {
        font-size: 12px;
        color: #888;
        border-bottom: 1px solid #eee;
        padding-bottom: 14px;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .mail-meta b {
        color: #444;
    }

    .mail-content p {
        font-size: 14px;
        line-height: 1.7;
        color: #333;
    }

    .otp-box {
        display: inline-block;
        background: #eceff1;
        border: 1px dashed #1a4c6e;
        border-radius: 4px;
        padding: 14px 26px;
        font-size: 28px;
        font-weight: bold;
        letter-spacing: 8px;
        color: #1a4c6e;
        margin: 14px 0;
    }

    .copy-btn {
        display: inline-block;
        margin-left: 14px;
        background: #e3721a;
        color: #fff;
        border: none;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: bold;
        border-radius: 3px;
        cursor: pointer;
        vertical-align: middle;
    }

    .copy-btn:hover {
        background: #c95f10;
    }

    .copy-btn.copied {
        background: #1e8a72;
    }

    .mail-footer-note {
        font-size: 12px;
        color: #999;
        margin-top: 24px;
    }
</style>

<div class="hero">
    <span class="eyebrow">INBOX</span>
    <h1>EMAIL CLIENT</h1>
</div>

<div class="mail-wrap">
    <div class="mail-app">
        <div class="mail-list" id="mailList">
            <div class="mail-list-header">
                <span>Inbox</span>
                <span class="count" id="unreadCount">1</span>
            </div>
            <div id="mailListItems"></div>
        </div>

        <div class="mail-body" id="mailBody">
            <div class="mail-body-placeholder">Select an email to read it</div>
        </div>
    </div>
</div>

<script>
    // Mock inbox data. The verification code below simulates the one sent
    // to the user during the 2FA login flow.
    const inbox = [
        {
            id: 1,
            from: "2FA@lab.cc",
            subject: "Your verification code",
            time: "just now",
            unread: true,
            code: "<?= session()->get('code') ?>",
            body: `We received a request to sign in to your account. Use the verification
      code below to complete your login. This code will expire in 10 minutes.`
        }
    ];

    const mailListItems = document.getElementById('mailListItems');
    const mailBody = document.getElementById('mailBody');
    const unreadCount = document.getElementById('unreadCount');

    function renderList() {
        mailListItems.innerHTML = '';

        if (inbox.length === 0) {
            mailListItems.innerHTML = '<div class="mail-empty">No emails yet</div>';
            return;
        }

        inbox.forEach(mail => {
            const item = document.createElement('div');
            item.className = 'mail-item';
            item.dataset.id = mail.id;
            item.innerHTML = `
        <div class="from">${mail.unread ? '<span class="unread-dot"></span>' : ''}${mail.from}</div>
        <div class="subject">${mail.subject}</div>
        <div class="time">${mail.time}</div>
      `;
            item.addEventListener('click', () => openMail(mail.id, item));
            mailListItems.appendChild(item);
        });

        updateUnreadCount();
    }

    function updateUnreadCount() {
        const count = inbox.filter(m => m.unread).length;
        unreadCount.textContent = count;
        unreadCount.style.display = count > 0 ? 'inline-block' : 'none';
    }

    function openMail(id, itemEl) {
        document.querySelectorAll('.mail-item').forEach(el => el.classList.remove('active'));
        itemEl.classList.add('active');

        const mail = inbox.find(m => m.id === id);
        mail.unread = false;
        renderList();
        document.querySelector(`.mail-item[data-id="${id}"]`).classList.add('active');

        mailBody.innerHTML = `
      <h2 class="mail-subject-line">${mail.subject}</h2>
      <div class="mail-meta">
        <div><b>From:</b> ${mail.from}</div>
        <div><b>Time:</b> ${mail.time}</div>
      </div>
      <div class="mail-content">
        <p>${mail.body}</p>
        <div>
          <span class="otp-box">${mail.code}</span>
          <button class="copy-btn" id="copyBtn">Copy code</button>
        </div>
        <p class="mail-footer-note">If you didn't request this code, you can safely ignore this email.</p>
      </div>
    `;

        document.getElementById('copyBtn').addEventListener('click', (e) => {
            navigator.clipboard.writeText(mail.code).then(() => {
                e.target.textContent = 'Copied!';
                e.target.classList.add('copied');
                setTimeout(() => {
                    e.target.textContent = 'Copy code';
                    e.target.classList.remove('copied');
                }, 1500);
            });
        });
    }

    renderList();
</script>