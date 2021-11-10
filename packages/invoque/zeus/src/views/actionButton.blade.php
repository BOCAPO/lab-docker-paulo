<div>
    @if($style == 'button')
        @foreach($data as $row)
            @switch($row['type'])
                @case('livewire')
                    <button type="button" {{$row['action']}} class="{{$row['class']}}">
                        @if(array_key_exists('icon', $row)) <i class="{{$row['icon']}}"></i> @endif
                        {{$row['label']}}
                    </button>
                    @break
            @endswitch
        @endforeach
    @endif
    @if($style == 'dropdown')
        <div class="{{$param['classGroup']}}" role="group">
            <button type="button" class="{{$param['class']}}" data-toggle="dropdown" aria-expanded="false">
                @if(array_key_exists('icon', $param)) <i class="{{$param['icon']}}"></i> @endif
                {{$param['label']}}
            </button>
            <div class="dropdown-menu" style="">
                @foreach($data as $row)
                    @switch($row['type'])
                        @case('livewire')
                            <button class="dropdown-item" {{ $row['action'] }}>
                                @if(array_key_exists('icon', $row)) <i class="{{$row['icon']}}"></i> @endif
                                {{$row['label']}}
                            </button>
                        @break
                    @endswitch
                @endforeach
            </div>
        </div>
    @endif
</div>
