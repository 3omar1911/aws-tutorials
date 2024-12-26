<html>
    <body>

        <div style="border: 1px solid #000; padding: 10px;">
            <h1 style="text-decoration: underline; padding: 5px;">Previous files</h1>
            @foreach ($uploads as $upload)
                <a href="/download/{{ $upload->id }}">{{ $upload->url }}</a>
                <br>
            @endforeach
        </div>

        <div>
            <h1>upload new files</h1>

            <form action="/upload" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <button type="submit">Upload</button>
            </form>
        </div>
                
    </body>
</html>
