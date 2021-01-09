@extends("layouts.main")

@section("title","Upload File")

@section("content")


<form enctype='multipart/form-data' method="post" action='{{route("post-upload-file")}}'>
    @csrf
    
    <div class="form-group">
        <label for="name">Select File</label>
        <input type="file"  name="file" class="form-control" id="studentid" />
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Upload</button>
  

</form>
@endsection