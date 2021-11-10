@foreach($itens as $item)
    <li class="active open">
        <a href="#" data-filter-tags="{{mb_strtolower($item['title'])}}">
            <span class="nav-link-text">{{$item['title']}}</span>
        </a>

        @if(array_key_exists('permissions', $item))
            <ul>
                @foreach($item['permissions'] as $key => $perm)
                    @php
                        $value = str_replace('.', '_', $key);
                    @endphp
                    <li class="active open">
                        <a>
                            <span class="nav-link-text">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" value="{{$value}}" id="{{$value}}" wire:model.lazy="permissionsCheck.{{$value}}">
                                    <label class="custom-control-label" for="{{$value}}">{{$perm}}</label>
                                </div>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        @if(array_key_exists('sub_menu', $item))
            <ul>
                @include('Hermes::menu.tree', ['itens' => $item['sub_menu']])
            </ul>
        @endif
    </li>
@endforeach
