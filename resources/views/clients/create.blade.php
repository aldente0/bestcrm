<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register New Client') }}
        </h2>
    </x-slot>
    <div class="mx-auto max-w-2xl mt-9 w-11/12">
        <form action="{{ route('clients.store') }}" method="POST" class=" pl-4 rounded-2xl py-6 pr-16 bg-white"">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium
                text-gray-900 dark:text-white">Name</label>
                <input name='name' type="text" id="name" class="bg-gray-50 border border-gray-300
                text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                dark:focus:ring-blue-500 dark:focus:border-blue-500" required minlength="2">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium
                text-gray-900 dark:text-white">Email</label>
                <input name='email' type="email" id="email" class="bg-gray-50 border border-gray-300
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
