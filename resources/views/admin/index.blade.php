@extends("admin.layout.main")
@section("title")
Dashboard
@endsection
@section("content")
<form  id="personal_form" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <img src="{{ $user->image }}" alt="My photo">
    <input type="file" class="form-control" id="image"  name="image" aria-describedby="emailHelp" placeholder="Upload Image">
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="address" value="{{ $user->name }}" name="name" aria-describedby="emailHelp" placeholder="Enter your Name">
    <small id="name_error" class="form-text text-danger" style="display: none"></small>
  </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" value="{{ $personal[0]->address }}" name="address" aria-describedby="emailHelp" placeholder="Enter your address">
      <small id="address_error" class="form-text text-danger" style="display: none"></small>
    </div>
    <div class="form-group">
      <label for="education">Education</label>
      <input type="text" class="form-control" id="education" placeholder="Enter your Education" name="education" value="{{ $personal[0]->address }}">
    </div>
    <div class="form-group">
        <label for="address">Job</label>
        <input type="text" class="form-control" id="job" value="{{ $personal[0]->job }}" name="job" aria-describedby="emailHelp" placeholder="Enter your job">
        <small id="job_error" class="form-text text-danger" style="display: none"></small>
      </div>
      <div class="form-group">
        <label for="address">Nationality</label>
        <input type="text" class="form-control" id="nationality" value="{{ $personal[0]->nationality }}" name="nationality" aria-describedby="emailHelp" placeholder="Enter your nationality">
        <small id="nationality_error" class="form-text text-danger" style="display: none"></small>
      </div>
      <div class="form-group">
        <label for="address">Date Of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" value="{{ $personal[0]->date_of_birth }}" name="date_of_birth" aria-describedby="emailHelp" placeholder="Enter your Date Of Birth">
        <small id="date_of_birth_error" class="form-text text-danger" style="display: none"></small>
      </div>
      <div class="form-group">
        <label for="address">Military Service</label>
        <input type="text" class="form-control" id="military_service" value="{{ $personal[0]->Military_service }}" name="Military_service" aria-describedby="emailHelp" placeholder="Enter your Military service">
        <small id="Military_service_error" class="form-text text-danger" style="display: none"></small>
      </div>
    <button type="button" class="submit-button btn btn-primary">Update</button>
    <small id="success_msg" class="alert alert-success" style="display: none"></small>
  </form>
@endsection


@section("scripts")
<script>
    $(document).on('click', '.submit-button', function (e) {
        $('small').text(" ");
        $('small').css("display:none");
        var formData = new FormData($('#personal_form')[0]);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('personal.save')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if(data.status == true){
                    $('#success_msg').text("Updated Successfully...");
                    $('#success_msg').show();
                    $('img').src="{{ $user->image }}";
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
