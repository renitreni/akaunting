<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Details Chart Of Account') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
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
            </div>
            <div class="row mt-2">
                <div class="row col-12 mb-2">
                    <div class="col-2 text-end fw-bold">
                        Chart Of Account Name
                    </div>
                    <div class="col-10">
                        {{ $result->name }}
                    </div>
                </div>
                <div class="row col-12 mb-2">
                    <div class="col-2 text-end fw-bold">
                        Status
                    </div>
                    <div class="col-10 text-info fw-bold">
                        {{ strtoupper($result->status) }}
                    </div>
                </div>
                <div class="row col-12 mb-2">
                    <div class="col-2 text-end fw-bold">
                        Description
                    </div>
                    <div class="col-10">
                        {{ $result->descr }}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Assigned GL Account
                        </button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Assigned GL
                            Categories
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active p-2" id="nav-home" role="tabpanel"
                         aria-labelledby="nav-home-tab">
                        <div class="d-flex flex-column mt-3">
                            <div class="d-flex flex-row mb-3 border-bottom pb-2">
                                <div class="my-auto me-2">
                                    <label>GL Account List</label>
                                </div>
                                <div class="me-2">
                                    <select class="form-select" wire:model="selected_gl_account">
                                        <option value="">-- Select Option --</option>
                                        @foreach($gl_account_list as $list)
                                            <option value="{{ $list->id }}">{{ $list->account }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-auto me-2">
                                    <button type="button" class="btn btn-success" wire:click="assignGLAccount">Assign</button>
                                </div>
                            </div>
                            <div>
                                <livewire:assiged-g-l-account-table :coa_id="$result->id"/>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade p-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
