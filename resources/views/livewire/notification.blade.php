<div class="notification-component px-6">
  @foreach( $notifications as $type => $messages )
    @foreach( $messages as $message )
      <div
        :id="$id('notification-component')"
        x-data="{ show: true, close() { this.show = false; setTimeout( () => { $el.parentNode.removeChild( $el ) }, 250 ) }, }"
        x-show="show"
        x-transition.opacity.duration.200ms
        role="alert"
        @class([
          'rounded-lg py-5 px-6 mb-4 text-base inline-flex items-center w-full shadow-sm',
          'bg-green-100 text-green-700' => $type == 'success',
          'bg-red-100 text-red-700' => $type == 'danger',
          'bg-gray-300 text-gray-800' => $type == 'dark',
          'mt-4' => $loop->parent->index == 0 && $loop->index == 0
      ])>
      
      @if( $type == 'success' )
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
      @endif

      @if( $type == 'danger' )
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
      @endif
        
      {{ $message }}

      <button
        x-on:click="close()"
        type="button" 
        aria-label="Close" 
        @class([
          'box-content w-4 h-4 pr-1 pb-1.5 ml-auto border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:opacity-75 hover:no-underline',
          'text-green-900 hover:text-green-900' => $type == 'success',
          'text-red-900 hover:text-red-900' => $type == 'danger',
          'text-gray-800 hover:text-gray-800' => $type == 'dark'
        ])>
        <x-svg.x />
      </button>
    </div>
    @endforeach
  @endforeach
</div>