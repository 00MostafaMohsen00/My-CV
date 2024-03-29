@extends("admin.layout.main")

@section("title")
Contacts
@stop

@section("content")

<form  id="edit_form" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" value="{{ $contact->name }}" name="name" aria-describedby="emailHelp" placeholder="Enter Contact Name">
      <small id="name_error" class="form-text text-danger" style="display: none"></small>
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="text" class="form-control" id="icon" value="{{ $contact->icon }}" name="icon" aria-describedby="emailHelp" placeholder="Enter Icon Fontawesome Class">
        <small id="icon_error" class="form-text text-danger" style="display: none"></small>
      </div>
      <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" value="{{ $contact->link }}"  name="link" aria-describedby="emailHelp" placeholder="Enter The Link">
        <small id="link_error" class="form-text text-danger" style="display: none"></small>
      </div>
      <button type="submit" class="btn btn-primary">update</button>
      <small id="success_msg" class="alert alert-success" style="display: none"></small>
</form>

@stop

@section("scripts")

<script>
    $(document).on('click', '#edit_form', function (e) {
        e.preventDefault();
        $('small').text("");
        $('small').css("display:none");
        var formData = new FormData($('#edit_form')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{ route('contact.edit',$contact->id) }}",
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