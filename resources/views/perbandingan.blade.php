<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Iteratif</title>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-900">

    <div class="flex flex-col items-center gap-4 text-center">

        <h1 class="text-xl md:text-2xl font-semibold text-slate-200">
            Input angka untuk dihitung faktorialnya:
        </h1>

        <div class="flex gap-3">
            <input
                id="numberInput"
                type="number"
                min="0"
                step="1"
                placeholder="Masukkan angka"
                class="w-56 px-4 py-3 rounded-lg bg-slate-800 text-white
                       border border-slate-600 focus:outline-none
                       focus:ring-2 focus:ring-indigo-500"
                oninput="validateInput()"
            >

            <button
                id="submitBtn"
                disabled
                class="px-5 py-3 bg-red-600 text-white font-semibold rounded-lg
                       hover:bg-red-500 opacity-50 cursor-not-allowed transition">
                Hitung
            </button>
        </div>

        <p id="errorMsg" class="text-sm text-red-500 hidden">
            Angka tidak boleh kurang dari 0
        </p>

        <a href="/"
           class="text-slate-400 hover:text-white transition text-sm mt-2">
            ← Kembali ke Beranda
        </a>

    </div>

    <script>
        function validateInput() {
            const input = document.getElementById('numberInput');
            const error = document.getElementById('errorMsg');
            const button = document.getElementById('submitBtn');

            // kondisi tidak valid
            if (
                input.value === '' ||
                input.value.startsWith('-')
            ) {
                button.disabled = true;
                button.classList.add('opacity-50', 'cursor-not-allowed');
                error.classList.toggle('hidden', !input.value.startsWith('-'));
                return;
            }

            // valid
            button.disabled = false;
            button.classList.remove('opacity-50', 'cursor-not-allowed');
            error.classList.add('hidden');
        }
    </script>

</body>
</html>
