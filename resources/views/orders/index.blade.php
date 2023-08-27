<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>

    </x-slot>
    @if (session()->has('status'))
        <x-notification.notification>
            <div class="ml-3 text-sm font-normal">{{ session()->get('status') }}</div>
        </x-notification.notification>
    @endif
    {{-- TODO add simply table to show orders --}}
    <x-table.table :headers="['Product', 'Customer', 'Price', 'Quantity', 'Cost', 'Created at']">
        @isset($orders)
            @foreach ($orders as $order)
                <tr class="border-b dark:border-neutral-500">
                    <x-table.td>{{$order->product}}</x-table.td>
                    <x-table.td>{{$order->client->name}}</x-table.td>
                    <x-table.td>{{$order->price / 100}}₽</x-table.td>
                    <x-table.td>{{$order->quantity}}</x-table.td>
                    <x-table.td>{{$order->price * $order->quantity / 100}}₽</x-table.td>
                    <x-table.td>{{$order->created_at}}</x-table.td>
                    <x-table.td>
                        @if ($order->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <form method="POST" action="{{ route('orders.destroy', $order) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('orders.destroy', $order)" onclick="event.preventDefault(); this.closest('form').submit();">
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
