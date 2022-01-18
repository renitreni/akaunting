<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Setup') }}
        </h2>
    </x-slot>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($panel == '1') active @endif" wire:click="setPanel('1')" id="pills-gl-account-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-gl-account"
                    type="button" role="tab" aria-controls="pills-gl-account" aria-selected="true">GL Account
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($panel == '2') active @endif" wire:click="setPanel('2')"
                    id="pills-gl-categories-tab" data-bs-toggle="pill" data-bs-target="#pills-gl-categories"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">GL Categories
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($panel == '3') active @endif" wire:click="setPanel('3')" id="pills-coa-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-coa"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Chart Of Accounts
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($panel == '4') active @endif" wire:click="setPanel('4')" id="pills-pr-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-pr"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Posting Rules
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($panel == '5') active @endif" wire:click="setPanel('5')" id="pills-pr-sets-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-pr-sets"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Posting Rules Sets
            </button>
        </li>
    </ul>
    <div class="tab-content bg-white px-4 rounded" id="pills-tabContent">
        <div class="tab-pane fade show  @if($panel == 1) active @endif" id="pills-gl-account" role="tabpanel"
             aria-labelledby="pills-home-tab">
            <livewire:setup-page.g-l-account/>
        </div>
        <div class="tab-pane fade @if($panel == 2) active show @endif" id="pills-gl-categories" role="tabpanel"
             aria-labelledby="pills-gl-categories">
            <livewire:setup-page.g-l-categories/>
        </div>
        <div class="tab-pane fade @if($panel == 3) active show  @endif" id="pills-coa" role="tabpanel"
             aria-labelledby="pills-coa-tab">
            <livewire:setup-page.chart-of-account/>
        </div>
        <div class="tab-pane fade @if($panel == 4) active show  @endif" id="pills-pr" role="tabpanel"
             aria-labelledby="pills-pr-tab">...
        </div>
        <div class="tab-pane fade @if($panel == 5) active show  @endif" id="pills-pr-sets" role="tabpanel"
             aria-labelledby="pills-pr-sets-tab">...
        </div>
    </div>
</div>
