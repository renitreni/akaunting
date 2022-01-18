<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Details Chart Of Account') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="row col-12">
                    <div class="col-2 text-end fw-bold">
                        Chart Of Account Name
                    </div>
                    <div class="col-10">
                        {{ $result->name }}
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-2 text-end fw-bold">
                        Status
                    </div>
                    <div class="col-10 text-info fw-bold">
                        {{ strtoupper($result->status) }}
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-2 text-end fw-bold">
                        Description
                    </div>
                    <div class="col-10">
                        {{ $result->descr }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
