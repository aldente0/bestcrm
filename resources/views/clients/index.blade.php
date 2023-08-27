<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>
    @if (session()->has('status'))
        <x-notification.notification>
            <div class="ml-3 text-sm font-normal">{{ session()->get('status') }}</div>
        </x-notification.notification>
    @endif
    {{-- TODO add simply table to show orders --}}
    <x-table.table :headers="['Name', 'Email']">
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
</x-app-layout>
