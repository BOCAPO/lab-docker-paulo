<div id="panel-11" class="panel mb-0 pb-0">
    <div class="panel-hdr bg-primary-700 bg-success-gradient">
        <h2 class="pt-10">@include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.options')</h2>
        <div class="panel-toolbar">
            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <table class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline">
                @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.thead')

                @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.loading')
                @if($models->isEmpty())
                @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.empty')
                @else
                @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.data')
                @endif
                </tbody>

                @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.tfoot')
            </table>
        </div>
        <!-- panel footer with utility classes -->
        <div class="panel-content py-2 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
            @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.pagination')
        </div>
    </div>
</div>
