<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>
    <div class="absolute top-16 right-1/2" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 1500)">
    @if (session()->has('status'))
        <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session()->get('status') }}</div>
        </div>
    @endif
    </div>
    {{-- TODO add simply table to show orders --}}
    <x-table.table class="" :headers="['Name', 'Email']">
        @isset($clients)
            @foreach ($clients as $client)
                <tr class="border-b dark:border-neutral-500">
                    <x-table.td>{{$client->name}}</x-table.td>
                    <x-table.td>{{$client->email}}</x-table.td>
                    <x-table.td>
                        @if ($client->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <form method="POST" action="{{ route('clients.destroy', $client) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('clients.destroy', $client)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </x-table.td>
                </tr>
            @endforeach
        @endisset
    </x-table.table>
    {{-- <div class="flex flex-col w-10/12 mx-auto">
        <div class="sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div>
              <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-2 py-4">Name</th>
                            <th scope="col" class="px-2 py-4">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                <tbody>
                    @isset($clients)
                        @foreach ($clients as $client)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-4">{{$client->name}}</td>
                                <td class="flex whitespace-nowrap px-2 py-4">{{$client->email}}</td>
                                <td>
                                    @if ($client->user->is(auth()->user()))
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <form method="POST" action="{{ route('clients.destroy', $client) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('clients.destroy', $client)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
</x-app-layout>
