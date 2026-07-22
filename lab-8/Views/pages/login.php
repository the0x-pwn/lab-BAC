<div class="aurora">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="blob blob-4"></div>
</div>
<div class="grid-overlay"></div>
<div id="particles" class="fixed inset-0 z-[1] pointer-events-none"></div>

<main class="relative z-10 w-full max-w-md fade-up">
    <div class="flex flex-col items-center mb-6">
        <div class="w-16 h-16 rounded-2xl logo-ring p-[2px] mb-4">
            <div class="w-full h-full rounded-2xl bg-[#0A0E1A] flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path
                        d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09a1.65 1.65 0 001.51-1 1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z" />
                </svg>
            </div>
        </div>
        <h1 class="text-2xl font-bold text-white tracking-tight" style="font-family:'Space Grotesk',sans-serif;">
            Welcome Back</h1>
        <p class="text-sm text-red-500 mt-1">Lab: Username enumeration via different responses</p>
    </div>

    <form id="loginForm" novalidate class="glass rounded-3xl p-8" method="post" action="/login">

        <div class="mb-5">
            <label for="username" class="block text-sm text-white/70 mb-2">Username</label>
            <div class="relative">
                <input id="username" type="text" name="username" autocomplete="username"
                    class="field w-full rounded-xl py-3 pl-11 pr-4 text-white placeholder-white/30 text-sm"
                    placeholder="Enter your username">
                <svg class="absolute top-1/2 -translate-y-1/2 left-3.5 w-5 h-5 text-white/40" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.7">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </div>
            <p class="err-msg text-xs text-[#FF5D8F]" id="usernameErr">Please enter your username</p>
        </div>

        <div class="mb-2">
            <label for="password" class="block text-sm text-white/70 mb-2">Password</label>
            <div class="relative">
                <input id="password" type="password" name="password" autocomplete="current-password"
                    class="field w-full rounded-xl py-3 pl-11 pr-11 text-white placeholder-white/30 text-sm"
                    placeholder="Enter your password">
                <svg class="absolute top-1/2 -translate-y-1/2 left-3.5 w-5 h-5 text-white/40" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.7">
                    <rect x="4" y="10" width="16" height="10" rx="2" />
                    <path d="M8 10V7a4 4 0 118 0v3" />
                </svg>
                <button type="button" id="togglePass" tabindex="-1"
                    class="absolute top-1/2 -translate-y-1/2 right-3.5 text-white/40 hover:text-white/70 transition">
                    <svg id="eyeIcon" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.7">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
            </div>
            <p class="err-msg text-xs text-[#FF5D8F]" id="passwordErr">Please enter your password</p>
        </div>

        <br>

        <button type="submit" id="submitBtn"
            class="btn-gradient w-full rounded-xl py-3 text-white font-semibold text-sm flex items-center justify-center gap-2">
            <span id="btnText">Sign In</span>
            <svg id="btnSpinner" class="hidden w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.4 0 0 5.4 0 12h4z" />
            </svg>
        </button>
        <br>
        <button type="button" id="submitBtn" onclick="window.location.href='/solution'"
            class="btn-gradient w-full rounded-xl py-3 text-white font-semibold text-sm flex items-center justify-center gap-2">

            <span id="btnText">Solution</span>

            <svg id="btnSpinner" class="hidden w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.4 0 0 5.4 0 12h4z" />
            </svg>
        </button>
    </form>
</main>