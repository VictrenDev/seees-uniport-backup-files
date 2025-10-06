<x-dashboard :currentRoute="$currentRoute">
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks/dist/css/stacks.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks-editor/dist/styles.css">
    @endpush
    <style>
        html, body {
            font-family: "Montserrat" !important;
            font-size: initial !important;
        }

    </style>
    <p class="responsive--text text-center my-5">Let's make some changes! &star;</p>
    <div class="admin-table-container">
        <table class="s-prose s-table admin--table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Updated at</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->tag }}</td>
                        <td>{{ $page->updated_at }}</td>
                        <td>{{ $page->status }}</td>
                        <td style="display:flex;justify-content:space-evenly;align-items:center">
                            <a href="/content/edit/{{$page->article_id}}"><button class="pages-button">Edit</button></a>
                            @if ($page->status === "published")
                                <a href="/content/delete/{{$page->article_id}}"><button style="background-color:red" class="pages-button">Delete</button></a>
                                {{-- <form action="" method="put" class="link-item"><input type="hidden" name="status" value="pending"><button type="submit">Pending</button></form>     --}}
                            @else
                                <a href="/content/publish/{{$page->article_id}}"><button class="pages-button">Publish</button></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script src="https://unpkg.com/@stackoverflow/stacks/dist/js/stacks.min.js"></script>
        <script src="https://unpkg.com/@highlightjs/cdn-assets@latest/highlight.min.js"></script>
        <script src="https://unpkg.com/@stackoverflow/stacks-editor/dist/app.bundle.js"></script>
    @endpush  
</x-dashboard>