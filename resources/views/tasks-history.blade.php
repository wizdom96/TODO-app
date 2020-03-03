@extends('layouts.app')

@section('history')
<div class="container">
    
        <h2>Finished tasks</h2>
<br><br>
        <table id="reviewer_table" class="table table-hover table-striped table-condensed tasks-table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Finished at</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
        @foreach($tasks as $task)


  
<tr>
  <td>{{$task->name}}</td>
  <td>{{$task->updated_at}}</td>
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
