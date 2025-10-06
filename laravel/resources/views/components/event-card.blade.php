@props(['event'])

<a href="/post/{{$event->article_id}}" class="card pagination-item search-parent-filter">
    <header class="card__thumb background-image-container">
        @if ($event->images->isNotEmpty())
            <img src="{{ asset($event->images->first()->path) }}" alt="event image">
        @else
            <img src="{{ asset('images/default_display.jpg') }}" alt="event image">
        @endif


    </header>
    <div class="card__date">
        <span class="card__date__day">{{ date('j', strtotime($event->starting_at)) }}</span>
        <span class="card__date__month">{{ date('M', strtotime($event->starting_at)) }}</span>
    </div>

    <div class="card__content-container">
        <div class="card__body">
            <div class="card__category">{{ $event->tag }}</div>
            <h1 class="card__title search-item capitalize">{{$event->title}}</h1>
            <p class="card__description">
                <x-text-shortener :longText="$event->desc" />
            </p>
        </div> 

        <footer class="card__footer">
            {{-- <span class="time"><i class="icon fas fa-clock"></i><span class="icon__timenumber">
            {{$event->read_min}}    
            </span>min read</span> --}}
        </footer>
    </div>
</a>