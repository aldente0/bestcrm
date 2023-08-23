<x-app-layout>

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
