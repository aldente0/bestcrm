<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>
    {{-- TODO add simply table to show orders --}}
    <div class="flex flex-col w-10/12 mx-auto">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">Имя</th>
                  </tr>
                </thead>
                <tbody>
                  @isset($clients)
                    @foreach ($clients as $client)
                    <tr class="border-b dark:border-neutral-500">
                      <td class="whitespace-nowrap px-6 py-4">{{$client->name}}</td>
                    </tr>
                    @endforeach
                  @endisset

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <x-text color="red">
            some text
        </x-text>
      </div>
</x-app-layout>
