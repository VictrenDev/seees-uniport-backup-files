<x-layout>
    @push('title') Research @endpush
    <main class="container" id="research">
        <form class="search-box"  method="GET" action="{{ route('research') }}">
            @csrf
            <div class="formgroup">
                <button type="submit" id="searchBtn" class="searchbtn fas fa-search"></button>
                <input class="form-input" name="search" type="text" value="{{ request('search') }}" placeholder="Search Projects by title or description">
            </div>
        </form>
        @if ($researches->isNotEmpty())
            <div class="cards__container grid search-container">
                @foreach ($researches as $research)
                    <x-research-card :research="$research" />   
                @endforeach
            </div>
        @else
            <div class="error-container">
                <img src="{{ asset('images/icons/ghost.png') }}" alt="Not found image" class="fa-beat-fade">
                <h1 class="text-center my-2">No results found</h1>
                <p class="text-center">Try adjusting your search to find what you are looking for.</p>
            </div>
        @endif
        <div class="pagination__container"> {{ $researches->links('pagination::default') }}</div>
        
    </main>
</x-layout>