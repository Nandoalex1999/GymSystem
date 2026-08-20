<nav x-data="{ open: false }" class="bg-gray-900 border-b border-red-600 shadow-lg">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            {{-- Logo y navegación --}}
            <div class="flex items-center gap-6">

                {{-- Logo --}}
                <a href="{{ route('dashboard') }}"
                   class="text-2xl font-bold text-red-500">
                    GymSystem
                </a>


                {{-- Opciones exclusivas para clientes --}}
                @if(Auth::user()->cliente)

                    {{-- Mis Rutinas --}}
                    <a href="{{ route('cliente.rutinas.index') }}"
                       class="text-gray-300 hover:text-red-500 transition font-medium">
                        Mis Rutinas
                    </a>


                    {{-- Mi Alimentación --}}
                    <a href="{{ route('cliente.alimentacion.index') }}"
                       class="text-gray-300 hover:text-red-500 transition font-medium">
                        Mi Alimentación
                    </a>

                @endif

            </div>


            {{-- Usuario --}}
            <div class="flex items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-700 transition">

                            <span>{{ Auth::user()->name }}</span>

                            <svg class="ml-2 h-4 w-4 fill-current"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">

                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>

                            </svg>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        <div class="px-4 py-2 text-sm text-gray-600">
                            {{ Auth::user()->email }}
                        </div>

                        <hr>


                        {{-- Cerrar sesión --}}
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                         this.closest('form').submit();">

                                Cerrar Sesión

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

        </div>

    </div>

</nav>