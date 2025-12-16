<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    <title>Beranda</title>
</head>
<body class="min-h-screen flex items-center justify-center bg-slate-900">
    <div class="flex flex-col items-center gap-8 text-center">

        <img src="{{ asset('images/image.png') }}"
            alt="Logo"
            class="w-32 mb-1">

        <h1 class="text-xl md:text-2xl font-semibold text-slate-100">
            Pengujian Algoritma Perhitungan Faktorial<br>
            Menggunakan:
        </h1>

        <div class="flex gap-6">
            <a href="/iteratif"
            class="px-7 py-3 bg-indigo-600 text-white font-semibold rounded-lg
                    hover:bg-indigo-500 transition shadow-lg shadow-indigo-500/30">
                Iteratif
            </a>

            <a href="/perbandingan"
            class="px-7 py-3 bg-red-600 text-white font-semibold rounded-lg
                    hover:bg-red-500 transition shadow-lg shadow-red-500/30">
                Perbandingan
            </a>

            <a href="/rekursif"
            class="px-7 py-3 bg-emerald-600 text-white font-semibold rounded-lg
                    hover:bg-emerald-500 transition shadow-lg shadow-emerald-500/30">
                Rekursif
            </a>
        </div>

    </div>
</body>
</html>
