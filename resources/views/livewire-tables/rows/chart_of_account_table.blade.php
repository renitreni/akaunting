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
    <div class="btn-group-sm">
        <button class="btn btn-outline-info dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown"
                data-bs-auto-close="true" aria-expanded="false">
            Actions
        </button>
        <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
            <li><a class="dropdown-item" href="#">Assigned GL Accounts</a></li>
            <li><a class="dropdown-item" href="#">Assigned GL Categories</a></li>
        </ul>
    </div>
</x-livewire-tables::bs5.table.cell>
