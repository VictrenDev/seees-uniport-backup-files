@props(['research'])

<a href="{{ $research->body }}" download class="card search-parent-filter">
    <header class="card__thumb background-image-container">
        @if ($research->images->isNotEmpty())
            <img src="{{ asset($research->images->first()->path) }}" alt="research image">
        @else
            <img src="{{ asset('images/default_display.jpg') }}" alt="event image">
        @endif
    </header>

    <div class="card__content-container ">
        <div class="card__body">
            <div class="header--con">
                <p class="card__title search-item capitalize responsive--header">
                    {{$research->title}}
                </p>
            </div>
            <i class="fa fa-download" style="float: right; color: #2d7bd8 !important"></i>
            <p class="author">by {{$research->author}}</p>
            <p class="card__description">
                <x-text-shortener :longText="$research->desc" />
            </p>
        </div>
    </div>
</a>