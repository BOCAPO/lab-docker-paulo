@if ($paginationEnabled || $searchEnabled)

        @if ($searchEnabled)

                @if ($clearSearchButton)

                        @endif
                        <input
                            @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                            @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                            @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                            class="form-control rounded-pill col-3"
                            type="text"
                            placeholder="{{ __('laravel-livewire-tables::strings.search') }}"
                        />
                        @if ($clearSearchButton)
                            <div class="input-group-append">
                                <button class="btn btn-outline-dark" type="button" wire:click="clearSearch">@lang('laravel-livewire-tables::strings.clear')</button>
                            </div>

                @endif

        @endif

        @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.export')

@endif
