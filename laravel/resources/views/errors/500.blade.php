<x-layout>
    <div class="error-container">
        <h3 class="text-center px-3">Something went wrong on the server. Please try again later.</h3>
        <img src="{{ asset('images/icons/500-error.jpg') }}" alt="Not found image">
        <a href="{{ route('home') }}" class="text-center form__button">Go to home page</a>
    </div>
</x-layout>