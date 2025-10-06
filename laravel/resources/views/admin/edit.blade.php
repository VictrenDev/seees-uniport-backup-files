<x-dashboard :currentRoute="$currentRoute">
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks/dist/css/stacks.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks-editor/dist/styles.css">
    @endpush
    <header class="header">
        <h1 class="responsive--header spaceless classic--header intersection--item hasIntersected">Article Editor</h1>
        <p class="responsive--text">Let's create some magic! &star;</p>
    </header>
    <div class="container">
        <form id="editArticleForm" method="POST" action="{{ route('update') }}">
            @csrf
            <div class="form__container">
                <div>
                  <label for="image"><b>Display Image</b></label>
                    <div class="fileupload__container">
                        <input type="hidden" id="imageList" value="" name="image_list">
                        <input type="hidden" value="{{ $article->article_id }}" name="article_id">
                        <input id="fileInput" type="file" required>
                        <button type="button"  id="uploadButton" class="file__button">Upload</button>
                    </div>
                    <img id="imagePreview" class="preview__image" style="display: none" src="">
                    <small id="uploadError" style="color:red; display:block; font-style:italic;"></small>
                </div>                
                <div>
                  <label for="title"><b>Title</b></label>
                    <input type="text" placeholder="Enter Title" name="title" value="{{ $article->title }}" required min="3" max="250">
                    @error('title')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <label for="description"><b>Description</b></label>
                    <input type="text" placeholder="Enter Description" name="desc" value="{{ $article->desc }}" required>
                    @error('desc')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div id="bodyToLinkDiv">
                    <label for="body"><b>Body</b></label>
                    <input id="hiddenInput" type="hidden" name="body" value='{{ str_replace('/\'/', '"' , $article->body) }}' placeholder="Enter Link">
                    <div id="editor-container"></div>
                    @error('body')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div>
                    <label for="author"><b>Author</b></label>
                    <input type="text" placeholder="Enter Author" name="author" value="{{ $article->author }}" required>
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
                        <option @if ($article->tag === "news") selected @endif value="news">NEWS</option>
                        <option @if ($article->tag === "event") selected @endif value="event">EVENT</option>
                        <option @if ($article->tag === "campaign") selected @endif value="campaign">CAMPAIGN</option>
                        <option @if ($article->tag === "project") selected @endif value="project">PROJECT</option>
                        <option @if ($article->tag === "research") selected @endif value="research">RESEARCH</option>
                        {{-- <option @if ($article->tag === "resource") selected @endif value="resource">RESOURCE</option> --}}
                        <option @if ($article->tag === "seminar") selected @endif value="seminar">SEMINAR</option>
                        <option @if ($article->tag === "sport") selected @endif value="sport">SPORT</option>
                    </select>
                    @error('tag')
                        <small style="color:red; display:block; font-style:italic;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form__clearfix">
                    <small id="submitError" style="color:red; display:block; font-style:italic;"></small>
                    <button id="editSubmitButton" type="submit" class="form__button form__signupbtn">Edit article</button>
                </div>
            </div>
        </form>
    </div>
    
    @push('scripts')
            <script  language="JavaScript">
                $(document).ready(function () {
                    $('[role="textbox"]').html($('#hiddenInput').val());
                    let images = $('img[data-controller="s-popover"]').parent();
                    images.parent().nextAll(":lt(4)").addBack().remove();
                });
            </script>
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
                // const input = document.createElement('input');
                // input.type = 'date';
                // input.value = 'invalid date value';
                // const isSupported = input.value !== 'invalid date value';
                // const textInput = document.querySelector('.text-input');

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