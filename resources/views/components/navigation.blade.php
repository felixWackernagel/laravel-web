{{-- alpin js: usage of 'isDrawerOpen' variable --}}
<nav class="fixed left-0 xl:left-64 right-0 flex items-center justify-between px-6 h-16 bg-white text-gray-700 border-b border-gray-200 z-10">
  
  {{-- Side Drawer Opener --}}
  <div class="flex items-center">
    <button class="mr-6 xl:hidden" aria-label="Open Menu" x-on:click="isDrawerOpen = !isDrawerOpen">
      <x-svg.menu />
    </button>
    
    <a href="{{ route('home') }}" title="{{ config('app.name', 'Laravel') }}">
      <img src="/img/logo.svg" alt="Logo" class="h-auto w-8" />
    </a>
   
    @if( !empty($title) )
      <span class="ml-6 font-semibold text-xl text-gray-800 leading-tight">
        {{ $title }}
      </span>
    @endif

  </div>

  {{-- Top Navigation --}}
  @if (Route::has('login'))
    <div class="flex items-center">
      <div class="flex justify-between">
        @guest
          <x-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            @slot( 'icon' ) <x-svg.login /> @endslot
            <span class="hidden sm:inline">{{ __('Login') }}</span>
          </x-link>

          @if (Route::has('register'))
            <x-link href="{{ route('register') }}" class="ml-4" :active="request()->routeIs('register')">
              @slot( 'icon' ) <x-svg.pencil_alt /> @endslot
              <span class="hidden sm:inline">{{ __('Register') }}</span>
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
    class="transform top-0 left-0 w-64 bg-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30 -translate-x-full xl:translate-x-0 xl:border-r"
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
          <x-svg.template />
        </span>
        <span>{{ __('Dashboard') }}</span>
      </a>
    @endauth
    <a href="{{ route('home') }}"
      x-on:click="isDrawerOpen = false"
      class="flex items-center p-4 hover:bg-lime-500 hover:text-white">
      <span class="mr-2">
        <x-svg.home />
      </span>
      <span>Home</span>
    </a>
    <a href="{{ route('dkq') }}"
      x-on:click="isDrawerOpen = false"
      class="flex items-center p-4 hover:bg-lime-500 hover:text-white">
      <span class="mr-2">
        <x-svg.academic_cap />
      </span>
      <span>DKQ</span>
    </a>
    <div class="fixed bottom-0 w-full">
      <button class="flex items-center p-4 text-white bg-lime-500 hover:bg-lime-600 w-full">
        <x-svg.share />
        <span>Share</span>
      </button>
    </div>
  </aside>
</nav>
