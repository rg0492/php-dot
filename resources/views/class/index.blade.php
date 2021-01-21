@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Class</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('class.create') }}"> Create </a>
            </div>
        </div>
    </div>
   
   	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
	@endif
	<form method="get" action="{{route('class.index')}}">
    <input type="text" name="search">
    <input type="submit" class="btn btn-primary">
    <a href="{{route('class.index')}}" class="btn btn-danger">Reset</a>
    </form>
    <br>
    <br>
    <table class="table table-striped">
        <tr>
            <th>College</th>
            <th>Class</th>
            <th>Levels</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($class as $value)
        <tr>
            <td>{{ $value->college->name }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ isset($value->level['0']->name)?$value->level['0']->name:''}}</td>
            <td>
                <form action="{{ route('class.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{asset($value->syllabus)}}" download  data-id="{{$value->id}}"><i class="fa fa-download"></i></a>
                    <a class="btn btn-primary" href="{{ route('class.edit',$value->id) }}"><i class="fa fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $class->links() !!}
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).ready(function(){
$('.download').on('click',function(){
  var classId = $(this).attr("data-id");
  alert(classId);  
  $.ajax({
       type:'POST',
       data: {
        "_token": "{{csrf_token() }}",
        "id": classId
        },
       url:"{{url('download')}}?class_id="+classId,
       success:function(data) {
       }
    });
  	});
});
</script>