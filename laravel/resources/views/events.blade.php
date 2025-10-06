<x-layout>
    @push('title') Events @endpush
    <main class="container">
        <form class="search-box"  method="GET" action="{{ route('events') }}">
            @csrf
            <div class="formgroup">
                <button type="submit" id="searchBtn" class="searchbtn fas fa-search"></button>
                <input class="form-input" name="search" type="text" value="{{ request('search') }}" placeholder="Search Events by title or description">
            </div>
        </form>
        @if ($events->isNotEmpty())
            <div class="cards__container grid">
                @foreach ($events as $event)
                    <x-event-card :event="$event" />
                @endforeach            
            </div>
        @else
            <div class="error-container">
                <img src="{{ asset('images/icons/ghost.png') }}" alt="Not found image" class="fa-beat-fade">
                <h1 class="text-center my-2">No results found</h1>
                <p class="text-center">Try adjusting your search to find what you are looking for.</p>
            </div>
        @endif
        <div class="pagination__container"> {{ $events->links('pagination::default') }}</div>
    </main>
</x-layout>