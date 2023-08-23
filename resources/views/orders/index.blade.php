<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
        {{-- <div class="justify-between flex mt-3 h-28 width-[900] mx-auto">
            <div>Кол-во заказов: {{count($orders)}}</div>
            <div>Общая сумма товара: <?php
                /* $sum = 0;
                $quantity = 0;
                foreach ($orders as $order) {
                    $quantity += $order->quantity;
                    $sum += $order->price * $order->quantity / 100;
                } */
            ?> {{$sum}}</div>
            <div>Кол-во проданного товара: {{$quantity}}</div>

        </div> --}}
    </x-slot>
    {{-- TODO add simply table to show orders --}}
    <div class="flex flex-col w-10/12 mx-auto">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">Product</th>
                    <th scope="col" class="px-6 py-4">Customer</th>
                    <th scope="col" class="px-6 py-4">price in rubles</th>
                    <th scope="col" class="px-6 py-4">Quantity</th>
                    <th scope="col" class="px-6 py-4">Cost</th>
                    <th scope="col" class="px-6 py-4">Created at</th>
                  </tr>
                </thead>
                <tbody>
                  @isset($orders)
                    @foreach ($orders as $order)
                    <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4">{{$order->product}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$order->client->name}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$order->price / 100}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$order->quantity}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$order->price * $order->quantity / 100}}</td>
                        <td class="flex whitespace-nowrap px-6 py-4">{{$order->created_at}}
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
                        </td>
                    </tr>
                    @endforeach
                  @endisset
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
