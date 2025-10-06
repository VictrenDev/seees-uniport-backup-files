@props(['resource'])

<div class="library__card">
    <div class="library__card__image">
        @if ($resource->images->isNotEmpty())
            <img src="{{ asset($resource->images->first()->path) }}" alt="resource image">
        @else
            <img src="{{ asset('images/default_display.jpg') }}" alt="event image">
        @endif
    </div>
    <a href="{{ $resource->desc }}" class="library__card__tag">
        <p class="library__card__tag__header">
            {{ $resource->title }}
        </p>
        <p class="library__card__tag__subheader">{{ strip_tags($resource->body) }}</p>
        <i class="fas fa-angle-right"></i>
    </a>
    <p class="library__card__description">
        {{ $resource->author }}
    </p>
</div>