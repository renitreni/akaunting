<div>
    <div class="d-flex flex-column">
        @if (session()->has('message'))
            <div class="alert alert-success my-2">
                {{ session('message') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-warning my-2">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm  fw-bold text-white"
                    data-bs-toggle="modal"
                    data-bs-target="#chartOfAccountModal"
                    wire:click="newChartOfAccount"
            >
                New Chart Of Account
            </button>
        </div>
        <div class="mt-3">
            <livewire:chart-of-account-table/>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="chartOfAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $modal_title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="mb-2">
                            <label>Name</label>
                            <input class="form-control" wire:model="name">
                        </div>
                        <div class="mb-2">
                            <label>Status</label>
                            <select class="form-select" wire:model="status">
                                <option value="">-- Select Option --</option>
                                <option value="draft">Draft</option>
                                <option value="active">Active</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Description</label>
                            <textarea class="form-control" wire:model="descr"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
