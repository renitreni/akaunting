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
                    data-bs-target="#glFormModal"
                    wire:click="newGLAccount"
            >
                New GL Account
            </button>
        </div>
        <div class="mt-3">
            <livewire:setup-page.g-l-account-table/>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="glFormModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $GL_form_title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label>GL Account <i class="fa fa-asterisk text-danger"></i></label>
                            <input class="form-control" wire:model="account">
                        </div>
                        <div class="mb-3">
                            <label>GL Account Name <i class="fa fa-asterisk text-danger"></i></label>
                            <input class="form-control" wire:model="name">
                        </div>
                        <div class="mb-3">
                            <label>Status <i class="fa fa-asterisk text-danger"></i></label>
                            <select class="form-select" wire:model="status">
                                <option value="active">Active</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <label class="form-check-label" for="defaultCheck1">
                                    <label>Posting Account</label>
                                </label>
                                <input class="form-check-input" type="checkbox" wire:model="posting_account"
                                       id="defaultCheck1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" wire:model="desc"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Type <i class="fa fa-asterisk text-danger"></i></label>
                            <select class="form-select" wire:model="type">
                                @foreach($type_list as $key => $type)
                                    <option value="{{ $key }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Designation <i class="fa fa-asterisk text-danger"></i></label>
                            <select class="form-select" wire:model="designation">
                                <option value="">-- Select Option --</option>
                                @foreach($designation_list as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm  fw-bold text-white" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary btn-sm  fw-bold text-white" data-bs-dismiss="modal"
                            wire:click="saveGLAccount">Save changes
                    </button>
                    <button type="button" class="btn btn-danger btn-sm  fw-bold text-white" data-bs-dismiss="modal"
                            wire:click="deleteGLAccount">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
