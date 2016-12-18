@if($group->shouldShowHeading())
    <li>{{ $group->getName() }}</li>
@endif

@foreach($items as $item)
    {!! $item !!}
@endforeach
