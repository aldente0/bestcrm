<div class="flex flex-col w-10/12 mx-auto">
    <div class="sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div>
          <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        @foreach ($headers as $header)
                            <th scope="col" class="px-2 py-4">{{ $header }}</th>
                        @endforeach
                        <th scope="col"></th>
                    </tr>
                </thead>
            <tbody>
                {{ $slot }}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
