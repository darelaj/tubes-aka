<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Rekursif</title>
</head>

<body class="min-h-screen flex items-center justify-center bg-slate-900">

    <div class="flex flex-col items-center gap-4 text-center">

        <h1 class="text-xl md:text-2xl font-semibold text-slate-200">
            Input angka untuk dihitung faktorialnya
        </h1>

        @if (session()->has('hasil'))
            <div class="p-4 text-white rounded-lg bg-slate-800">
                <h1 class="text-2xl md:text-3xl font-bold">
                    Faktorial dari {{ session('number') }} adalah {{ session('hasil') }}
                </h1>
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('calculate.rekursif') }}" class="flex gap-3 items-start">
            @csrf

            <input id="numberInput" name="number" type="number" min="0" step="1"
                value="{{ old('number') }}" placeholder="Masukkan angka"
                class="w-56 px-4 py-3 rounded-lg bg-slate-800 text-white
                       border border-slate-600 focus:outline-none
                       focus:ring-2 focus:ring-emerald-500"
                oninput="validateInput()">

            <button id="submitBtn" type="submit" disabled
                class="px-5 py-3 bg-emerald-600 text-white font-semibold rounded-lg
                       hover:bg-emerald-500 opacity-50 cursor-not-allowed transition">
                Hitung
            </button>
        </form>

        <p id="errorMsg" class="text-sm text-red-500 hidden">
            Angka tidak boleh kurang dari 0
        </p>
        
        <a href="/" class="text-slate-400 hover:text-white transition text-sm mt-2">
            ← Kembali ke Beranda
        </a>

    </div>

    <script>
        function validateInput() {
            const input = document.getElementById('numberInput');
            const error = document.getElementById('errorMsg');
            const button = document.getElementById('submitBtn');

            if (input.value === '' || input.value.startsWith('-')) {
                button.disabled = true;
                button.classList.add('opacity-50', 'cursor-not-allowed');

                if (input.value.startsWith('-')) {
                    error.classList.remove('hidden');
                } else {
                    error.classList.add('hidden');
                }
                return;
            }

            button.disabled = false;
            button.classList.remove('opacity-50', 'cursor-not-allowed');
            error.classList.add('hidden');
        }

        // auto-validasi saat reload (kalau ada old input)
        validateInput();
    </script>

</body>

</html>
