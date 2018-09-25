<ul class="pagination center">
    @if($object->currentPage() == 1)
        <li class="disabled">
            <a href="#!">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>
    @else
        <li class="waves-effect">
            <a href="{{ $object->previousPageUrl() }}">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>
    @endif
    @for($i=1; $i <= round($object->total() / $object->perPage()); $i++)
        @if($i == $object->currentPage())
            <li class="active">
                <a>{{ $i }}</a>
            </li>
        @else
            <li class="waves-effect">
                <a href="{{ $object->url($i) }}">{{ $i }}</a>
            </li>
        @endif
    @endfor
    @if($object->currentPage() == $i -1)
        <li class="disabled">
            <a href="#!">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    @else
        <li class="waves-effect">
            <a href="{{ $object->nextPageUrl() }}">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    @endif
</ul>