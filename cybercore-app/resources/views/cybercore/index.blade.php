<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberCore Chronicles // Security_Intelligence</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Share Tech Mono', monospace;
            background-color: #05070a;
        }
        .neon-border {
            box-shadow: 0 0 10px #00ff66, inset 0 0 5px #00ff66;
        }
        .neon-text-cyan {
            text-shadow: 0 0 8px #00f0ff;
        }
    </style>
</head>
<body class="text-gray-300 min-h-screen border-t-4 border-green-500">

    <header class="container mx-auto max-w-6xl p-6 flex flex-col md:flex-row justify-between items-center border-b border-green-900 gap-4">
        <div>
            <h1 class="text-3xl font-bold tracking-widest text-green-400 neon-text-cyan">
                CYBERCORE_CHRONICLES // v1.0.26
            </h1>
            <p class="text-xs text-cyan-400 tracking-wider">SISTEMA DINÁMICO DE INTELIGENCIA CONTRA AMENAZAS</p>
        </div>
       <div class="w-full md:w-auto text-center">
    <span class="text-xs text-green-500 block mb-1">// AMBIENTACIÓN_HACKER:</span>
    <iframe class="max-w-xs mx-auto rounded-lg border border-cyan-500/30" 
        width="100%" 
        height="90" 
        src="https://www.youtube.com/embed/gaIEuFHyW9g" 
        title="Cyberpunk Ambient" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        allowfullscreen>
    </iframe>
</div>
    </header>

    <main class="container mx-auto max-w-6xl p-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <section class="lg:col-span-1 bg-slate-900/60 p-6 rounded border border-green-500/30 shadow-lg">
            <h2 class="text-xl font-bold mb-4 text-green-400 flex items-center gap-2">
                <span class="animate-pulse">🔴</span> INYECTAR_AMENAZA
            </h2>

            @if(session('success'))
                <div class="bg-green-900/50 border border-green-500 text-green-300 p-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('cybercore.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs text-cyan-400 mb-1">ALIAS_DEL_ATAQUE</label>
                    <input type="text" name="alias" required placeholder="Ej: WannaCry, Stuxnet" 
                        class="w-full bg-black border border-green-500/50 rounded p-2 text-green-400 focus:outline-none focus:border-cyan-400">
                </div>

                <div>
                    <label class="block text-xs text-cyan-400 mb-1">TIPO_DE_VULNERABILIDAD</label>
                    <input type="text" name="type" required placeholder="Ej: Ransomware, APT, Zero-Day" 
                        class="w-full bg-black border border-green-500/50 rounded p-2 text-green-400 focus:outline-none focus:border-cyan-400">
                </div>

                <div>
                    <label class="block text-xs text-cyan-400 mb-1">NIVEL_DE_RIESGO</label>
                    <select name="risk_level" required 
                        class="w-full bg-black border border-green-500/50 rounded p-2 text-green-400 focus:outline-none focus:border-cyan-400">
                        <option value="Crítico">CRÍTICO 💀</option>
                        <option value="Alto">ALTO ⚠️</option>
                        <option value="Medio">MEDIO 🟨</option>
                        <option value="Bajo">BAJO 🟩</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs text-cyan-400 mb-1">REPORTE_TECNICO (DESCRIPCIÓN)</label>
                    <textarea name="description" rows="3" required placeholder="Describe el comportamiento del exploit..." 
                        class="w-full bg-black border border-green-500/50 rounded p-2 text-green-400 focus:outline-none focus:border-cyan-400"></textarea>
                </div>

                <div>
                    <label class="block text-xs text-cyan-400 mb-1">URL_RECURSO_NUBE</label>
                    <input type="url" name="cloud_link" required placeholder="https://drive.google.com/... o https://youtube.com/..." 
                        class="w-full bg-black border border-green-500/50 rounded p-2 text-cyan-300 focus:outline-none focus:border-cyan-400 text-sm">
                    <span class="text-[10px] text-gray-500 block mt-1">Enlace funcional a Google Drive, OneDrive, Mega o Video de YouTube.</span>
                </div>

                <button type="submit" 
                    class="w-full bg-green-600 hover:bg-cyan-500 text-black font-bold py-2 px-4 rounded transition-colors tracking-widest uppercase text-sm">
                    EJECUTAR_REGISTRO();
                </button>
            </form>
        </section>

        <section class="lg:col-span-2 space-y-4">
            <h2 class="text-xl font-bold text-cyan-400 flex items-center gap-2">
                <span>📂</span> BASE_DE_DATOS_ACTIVA ({{ $threats->count() }})
            </h2>

            @if($threats->isEmpty())
                <div class="border border-dashed border-gray-700 p-8 text-center rounded text-gray-500">
                    [SISTEMA_VACÍO]: No hay registros detectados. Inyecta la primera amenaza para iniciar el monitoreo.
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($threats as $threat)
                        <div class="bg-black/80 border border-green-500/30 rounded p-4 flex flex-col justify-between hover:border-cyan-400 transition-colors">
                            <div>
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-lg font-bold text-green-400 tracking-wide">{{ $threat->alias }}</span>
                                    <span class="px-2 py-0.5 text-xs rounded font-bold uppercase 
                                        {{ $threat->risk_level == 'Crítico' ? 'bg-red-900 text-red-300 border border-red-500' : '' }}
                                        {{ $threat->risk_level == 'Alto' ? 'bg-orange-900 text-orange-300 border border-orange-500' : '' }}
                                        {{ $threat->risk_level == 'Medio' ? 'bg-yellow-900 text-yellow-200 border border-yellow-500' : '' }}
                                        {{ $threat->risk_level == 'Bajo' ? 'bg-green-900 text-green-300 border border-green-500' : '' }}
                                    ">
                                        {{ $threat->risk_level }}
                                    </span>
                                </div>
                                <p class="text-xs text-cyan-400 mb-2 uppercase tracking-tight">TIPO: {{ $threat->type }}</p>
                                <p class="text-sm text-gray-400 mb-4 bg-slate-950 p-2 rounded border border-gray-900 leading-relaxed">
                                    {{ $threat->description }}
                                </p>
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center pt-2 border-t border-gray-900 gap-2">
                                <a href="{{ $threat->cloud_link }}" target="_blank" 
                                   class="text-xs bg-cyan-950 text-cyan-400 border border-cyan-500/50 hover:bg-cyan-500 hover:text-black py-1 px-3 rounded text-center transition-all flex items-center justify-center gap-1">
                                    🔗 VER_RECURSO
                                </a>

                                <form action="{{ route('cybercore.destroy', $threat->id) }}" method="POST" onsubmit="return confirm('[ALERTA]: ¿Seguro que deseas purgar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-xs text-red-500 hover:text-red-300 text-center py-1 sm:px-2 block">
                                        [ELIMINAR]
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    <footer class="text-center text-xs text-gray-600 py-8 border-t border-gray-950 mt-12">
        // MARGARITA GARCÍA // PORTAL DE INTELIGENCIA CONTRA AMENAZAS
    </footer>
</body>
</html>