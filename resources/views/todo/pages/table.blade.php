@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="btn btn-primary" style="margin: 20px 0">
          <a href="/addtask" style="color: white; text-decoration: none">New Task</a>
      </div>
      <div class="table">
          <table>
              <th></th>
              <th>Subject</th>
              <th>Priority</th>
              <th>Due date</th>
              <th>Status</th>
              <th>Percent completed</th>
              <th>Modified on</th>
              <th></th>
              <th></th>
              @foreach($tasks as $todo)
              <tr>
                  <td>
                  <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" action="/wrong" id="exampleCheck1">
                  </div>
                  </td>
                  <td>{{$todo->subject}}</td>
                  <td
                      @if($todo->priority=="Low")
                          style="background-color:forestgreen"
                      @elseif($todo->priority=="Normal")
                          style="background-color:deepskyblue"
                       @else style="background-color: red" @endif>
                   {{$todo->priority}}  </td>
                  <td>{{$todo->due_date}}</td>
                  <td>{{$todo->status}}</td>
                  <td>
                      <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$todo->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$todo->progress}}%"></div>
                      </div>
                  </td>
                  <td>{{$todo->updated_at}}</td>
                  <td><a href="/delete/task/{{$todo->id}}">Delete</a></td>
                  <td><a href="/update/task/{{$todo->id}}">Edit</a></td>
              </tr>
                  @endforeach
          </table>
      </div>
  </div>

</body>
</html>
    @stop
