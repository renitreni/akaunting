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
                    data-bs-target="#glCategoryModal"
                    wire:click="newGLCategory"
            >
                New GL Category
            </button>
        </div>
        <div class="mt-3">
            <livewire:g-l-category-table/>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="glCategoryModal" tabindex="-1" aria-labelledby="glCategoryModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="glCategoryModalLabel">{{ $GL_category_form }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <div class="mb-3">
                            <label>Category Name</label>
                            <input class="form-control" wire:model="name">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-select" wire:model="status">
                                <option value="">-- Select Options --</option>
                                <option value="draft">Draft</option>
                                <option value="active">Active</option>
                                <option value="suspended">Suspended</option>
                                <option value="cancelled">Cancelled</option>
                                <option value="deleted">Deleted</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Type</label>
                            <select class="form-select" wire:model="type">
                                <option value="">-- Select Options --</option>
                                <option value="asset">Asset</option>
                                <option value="liability">Liability</option>
                                <option value="equity">Equity</option>
                                <option value="revenue">Revenue</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" wire:model="descr"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="saveGLCategory">
                        Save changes
                    </button>
                    @if($category_id)
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                wire:click="destroy">
                            Delete
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
