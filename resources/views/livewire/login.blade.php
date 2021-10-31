<div class="mx-auto mt-32  w-1/3">
    <form class="px-8 py-8 box-border shadow-lg bg-gray-800 rounded-lg mb-8" wire:submit.prevent="submit" autocomplete="off">
        @csrf
        <div class="my-4">
            <h1 class="text-white text-center text-lg">Welcome to BP Checker</h1>
        </div>

        <div class="my-4">
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-white" for="email">Email</label>
                <input class="border border-gray-400 p-2 w-full rounded" type="email" name="email"wire:model="email">

                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-white" for="password">Password</label>
                <input class="border border-gray-400 p-2 w-full rounded" type="password" wire:model="password" name="password">

                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button wire:click="submit" class="bg-yellow-600 text-white rounded py-3 px-4 hover:bg-yellow-700 w-full">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </form>
</div>
