{{-- alpin js: usage of 'isDrawerOpen' variable --}}
<nav class="fixed left-0 xl:left-64 right-0 flex items-center justify-between px-6 h-16 bg-white text-gray-700 z-10 shadow-sm shadow-gray-200">
  
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
            <span class="hidden sm:inline">{{ __('page.navigation_login') }}</span>
          </x-link>

          @if (Route::has('register'))
            <x-link href="{{ route('register') }}" class="ml-4" :active="request()->routeIs('register')">
              @slot( 'icon' ) <x-svg.pencil_alt /> @endslot
              <span class="hidden sm:inline">{{ __('page.navigation_register') }}</span>
            </x-link>
          @endif
        @endguest
        @auth
          <div class="ml-3 relative">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if( Laravel\Jetstream\Jetstream::managesProfilePhotos() )
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
                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('page.navigation_profile') }}
                    </x-jet-dropdown-link>

                    @if( Laravel\Jetstream\Jetstream::hasApiFeatures() )
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('page.navigation_api') }}
                        </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                  @click.prevent="$root.submit();">
                            {{ __('page.navigation_logout') }}
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
    class="transform top-0 left-0 w-64 bg-lime-600 text-white fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30 -translate-x-full xl:translate-x-0 xl:border-r"
    :class="{ 'translate-x-0': isDrawerOpen, '-translate-x-full': ! isDrawerOpen }">
    <a href="{{ route('home') }}"
      x-on:click="isDrawerOpen = false"
      @class([
        'flex items-center my-2 mx-3 p-3 rounded-sm font-semibold tracking-wide',
        'bg-lime-500 text-white' => request()->routeIs('home'),
        'text-lime-200 hover:bg-lime-500 hover:text-white' => !request()->routeIs('home')
      ])>
      <span class="mr-3">
        <x-svg.home />
      </span>
      <span>{{ __('page.welcome_title') }}</span>
    </a>
    <a href="{{ route('dkq') }}"
      x-on:click="isDrawerOpen = false"
      @class([
        'flex items-center mb-3 mx-3 p-3 rounded-sm font-semibold tracking-wide',
        'bg-lime-500 text-white' => request()->routeIs('dkq'),
        'text-lime-200 hover:bg-lime-500 hover:text-white' => !request()->routeIs('dkq')
      ])>
      <span class="mr-3">
        <x-svg.academic_cap />
      </span>
      <span>{{ __('page.dkq_title') }}</span>
    </a>
    @auth
      <a href="{{ route('dashboard') }}"
        x-on:click="isDrawerOpen = false"
        @class([
        'flex items-center mb-2 mx-3 p-3 rounded-sm font-semibold tracking-wide',
        'bg-lime-500 text-white' => request()->routeIs('dashboard'),
        'text-lime-200 hover:bg-lime-500 hover:text-white' => !request()->routeIs('dashboard')
        ])>
        <span class="mr-3">
          <x-svg.template />
        </span>
        <span>{{ __('page.dashboard_title') }}</span>
      </a>
    @endauth
    {{-- Side Drawer Bottom Links --}}
    {{-- <div class="fixed bottom-0 w-full"></div> --}}
  </aside>
</nav>
