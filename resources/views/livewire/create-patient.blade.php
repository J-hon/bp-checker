<div class="mx-auto mt-32  w-1/3">
    <form class="px-8 py-8 box-border shadow-lg bg-gray-800 rounded-lg mb-8" wire:submit.prevent="submit" autocomplete="off">
        @csrf
        <div class="my-4">
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-white" for="email">Name</label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="email"wire:model="name">

                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-white" for="email">Email</label>
                <input class="border border-gray-400 p-2 w-full rounded" type="email" name="email"wire:model="email">

                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-white" for="password">Mobile number</label>
                <input class="border border-gray-400 p-2 w-full rounded" type="tel" wire:model="mobile_number" name="mobile_number">

                @error('mobile_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between mb-6">
                <a href="{{ route('dashboard') }}" class="text-center text-white bg-gray-300 rounded py-3 px-4 hover:bg-transparent w-full">
                    {{ __('<<< Back') }}
                </a>

                <button class="bg-yellow-600 text-white rounded py-3 px-4 hover:bg-yellow-700 w-full">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</div>
