<x-dashboard :currentRoute="$currentRoute">
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks/dist/css/stacks.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks-editor/dist/styles.css">
    @endpush
    <header class="header">
        <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Content Creator</h1>
        <p class="responsive--text">Let's create some magic! &star;</p>
    </header>
    <div class="container">
        <form id="articleForm" method="POST" action="{{ route('write') }}">
            @csrf
            <div class="form__container">
                <div>
                  <label for="image"><b>Display Image</b></label>
                    <div class="fileupload__container">
                        <input type="hidden" id="imageList" value="" name="image_list">
                        <input type="hidden" id="articleStatus" value="published" name="status">
                        <input id="fileInput" type="file" required>
                        <button type="button"  id="uploadButton" class="file__button">Upload</button>
                    </div>
                    <img id="imagePreview" class="preview__image" style="display: none" src="">
                    <small id="uploadError" style="color:red; display:block; font-style:italic;"></small>
                </div>                
                <div>
                  <label for="title"><b>Title</b></label>
                    <input type="text" placeholder="Enter Title" name="title" value="{{old('title')}}" required min="3" max="250">
                    @error('title')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <label for="description"><b>Description</b></label>
                    <input type="text" placeholder="Enter Description" name="desc" value="{{old('desc')}}" required>
                    @error('desc')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div id="bodyToLinkDiv">
                    <label for="body"><b>Body</b></label>
                    <input id="hiddenInput" type="hidden" name="body" value="" placeholder="Enter Link">
                    <div id="editor-container"></div>
                    @error('body')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <label for="author"><b>Author</b></label>
                    <input type="text" placeholder="Enter Author" name="author" value="{{old('author')}}" required>
                    @error('author')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div id="eventDatePicker">
                    <label for="event date"><b>Event Date</b></label>
                    <input type="date" name="date" value="{{now()->format('Y-m-d')}}">
                    @error('date')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <label for="tag"><b>Tag</b></label>
                    <select id="tag" name="tag">
                        <option value="news">NEWS</option>
                        <option value="event">EVENT</option>
                        <option value="campaign">CAMPAIGN</option>
                        <option value="project">PROJECT</option>
                        <option value="research">RESEARCH</option>
                        {{-- <option value="resource">RESOURCE</option> --}}
                        <option value="seminar">SEMINAR</option>
                        <option value="sport">SPORT</option>
                    </select>
                    @error('tag')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <label class="check-container">Save as draft
                        <input id="draftCheckbox" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form__clearfix">
                    <small id="submitError" style="color:red; display:block; font-style:italic;"></small>
                    <button id="submitButton" type="submit" class="form__button form__signupbtn">Create article</button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
            <script language="JavaScript" type="module" src="{{asset('js/article.js')}}"></script>
            <script src="https://unpkg.com/@stackoverflow/stacks/dist/js/stacks.min.js"></script>
            <script src="https://unpkg.com/@highlightjs/cdn-assets@latest/highlight.min.js"></script>
            <script src="https://unpkg.com/@stackoverflow/stacks-editor/dist/app.bundle.js"></script>
            <script type="module">
                new window.stacksEditor.StacksEditor(
                document.querySelector("#editor-container"),
                "*Your* **markdown** here", {
                    imageUpload: {
                            handler: window.ImageUploadHandler,
                        }
                    }
                );
            </script>
            <script>
                const input = document.createElement('input');
                input.type = 'date';
                input.value = 'invalid date value';
                const isSupported = input.value !== 'invalid date value';
                const textInput = document.querySelector('.text-input');

                const dateInput = document.querySelector('.datepicker-input');
                dateInput.addEventListener('change', event => {
                textInput.value = event.target.value;
                // Reset the value so the picker always
                // opens in a fresh state regardless of
                // what was last picked
                event.target.value = '';
                });
                textInput.addEventListener('input', event => {
                const value = textInput.value.trim();
                dateInput.value = value.match(/^\d{4}-\d{2}-\d{2}$/) ? value : '';
                });

            </script>
  @endpush  
</x-dashboard>