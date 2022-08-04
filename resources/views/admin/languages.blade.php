@extends("admin.layout.main")

@section("title")
Languages
@stop
@section("content")

<a href="{{ route("language.create") }}" class="btn btn-success">Create</a>
<div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($languages as $index=> $language )                
                <tr id="{{ $language->id }}">
                        <th scope="row" >{{ $index+1 }}</th>
                        <td>{{ $language->name }}</td>
                        <td>{{ $language->description }}</td>
                        <td>
                           <button  class="btn btn-primary"><a href="{{ route('language.update',$language->id) }}" class="btn btn-primary">Update</a></button>
                           <button id="{{ $language->id }}" class="delete_button btn btn-danger"> <a  class="btn btn-danger">Delete</a></button>
                        </td>
                </tr>
            @endforeach    
        </tbody>
      </table>

</div>
<small id="success_msg" class="alert alert-success" style="display: none"></small>
<small id="error_msg" class="alert alert-success" style="display: none"></small>



@stop


@section("scripts")
<script>
    $(document).on('click', '.delete_button', function (e) {
        e.preventDefault();
        $('small').text("");
        $('small').css("display:none");
        var skill_id =  $(this).attr('id');
        $.ajax({
            type: 'post',
             url: "{{route('language.delete')}}",
             data: {
                    '_token': "{{csrf_token()}}",
                    'id' :skill_id
                },
            success: function (data) {
                if(data.status == true){
                    e.preventDefault();
                    $('#success_msg').text("Deleted Successfully...");
                    $('#success_msg').show();
                    $('#'+skill_id).remove();
                }
            }, error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                $("#error_msg").text(val[0]);
                $("#error_msg").show();
        });
            }
        });
    });
</script>

@stop