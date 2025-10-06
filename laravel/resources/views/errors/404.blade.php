<x-layout>
    <style>
        body {
            background-color: #fff;
        }
    </style>
    <div class="error-container">
        <h3 class="text-center px-3">The page you are looking for might be on another planet.</h3>
        <img src="{{ asset('images/icons/404-error_2.jpg') }}" alt="Not found image">
        <a href="javascript:history.back()" role="button" class="text-center form__button">Go back</a>
    </div>
</x-layout>