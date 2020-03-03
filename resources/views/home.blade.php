@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    WELCOME, {{((Auth()->user()->name))}}
            </div>  
        </div>
        <br><br>
        <form action="{{('home/addtask')}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
        <label for="exampleInputEmail1">NEW TASK</label>
        <div class="col-md input-group control-group increment" >
    
    <input type="text" class="form-control" id="name" name="name" placeholder="Add Task" required>
   
    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    <div class="input-group-btn"> 
      
    <input id="id" name="id" type="hidden" value="{{((Auth()->user()->id))}}">
  <button type="submit" class="btn btn-primary">Add</button>
  </div>
  </div>
 </div>
        </form>

        </div>
        <br><br>
        <h2>Active tasks</h2>

        <table id="reviewer_table" class="table table-hover table-striped table-condensed tasks-table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Hide(finish)</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
        @foreach($tasks as $task)


  
<tr>
  <td>{{$task->name}}</td>
  <td><a href="{{ url('home/done')}}/{{$task->id}}" class="btn-primary btn-sm" onclick="return confirm('Are you sure that you finished this task?');">DONE</a></h4></td></td>
  <td><a href="{{ url('home/delete')}}/{{$task->id}}" class="btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this taks forever?');">Delete TASK</a></h4></td></td>
 
</tr>
<tr>


@endforeach


</tbody>
</table>

    
</div>
<div class="container">
            <div class="row">
             {{ $tasks->links() }}
        </div>
    </div>
@endsection
