<div class="quiz-component">

  <div class="text-right">
    <button wire:key="create" wire:click="create()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      New
    </button>
  </div>

  <div>
    @if( $isModalOpen )
      @include( 'livewire.quiz-form' )
    @endif
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quiz-Master</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quiz-Winner</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($items as $item)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">{{$item->number}}</div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  @if( $item->quizMaster )
                    <div class="text-sm text-gray-900">{{$item->quizMaster->name}}</div>
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  @if( $item->quizWinner )
                    <div class="text-sm text-gray-900">{{$item->quizWinner->name}}</div>
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  @if( $item->is_online )
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Online </span>
                  @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Offline </span>
                  @endif                
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <button wire:key="edit{{ $item->id }}" wire:click="edit({{$item->id}})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                  <button wire:key="delete{{ $item->id }}" wire:click="delete({{$item->id}})" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                </td>
              </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>