@extends('layouts.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Thana Input</h1>
    </div>
</div>

<div class="row">
    <div class="table table-responsive">
        <table class="table table-bordered" id="table">
            <tr>

                <th width="150px">No</th>
                <th>District Name</th>
                <th>Thana Code</th>
                <th>Thana Name</th>
                <th>Create At</th>
                <th class="text-center" width="150px">
                    <a href="#" class="create-modal btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </th>
            </tr>
            {{ csrf_field() }}
            <?php  $no=1; ?>
            @foreach ($thana as $thana)
            <tr class="post{{$thana->id}}">
                <td>{{ $no++ }}</td>
                <td>{{ $thana->district->name}}</td>
                <td>{{ $thana->code}}</td>
                <td>{{ $thana->name}}</td>
                <td>{{ $thana->created_at}}</td>
                <td>
                    <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$thana->id}}" data-district_id="{{$thana->district->name}}" data-code="{{$thana->code}}" data-name="{{$thana->name}}" >
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="#" class="edit-modal btn btn-warning btn-sm"  data-id="{{$thana->id}}" data-district_id="{{$thana->district->name}}" data-code="{{$thana->code}}" data-name="{{$thana->name}}" >
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$thana->id}}" data-district_id="{{$thana->district->name}}" data-code="{{$thana->code}}" data-name="{{$thana->name}}" >
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form action="{{route('addThana')}}" method="POST" class="form-horizontal" role="form" id="dThana">
                     {{ csrf_field() }}
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="district_id">District Name:</label>
                        <div class="col-sm-10">
                            <select name="district_id" id ="district_id" class="form-control">
                                <option value="">--Select District--</option>
                                @foreach ($districtThanas as $dDistrict => $value)
                                <option value="{{ $dDistrict }}"> {{ $value }}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="code">Code :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code"
                            placeholder="Write Thana code" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                            placeholder="Write Thana code" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success pull-left" value="save">
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remobe"></span>Close
                </button>
                    </form>
            </div>
        </div>
    </div>
</div></div>
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">ID :</label>
                    <b id="id"/>
                </div>
                <div class="form-group">
                    <label for="">District :</label>
                    <b id="district_id"/>
                </div>
                    <div class="form-group">
                    <label for="">Code :</label>
                    <b id="code"/>
                </div>
                </div>
                    <div class="form-group">
                    <label for="">Name :</label>
                    <b id="name"/>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Form Edit and Delete Post --}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form action="{{route('editThana')}}" method="POST" class="form-horizontal" role="form" id="thana-update">
                    {{ csrf_field() }}
                    
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">District Name:</label>
                        <div class="col-sm-10">
                            <select name="district_id" id ="district_id" class="form-control">
                                <option value="">--Select District--</option>
                               @foreach ($districtThanas as $dDistrict => $value)
                                <option value="{{ $dDistrict }}"> {{ $value }}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="code">code :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code"
                            placeholder="Write Thana code">
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">Thana Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                            placeholder="Write the bank's branch name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    
                
                 <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Update">
                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remobe"></span>Close
                    </button>
                </div>
                </form>
                {{-- Form Delete Post --}}
                <div class="deleteContent">
                    Are You sure want to delete <span class="name"></span>?
                    <span class="hidden id"></span>
                </div>
                
            </div>
            <div class="modal-footerr">

                <button type="button" class="btn actionBtn" data-dismiss="modal">
                    <span id="footer_action_button" class="glyphicon"></span>
                </button>

                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class="glyphicon glyphicon"></span>close
                </button>
             
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')


<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
});
    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Thana');
    });
    $('#dThana').on('submit',function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var url  = $(this).attr('action');
        var post = $(this).attr('method');
        $.ajax({
            type: post,
            url: url,
            data: data,
            dataTy: 'json',
            success:function(data)
     {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
            "<td>" + data.id + "</td>"+
            "<td>" + data.district_name + "</td>"+
            "<td>" + data.code + "</td>"+
            "<td>" + data.name  + "</td>"+
            "<td>" + data.created_at + "</td>"+
            "<td><button class='show-modal btn btn-info btn-sm' data-id='"+ data.id + "' data-district_id='" +
             data.district_name + "' data-code='" +
             data.code + "' data-name='" +
             data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id +"' data-district_id.name='" +
             data.district_name + "' data-code='" +
             data.code + "' data-name='" +
             data.name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-district_name='" +
             data.district_name + "' data-code='" +
             data.code + "' data-name='" +
             data.name + "' ><span class='glyphicon glyphicon-trash'></span></button></td>"+
            "</tr>");
      }
        });
    })

    //Edit bank branches
$(document).on('click', '.edit-modal', function(e) {
    $('.modal-title').text('Post Edit');
    $('.deleteContent').hide();
    $('.modal-footer').hide();
    $('.btn btn-warning').hide();
    $('.form-horizontal').show();
    var id = $(this).data('id');
    $.get("{{route('thanaedit')}}",{id:id},function(data){
        $('#thana-update').find('#id').val(data.id);
        $('#thana-update').find('#district_id').val(data.district_id);
        $('#thana-update').find('#code').val(data.code);
        $('#thana-update').find('#name').val(data.name);
        $('#myModal').modal('show');
    })
});
  //update bank branches
  $('#thana-update').on('submit',function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');
    $.ajax({
        type: post,
        url: url,
        data: data,
        dataTy: 'json',
        success:function(data)
        {
            $('.post' + data.id).replaceWith(" "+
                "<td>" + data.id + "</td>"+
                "<td>" + data.district_name + "</td>"+
                "<td>" + data.code  + "</td>"+
                "<td>" + data.name  + "</td>"+
                "<td>" + data.created_at + "</td>"+
                "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-district_id='" +
                data.district_name + "' data-code='" +
                data.code + "' data-name='" +
                data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-district_id='" +
                data.district_name + "' data-code='" +
                data.code + "' data-name='" +
                data.name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm'data-id='" + data.id + "' data-district_id='" +
                data.district_name + "' data-code='" +
                data.code + "' data-name='" +
                data.name + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                "</tr>");
        }
    });
  })
  //-----------------DELETE BANK BRANCHES-------------------
  $(document).on('click', '.delete-modal', function() {
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Delete Post');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('.name').html($(this).data('name'));
    $('#myModal').modal('show');
  });
  $('.modal-footer').on('click', '.delete', function(){
    $.ajax({
        type: 'POST',
        url: 'deleteThana',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('.id').text()
        },
        success: function(data){
            $('.post' + $('.id').text()).remove();
        }
    });
  });
  $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('.modal-title').text('show-post');
  });
  
   // Show function
  $(document).on('click', '.show-modal', function() {
    $('#show').modal('show');
    $('#id').text($(this).data('id'));
    $('#district_id').text($(this).data('district_name'));
    $('#code').text($(this).data('code'));
     $('#name').text($(this).data('name'));
    $('.modal-title').text('Show Thana');
  });
</script>

@endsection
