@extends("admin.layout.main")

@section("title")
Projects
@stop

@section("content")

<form  id="create_form" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" value="{{$project->title}}"  name="title" aria-describedby="emailHelp" placeholder="Enter Project Name">
      <small id="title_error" class="form-text text-danger" style="display: none"></small>
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url"  value="{{$project->url}}" name="url" aria-describedby="emailHelp" placeholder="Enter Project URL">
        <small id="url_error" class="form-text text-danger" style="display: none"></small>
      </div>
      <div class="form-group">
        <label for="tools">Tools</label>
        <input type="text" class="form-control" id="tools" value="{{$project->tools}}" name="tools" aria-describedby="emailHelp" placeholder="Enter Project Tools">
        <small id="tools_error" class="form-text text-danger" style="display: none"></small>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <small id="success_msg" class="alert alert-success" style="display: none"></small>
</form>

@stop

@section("scripts")

<script>
    $(document).on('click', '#create_form', function (e) {
        e.preventDefault();
        $('small').text("");
        $('small').css("display:none");
        var formData = new FormData($('#create_form')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{ route('project.edit',$project->id) }}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if(data.status == true){
                    $('#success_msg').text("Created Successfully...");
                    $('#success_msg').show();
                }
            }, error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]);
                $("#" + key + "_error").show();
            });
            }
        });
    });
</script>

@stop
