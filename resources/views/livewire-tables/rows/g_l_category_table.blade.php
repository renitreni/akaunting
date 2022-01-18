<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <button type="button" class="btn btn-link fw-bold" data-bs-toggle="modal" wire:click="bindEdit({{ $row->id }})"
            data-bs-target="#glCategoryModal">{{ $row->name }}</button>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ strtoupper($row->status) }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ strtoupper($row->type) }}
</x-livewire-tables::bs5.table.cell>
