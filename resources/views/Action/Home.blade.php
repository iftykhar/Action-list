<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listed Actions Below') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Hold/Done
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($actions as $action)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $action->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $action->content }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- @if ({{ $action->status }} == 0)
                                            Hold
                                        @else
                                            Done
                                        @endif --}}
                                        @if(  $action->status  == 0 )
                                            Hold
                                        @else
                                            Done
                                        @endif


                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="{{ route('Action.edit',$action->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('Action.destroy',$action->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="font-medium text-red-600 dark:text-blue-500 hover:underline">
                                        </form>
                                        <a href="{{ route('Action.show',$action->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                    </td>
                                </tr>
                                @empty

                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
