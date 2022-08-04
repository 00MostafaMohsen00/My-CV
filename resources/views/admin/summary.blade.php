@extends("admin.layout.main")
@section("title")
Summary
@endsection
@section("content")
<form method="POST" id="summary_form">
    @csrf
    <div class="form-group">
      <div><label for="title" class="h1">Summary</label></div><hr>
      <div><textarea name="title" class="form-controller"  cols="30" rows="10" placeholder="write here what you want">{{ $summary[0]->title }}</textarea></div>
      <button type="submit" class="justify-content-center btn btn-primary">Update</button>
    </div>
  </form>
  <small class="alert alert-success" id="success_msg" style="display: none"></small>
<small id="title_error" class="form-text text-danger" style="display: none"></small>
@stop

@section("scripts")
<script>
    $(document).on('click', '#summary_form', function (e) {
        e.preventDefault();
        $('#title_error').text(" ");
        $('#title_error').css("display:none");
        $("#success_msg").text(" ");
        $("#success_msg").css("display:none");
        var formData = new FormData($('#summary_form')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('edit.summary')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if(data.status == true){
                    $('#success_msg').text("Updated Successfully...");
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
