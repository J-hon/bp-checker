<div class="mx-auto w-full">
    <div class="px-8 pt-8">
        <div>
            <a href="{{ route('dashboard') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <<< Go back to dashboard
            </a>
        </div>
    </div>

    <form class="px-8 py-8" wire:submit.prevent="submit" autocomplete="off">
        @csrf
        <div class="flex justify-between">
            <div class="w-1/3 mr-2">
                <label class="block mb-2 uppercase font-bold text-xs" for="systolic_reading">Systolic Reading</label>
                <input class="border border-gray-400 p-2 w-full rounded" type="number" name="systolic_reading" wire:model="systolic_reading">

                @error('systolic_reading')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-1/3 mr-2">
                <label class="block mb-2 uppercase font-bold text-xs" for="diastolic_reading">Diastolic Reading</label>
                <input class="border border-gray-400 p-2 w-full rounded" type="number" wire:model="diastolic_reading" name="diastolic_reading">

                @error('diastolic_reading')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-1/3">
                <label class="block mb-2 uppercase font-bold text-xs" for="diastolic_reading">&nbsp;</label>
                <button class="bg-yellow-600 text-white rounded py-2 px-4 hover:bg-yellow-700 w-full">
                    {{ __('Save Reading') }}
                </button>
            </div>
        </div>
    </form>

    <div class="max-w-7xl mx-auto">
        <div>
            <livewire:blood-pressure-reading-table :patient_id=$patient_id />
        </div>
    </div>
</div>
