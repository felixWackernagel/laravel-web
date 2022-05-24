<div class="modal z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50"></div>

      <form class="modal-content py-4 text-left px-6">

        <!--Title-->
        <div class="flex justify-between items-center pb-3">
            <p class="text-lg font-bold text-gray-600 hover:text-gray-500">
                @if ( is_null( $quiz_id ) )
                    {{ __( 'dkq.quiz_new' ) }}
                @else
                    {{ __( 'dkq.quiz_update' ) }}
                @endif
            </p>
            
            <button wire:click="closeModal" type="button" class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-gray-600" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
            </button>
        </div>

        <!--Body-->
        <label class="block mb-3" for="numberInput">
            <span class="text-gray-700">{{__('dkq.quiz_number')}}</span>
            <input wire:model="number" type="number" id="numberInput" class="
                mt-1
                block
                w-full
                rounded-md
                bg-gray-100
                border-transparent
                focus:border-gray-500 focus:bg-white focus:ring-0">
            @error('number') 
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </label>

        <label class="block mb-3" for="winnerInput">
            <span class="text-gray-700">{{ __('dkq.quiz_winner') }}</span>
            <select wire:model="quiz_winner" id="winnerInput" class="
                block
                w-full
                mt-1
                rounded-md
                bg-gray-100
                border-transparent
                focus:border-gray-500 focus:bg-white focus:ring-0
                ">
                <option value=""></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('quiz_winner') 
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </label>

        <label class="block" for="masterInput">
            <span class="text-gray-700">{{ __('dkq.quiz_master') }}</span>
            <select wire:model="quiz_master" id="masterInput" class="
                block
                w-full
                mt-1
                rounded-md
                bg-gray-100
                border-transparent
                focus:border-gray-500 focus:bg-white focus:ring-0
                ">
                <option value=""></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('quiz_winner') 
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </label>

        <!--Footer-->
        <div class="flex justify-end pt-3">
          <button wire:click="closeModal" type="button" class="px-4 bg-transparent p-3 rounded-lg text-lime-500 font-bold hover:bg-gray-100 hover:text-lime-600 mr-2">
              {{ __( 'dkq.quiz_close' ) }}
            </button>
          <button wire:click.prevent="store" type="button" class="modal-close px-4 bg-lime-500 p-3 rounded-lg text-white font-bold hover:bg-lime-600">
              {{ __( 'dkq.quiz_save' ) }}
            </button>
        </div>
        
    </form>
    </div>
  </div>