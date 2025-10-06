<x-dashboard :currentRoute="$currentRoute">
    <p class="responsive--text text-center my-5">Welcome, here's our progress so far! &star;</p>
    <div class="cards__container grid">
        <div class="card intersection--item">
            <header class="header">
                <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Users<h1 class="responsive--header">{{ $stat['userCount'] }}</h1>
            </header>
        </div>
        <div class="card intersection--item">
            <header class="header">
                <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Images</h1>
                <h1 class="responsive--header">{{ $stat['imageCount'] }}</h1>
            </header>
        </div>
        <div class="card intersection--item">
            <header class="header">
                <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Published Pages</h1>
                <h1 class="responsive--header">{{ $stat['publishedArticleCount'] }}</h1>
            </header>
        </div>
        <div class="card intersection--item">
            <header class="header">
                <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Pending Pages</h1>
                <h1 class="responsive--header">{{ $stat['pendingArticleCount'] }}</h1>
            </header>
        </div>
    </div>
</x-dashboard>