@extends("admin.layout.main")


@section("title")
Skills
@stop

@section("content")

<a href="{{ route("skill.create") }}" class="btn btn-success">Create</a>
<div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($skills as $index=> $skill )                
                <tr id="{{ $skill->id }}">
                        <th scope="row" >{{ $index+1 }}</th>
                        <td>{{ $skill->name }}</td>
                        <td>
                            <button  class="btn btn-primary"><a href="{{ route("skill.update",$skill->id) }}" class="btn btn-primary">Update</a></button>
                           <button id="{{ $skill->id }}" class="delete_button btn btn-danger"> <a  class="btn btn-danger">Delete</a></button>
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
             url: "{{route('skill.delete')}}",
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