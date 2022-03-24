{{-- alpin js: usage of 'isDrawerOpen' variable --}}
<nav class="flex fixed w-full items-center justify-between px-6 h-16 bg-white text-gray-700 border-b border-gray-200 z-10">
  
  {{-- Side Drawer Opener --}}
  <div class="flex items-center">
    <button class="mr-3" aria-label="Open Menu" x-on:click="isDrawerOpen = !isDrawerOpen">
      <svg
        fill="none"
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        viewBox="0 0 24 24"
        class="w-8 h-8">
        <path d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
    
    <a href="{{ route('home') }}" class="ml-3">
      <img src="/img/logo.svg" alt="Logo" class="h-auto w-8" />
    </a>
  </div>

  {{-- Top Navigation --}}
  @if (Route::has('login'))
    <div class="flex items-center">
      <div class="hidden md:flex md:justify-between md:bg-transparent">
        @guest
          <x-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            Login
          </x-link>

          @if (Route::has('register'))
            <x-link href="{{ route('register') }}" class="ml-2" :active="request()->routeIs('register')">
              Register
            </x-link>
          @endif
        @endguest
        @auth
        <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
        @endauth
      </div>
    </div>
  @endif

  {{-- Side Drawer Background --}}
  <div x-show="isDrawerOpen" class="z-10 fixed inset-0 transition-opacity">
    <div x-on:click="isDrawerOpen = false" class="absolute inset-0 bg-black opacity-50" tabindex="0"></div>
  </div>

  {{-- Side Drawer --}}
  <aside
    class="transform top-0 left-0 w-64 bg-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30 -translate-x-full"
    :class="{ 'translate-x-0': isDrawerOpen, '-translate-x-full': ! isDrawerOpen }">
    <span
      x-on:click="isDrawerOpen = false"
      class="flex w-full items-center h-16 border-b">
      <span class="mx-auto font-semibold">Navigation</span>
    </span>
    @auth
      <a href="{{ route('dashboard') }}"
        x-on:click="isDrawerOpen = false"
        class="flex items-center p-4 hover:bg-lime-500 hover:text-white">
        <span class="mr-2">
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-6 w-6" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor" 
            stroke-width="2"
            stroke-linecap="round" 
            stroke-linejoin="round">
            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
          </svg>
        </span>
        <span>{{ __('Dashboard') }}</span>
      </a>
    @endauth
    <a href="{{ route('home') }}"
      x-on:click="isDrawerOpen = false"
      class="flex items-center p-4 hover:bg-lime-500 hover:text-white">
      <span class="mr-2">
        <svg
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          class="w-6 h-6">
          <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
      </span>
      <span>Home</span>
    </a>
    <div class="fixed bottom-0 w-full">
      <button class="flex items-center p-4 text-white bg-lime-500 hover:bg-lime-600 w-full">
        <svg
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          stroke="currentColor"
          viewBox="0 0 24 24"
          class="h-6 w-6 mr-2">
          <path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
        </svg>
        <span>Share</span>
      </button>
    </div>
  </aside>
</nav>
