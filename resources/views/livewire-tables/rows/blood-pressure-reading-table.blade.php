<x-livewire-tables::table.cell>
    {{-- Note: This is a tailwind cell --}}
    <div class="text-sm font-medium text-gray-900">
        {{ $row->systolic_pressure }}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="text-sm font-medium text-gray-900">
        {{ $row->diastolic_pressure }}
    </div>
</x-livewire-tables::table.cell>
