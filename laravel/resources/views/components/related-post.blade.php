@props(['related'])

<a href="/post/{{ $related->article_id }}" class="related--post__card">
    <div class="related--post__text--container" data-card-category="seminar">
        <p class="related--post__card__category">{{ $related->tag }}</p>
        <p class="related--post__card__header">{{ $related->title }}</p>
        <p class="related--post__card__continue__reading">Continue Reading</p>
    </div>
    <div class="related--post__image">
        @if ($related->images->isNotEmpty())
            <img src="{{ asset($related->images->first()->path) }}" alt="post image">
        @endif
    </div>
</a>