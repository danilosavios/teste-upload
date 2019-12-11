<form action="/upload" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="file">
    <input type="submit" value="submit">
</form>


