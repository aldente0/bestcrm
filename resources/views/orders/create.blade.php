<x-app-layout>
    @if (isset($created) && $created == 1)
        <div id="toast-success" class=" mx-auto flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">New order was created</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register New Order') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-2xl mt-9 w-11/12">
        <form action="{{ route('orders.store') }}" method="POST" class="pl-4 rounded-2xl py-6 pr-16 bg-white">
            @csrf
            <div class="mb-6">
                <label for="product" class="block mb-2 text-sm font-medium
                text-gray-900 dark:text-white">Product</label>
                <input name='product' type="text" id="product" class="bg-gray-50 border border-gray-300
                text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                dark:focus:ring-blue-500 dark:focus:border-blue-500" required minlength="2">
            </div>
            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium
                text-gray-900 dark:text-white">Price in rubles</label>
                <input name='price' type="number" step="0.01" id="price" placeholder="0.00" class="bg-gray-50 border border-gray-300
                text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                dark:focus:ring-blue-500 dark:focus:border-blue-500" required minlength="2">
            </div>
            <div class="mb-6">
                <label for="quantity" class="block mb-2 text-sm font-medium
                text-gray-900 dark:text-white">Quantity</label>
                <input name='quantity' type="number" id="quantity" class="bg-gray-50 border border-gray-300
                text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="client_email" class="block mb-2 text-sm font-medium
                text-gray-900 dark:text-white">Client's Email</label>
                <input name='client_email' type="email" id="client_email" class="bg-gray-50 border border-gray-300
                text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Register') }}</x-primary-button>
        </form>
    </div>
`
</x-app-layout>
