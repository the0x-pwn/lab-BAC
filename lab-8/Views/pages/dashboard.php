    <div class="relative z-10 w-full max-w-lg">
        <div class="glass rounded-3xl p-10 fade-up">

            <div class="flex justify-center mb-6">
                <div class="p-[3px] rounded-full">
                    <div class="w-20 h-20 rounded-full bg-[#0A0E1A] flex items-center justify-center text-4xl">
                        🏁
                    </div>
                </div>
            </div>

            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-3">
                    Challenge Completed
                </h1>

                <p class="text-slate-300 mb-8">
                    Congratulations! You successfully solved this lab.
                </p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-2xl p-5 mb-6">
                <div class="text-xs uppercase tracking-[0.25em] text-cyan-300 mb-3">
                    Flag
                </div>

                <div class="font-mono text-center text-lg text-white break-all">
                    FLAG{29f611dc9278d27fb428da6aaef2aa}
                </div>
            </div>

            <div class="rounded-2xl border border-green-500/20 bg-green-500/10 p-4">
                <div class="text-green-300 text-sm text-center mb-3">
                    ✓ Lab solved successfully
                </div>
            </div>
            <br>
            <form action="/logout" method="POST">
                <button type="submit"
                    class="w-full py-2 rounded-xl bg-red-500/20 border border-red-500/30 text-red-300 hover:bg-red-500/30 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>