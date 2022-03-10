<nav class="flex fixed w-full items-center justify-between px-6 h-16 bg-white text-gray-700 border-b border-gray-200 z-10">
  
  {{-- Side Drawer Opener --}}
  <div class="flex items-center">
    <button class="mr-2" aria-label="Open Menu" x-on:click="isDrawerOpen = !isDrawerOpen">
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
    <img src="/logos/fox-hub.png" alt="Logo" class="h-auto w-24" />
  </div>

  {{-- Top Navigation --}}
  <div class="flex items-center">
    <div class="hidden md:flex md:justify-between md:bg-transparent">
      <button class="flex items-center p-3 font-medium mr-2 text-center bg-gray-300 rounded  hover:bg-gray-400 focus:outline-none focus:bg-gray-400">
        <svg
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          stroke="currentColor"
          viewBox="0 0 24 24"
          class="w-6 h-6 mr-2">
          <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
        </svg>
        <span>Wishlist</span>
      </button>
      <button class="flex items-cente p-3 font-medium mr-2 text-center bg-gray-300 rounded  hover:bg-gray-400 focus:outline-none focus:bg-gray-400">
        <svg
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke="currentColor"
          class="w-6 h-6">
          <path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </button>
      <a
        rel="noopener"
        href="https://www.buymeacoffee.com/fayazahmed"
        target="_blank"
        title="Help me keep this site alive"
        class="flex items-center  px-3 py-3 font-medium mr-2 text-center bg-orange-600 rounded text-white hover:bg-orange-700 focus:outline-none focus:bg-orange-400">
        <img class="mr-2 h-6 w-auto" src="/sidebar/bmc.svg" alt="Buy Me Coffee"/>
        <p class="font-bold">Buy me a Coffee</p>
      </a>
    </div>
  </div>

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
      class="flex w-full items-center p-4 border-b">
      <img src="/logos/fox-hub.png" alt="Logo" class="h-auto w-32 mx-auto" />
    </span>
    <span
      x-on:click="isDrawerOpen = false"
      class="flex items-center p-4 hover:bg-indigo-500 hover:text-white">
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
    </span>
    <div class="fixed bottom-0 w-full">
      <button class="flex items-center p-4 text-white bg-blue-500 hover:bg-blue-600 w-full">
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