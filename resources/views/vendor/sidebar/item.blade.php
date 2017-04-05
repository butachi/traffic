<li class="@if($active)active @endif">
    <a href="{{ $item->getUrl() }}" @if(count($items) > 0)class="parent"@endif>
        @if($item->getIcon())
            <i class="{{ $item->getIcon() }}"></i>
        @endif
        <span>{{ $item->getName() }}</span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach
    </a>
    @if(count($items) > 0)
        <ul>
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
