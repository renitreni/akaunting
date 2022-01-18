<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <button type="button" class="btn btn-link fw-bold"
            data-bs-toggle="modal"
            data-bs-target="#chartOfAccountModal"
            wire:click="bindToEdit({{ $row->id }})"
    >{{ $row->name }}</button>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ strtoupper($row->status) }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <a href="{{ route('chart.of.account', ['id'=> encrypt($row->id)]) }}" type="button" class="btn btn-sm btn-info">Details</a>
</x-livewire-tables::bs5.table.cell>
