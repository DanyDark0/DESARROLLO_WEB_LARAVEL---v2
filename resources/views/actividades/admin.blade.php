<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Administración de Actividades</h1>
        
        <!-- Botón para crear nueva actividad -->
        <a href="{{ route('actividades.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold  py-2 px-4 rounded mb-4 inline-block">
            <button>Nueva Actividad</button>
        </a>
        
        <!-- Tabla de actividades -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Título</th>
                        <th class="py-3 px-6 text-left">Fecha</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($actividades as $actividad)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $actividad->id }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap overflow-hidden truncate max-w-[200px]">{{ Str::limit($actividad->titulo, 80, '...') }}</td>
                            <td class="py-3 px-6 text-left">{{ $actividad->fecha }}</td>
                            <td class="py-3 px-6 text-center">

                                {{-- Dropdown de Acciones --}}
                            <div x-data="{ open: false }" class="relative inline-block">
                                    <button @click="open = !open" class="bg-gray-500 hover:bg-gray-600 text-white py-1 px-3 rounded text-sm">
                                        Opciones ▼
                                    </button>

                                {{-- contenido del dropdown --}}
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-36 bg-white border border-gray-300 rounded shadow-md z-10 flex flex-col">
                                {{-- Editar --}}
                                <a href="{{ route('actividades.edit', $actividad->slug) }}" class="block bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded text-sm inline-block">Editar</a>
                                {{-- Eliminar --}}
                                <form action="{{ route('actividades.destroy', $actividad->slug) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded text-left text-sm" onclick="return confirm('¿Estás seguro de eliminar esta actividad?');">Eliminar</button>
                                </form>
                            </div>
                        </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Paginación -->
        <div class="flex justify-center mt-6">
            {{ $actividades->links() }}
        </div>
    </div>
</x-app-layout>