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
    <table class=" bg-white mx-auto">
        <thead>
            <tr>
                <th class="w-48 border border-slate-300 ...">Наименование</th>
                <th class="w-48 border border-slate-300 ...">Цена в руб.</th>
                <th class="w-48 border border-slate-300 ...">Количество</th>
                <th class="w-48 border border-slate-300 ...">Стоимость в руб.</th>
                <th class="w-48 border border-slate-300 ...">Дата создания</th>
            </tr>
        </thead>
        <tbody>
            @isset($orders)
                @foreach ($orders as $order)
                    <tr>
                        <td class="pl-2 border border-slate-300 ...">{{$order->product}}</td>
                        <td class="pl-2 border border-slate-300 ...">{{$order->price / 100}}</td>
                        <td class="pl-2 border border-slate-300 ...">{{$order->quantity}}</td>
                        <td class="pl-2 border border-slate-300 ...">{{$order->price * $order->quantity / 100}}</td>
                        <td class="pl-2  pr-5 border border-slate-300 ...">{{$order->created_at}}</td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
      </table>
</x-app-layout>
