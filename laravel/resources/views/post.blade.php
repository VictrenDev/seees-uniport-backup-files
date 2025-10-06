<x-layout>
    @push('title') {{ $article->title }} @endpush
    @push('styles')
    <style type="text/css">
        html, body {
            font-family: "Montserrat" !important;
            font-size: initial !important;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks/dist/css/stacks.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks-editor/dist/styles.css">
    @endpush
    <main>
        <div class="post-grid-container" id="post">
            <article class="post">
                <div class="post__image background-image-container">
                    <img class="background-image" src="{{ $image->path }}" alt="Post image">
                </div>
                
                <!-- REMOVE LINE FOR POST SECTION -->
                <div class="post__details">
                    <time datetime="03-07-2023">Posted: {{ date('j M Y', $article->created_at->timestamp) }} </time>
                    {{-- <ul class="post__links--container" style="margin-left: 0">
                        <li><a class="post__link" href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="post__link" href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a class="post__link" href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a class="post__link" href=""><i class="fab fa-linkedin"></i></a></li>
                    </ul> --}}
                </div>
                <div class="post__content--container">
                    <h1 class="post__header">{{ $article->title }}</h1>
                    <p class="post__text">{{ $article->desc }}</p>
                    <hr class="mt-5">
                    <div class="container s-prose ProseMirror" id='articleBody'>
                        {!! $article->body !!}
                    </div>
                </div>

            </article>
            <aside class="related--post">
                <h2 class="related--post__header">Related Posts</h2>
                <div class="related--post__container">
                    @foreach ($related_posts as $related)
                        <x-related-post :related="$related" />
                    @endforeach
                </div>

            </aside>
        </div>
    </main>
    @push('scripts')
            <script language="JavaScript" type="module" src="{{asset('js/article.js')}}"></script>
            <script src="https://unpkg.com/@stackoverflow/stacks/dist/js/stacks.min.js"></script>
            <script src="https://unpkg.com/@highlightjs/cdn-assets@latest/highlight.min.js"></script>
            <script src="https://unpkg.com/@stackoverflow/stacks-editor/dist/app.bundle.js"></script>
    @endpush
</x-layout>