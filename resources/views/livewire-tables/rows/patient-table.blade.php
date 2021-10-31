<x-livewire-tables::table.cell>
    {{-- Note: This is a tailwind cell --}}
    <div class="text-sm font-medium text-gray-900">
        {{ $row->name }}
    </div>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <p class="text-blue-400 truncate">
        <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
    </p>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <p class="text-blue-400 truncate">
        <a href="tel:{{ $row->mobile_number }}">{{ $row->mobile_number }}</a>
    </p>
</x-livewire-tables::table.cell>
