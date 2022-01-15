<x-livewire-tables::bs5.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#glFormModal"
            wire:click="bindForEdit('{{ $row->id }}')">{{ $row->account }}</button>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->posting_account ? 'Yes' : 'No' }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ strtoupper($row->status) }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->type }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->designation }}
</x-livewire-tables::bs5.table.cell>
