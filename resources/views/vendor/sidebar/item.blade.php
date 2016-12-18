<li class="@if($active)active @endif">
    <a href="{{ $item->getUrl() }}" @if(count($appends) > 0)class="parent"@endif>
        <i class="{{ $item->getIcon() }}"></i>
        <span>{{ $item->getName() }}</span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

        @if($item->hasItems())<i class="{{ $item->getToggleIcon() }} pull-right"></i>@endif
    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul>
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
