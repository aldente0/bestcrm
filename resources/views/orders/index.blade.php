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
                    <th scope="col" class="px-6 py-4">Наименование</th>
                    <th scope="col" class="px-6 py-4">Цена в руб.</th>
                    <th scope="col" class="px-6 py-4">Количество</th>
                    <th scope="col" class="px-6 py-4">Стоимость</th>
                    <th scope="col" class="px-6 py-4">Дата создания</th>
                  </tr>
                </thead>
                <tbody>
                  @isset($orders)
                    @foreach ($orders as $order)
                    <tr class="border-b dark:border-neutral-500">
                      <td class="whitespace-nowrap px-6 py-4">{{$order->product}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->price / 100}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->quantity}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->price * $order->quantity / 100}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->created_at}}</td>
                    </tr>
                    @endforeach
                  @endisset

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <x-text>
            some text
        </x-text>
      </div>
</x-app-layout>
