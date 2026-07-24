<style>
    .rpw-2x9k * {
        box-sizing: border-box;
    }

    .rpw-2x9k {
        margin: 0;
        min-height: 100vh;
        background: #ffffff;
        font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
    }

    .rpw-cardBox {
        width: 100%;
        max-width: 420px;
        text-align: center;
    }

    .rpw-cardBox h1 {
        color: #1b3a5c;
        font-size: 34px;
        font-weight: 700;
        margin: 0 0 30px;
        letter-spacing: 1px;
    }

    .rpw-panelWrap {
        border: 1px solid #e3e5e8;
        border-radius: 10px;
        padding: 30px 28px 34px;
        text-align: left;
        background: #fff;
    }

    .rpw-descText {
        color: #6b7280;
        font-size: 14px;
        line-height: 1.7;
        margin: 0 0 26px;
        text-align: center;
    }

    .rpw-panelWrap label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #1b3a5c;
        margin-bottom: 8px;
    }

    .rpw-panelWrap input[type="password"] {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d7dbe0;
        border-radius: 6px;
        font-size: 15px;
        color: #333;
        background: #fff;
        outline: none;
        transition: border-color .15s;
    }

    .rpw-panelWrap input[type="password"]::placeholder {
        color: #aab0b8;
    }

    .rpw-panelWrap input[type="password"]:focus {
        border-color: #e07b1a;
    }

    .rpw-fieldGroup {
        margin-bottom: 20px;
    }

    .rpw-fieldGroup:last-of-type {
        margin-bottom: 0;
    }

    .rpw-submitBtn {
        width: 100%;
        margin-top: 26px;
        padding: 13px;
        background: #d67715;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background .15s;
    }

    .rpw-submitBtn:hover {
        background: #c06a10;
    }

    .rpw-noticeBox {
        display: none;
        align-items: center;
        gap: 10px;
        background: #fdecec;
        border: 1px solid #f3b9b9;
        color: #c23b3b;
        border-radius: 6px;
        padding: 11px 14px;
        font-size: 13.5px;
        line-height: 1.5;
        margin-bottom: 18px;
        text-align: left;
    }

    .rpw-noticeBox.rpw-isVisible {
        display: flex;
    }

    .rpw-noticeBox svg {
        flex-shrink: 0;
        width: 18px;
        height: 18px;
    }

    .rpw-noticeBox p {
        margin: 0;
    }

    .rpw-panelWrap input.rpw-invalidField {
        border-color: #e07a7a;
    }
</style>

<div class="rpw-2x9k">
    <div class="rpw-cardBox">
        <h1>Reset Password</h1>
        <div class="rpw-panelWrap">
            <p class="rpw-descText">Enter a new password for your account below.</p>

            <div class="rpw-noticeBox" id="rpwNoticeBox">
                <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="9" stroke="#c23b3b" stroke-width="1.5" />
                    <path d="M10 6v5" stroke="#c23b3b" stroke-width="1.5" stroke-linecap="round" />
                    <circle cx="10" cy="13.5" r="1" fill="#c23b3b" />
                </svg>
                <p id="rpwNoticeText">Passwords do not match.</p>
            </div>

            <form action="/update-password" id="rpwForm" method="POST">
                <input type="hidden" name="username" value="<?= session()->get('username') ?>">
                <div class="rpw-fieldGroup">
                    <label for="rpwNewPassword">New Password</label>
                    <input name="password" type="password" id="rpwNewPassword" placeholder="Enter your new password">
                </div>
                <div class="rpw-fieldGroup">
                    <label for="rpwConfirmPassword">Confirm New Password</label>
                    <input name="confirm-password" type="password" id="rpwConfirmPassword"
                        placeholder="Re-enter your new password">
                </div>
                <button type="submit" class="rpw-submitBtn">Reset Password</button>
            </form>
        </div>
    </div>
</div>

<script>
    function rpwShowNotice(message) {
        const noticeBox = document.getElementById('rpwNoticeBox');
        document.getElementById('rpwNoticeText').textContent = message;
        noticeBox.classList.add('rpw-isVisible');
    }

    function rpwClearNotice() {
        document.getElementById('rpwNoticeBox').classList.remove('rpw-isVisible');
    }

    function rpwHandleSubmit(e) {
        const newPassword = document.getElementById('rpwNewPassword');
        const confirmPassword = document.getElementById('rpwConfirmPassword');

        newPassword.classList.remove('rpw-invalidField');
        confirmPassword.classList.remove('rpw-invalidField');

        if (!newPassword.value.trim() || !confirmPassword.value.trim()) {
            e.preventDefault();
            rpwShowNotice('Both fields are required.');
            if (!newPassword.value.trim()) newPassword.classList.add('rpw-invalidField');
            if (!confirmPassword.value.trim()) confirmPassword.classList.add('rpw-invalidField');
            return;
        }

        if (newPassword.value.length <= 3) {
            e.preventDefault();
            rpwShowNotice('Password must be longer than 3 characters.');
            newPassword.classList.add('rpw-invalidField');
            return;
        }

        if (newPassword.value !== confirmPassword.value) {
            e.preventDefault();
            rpwShowNotice('Passwords do not match.');
            newPassword.classList.add('rpw-invalidField');
            confirmPassword.classList.add('rpw-invalidField');
            return;
        }

        rpwClearNotice();
    }

    document.getElementById('rpwForm').addEventListener('submit', rpwHandleSubmit);

    document.getElementById('rpwNewPassword').addEventListener('input', rpwClearNotice);
    document.getElementById('rpwConfirmPassword').addEventListener('input', rpwClearNotice);
</script>