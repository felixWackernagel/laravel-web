<div class="notification-component">
  @foreach( $notifications as $type => $messages )
    @foreach( $messages as $message )
      <div
        :id="$id('notification-component')"
        x-data="{ show: true, close() { this.show = false; setTimeout( () => { $el.parentNode.removeChild( $el ) }, 250 ) }, }"
        x-show="show"
        x-transition.opacity.duration.200ms
        role="alert"
        @class([
          'rounded-lg py-5 px-6 mb-4 text-base inline-flex items-center w-full',
          'bg-green-100' => $type == 'success',
          'text-green-700' => $type == 'success',
          'bg-red-100' => $type == 'danger',
          'text-red-700' => $type == 'danger',
          'bg-gray-300' => $type == 'dark',
          'text-gray-800' => $type == 'dark'
      ])>

      @if( $type == 'success' )
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      @endif
        
      {{ $message }}

      <button
        @click="close()"
        type="button" 
        aria-label="Close" 
        @class([
          'box-content w-4 h-4 pr-1 pb-1.5 ml-auto border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:opacity-75 hover:no-underline',
          'text-green-900' => $type == 'success',
          'hover:text-green-900' => $type == 'success',
          'text-red-900' => $type == 'danger',
          'hover:text-red-900' => $type == 'danger',
          'text-gray-800' => $type == 'dark',
          'hover:text-gray-800' => $type == 'dark'
        ])>
        <x-svg.x />
      </button>
    </div>
    @endforeach
  @endforeach

<!-- @foreach( ['danger', 'success', 'dark'] as $type )
  @if( session()->has( 'message' . $type ) )
    <div
      wire:key="{{ $loop->index }}"
      :id="$id('notification')"
      x-data="{ show: true, close() { this.show = false; setTimeout( () => { $el.parentNode.removeChild( $el ) }, 250 ) }, }"
      x-show="show"
      x-transition.opacity.duration.200ms
      role="alert"
      @class([
        'rounded-lg py-5 px-6 mb-4 text-base inline-flex items-center w-full',
        'bg-green-100' => $type == 'success',
        'text-green-700' => $type == 'success',
        'bg-red-100' => $type == 'danger',
        'text-red-700' => $type == 'danger',
        'bg-gray-300' => $type == 'dark',
        'text-gray-800' => $type == 'dark'
      ])>

      @if( $type == 'success' )
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      @endif
      
      {{ session('message.' . $type) }}

      <button
        @click="close()"
        type="button" 
        aria-label="Close" 
        @class([
          'box-content w-4 h-4 pr-1 pb-1.5 ml-auto border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:opacity-75 hover:no-underline',
          'text-green-900' => $type == 'success',
          'hover:text-green-900' => $type == 'success',
          'text-red-900' => $type == 'danger',
          'hover:text-red-900' => $type == 'danger',
          'text-gray-800' => $type == 'dark',
          'hover:text-gray-800' => $type == 'dark'
        ])>
        <x-svg.x />
      </button>
    </div>
  @endif
@endforeach -->
</div>
