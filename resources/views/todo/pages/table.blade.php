@extends('todo/main')

@section('content')
  <div class="container">
      <div class="table">
          <table>
              <th>font</th>
              <th>Subject</th>
              <th>Priority</th>
              <th>Due date</th>
              <th>Status</th>
              <th>Percent completed</th>
              <th>Modified on</th>
              @foreach($tasks as $task)
              <tr>
                  <td>
                  <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  </div>
                  </td>
                  <td>{{$task->subject}}</td>
                  <td
                      @if($task->priority=="Low")
                          style="background-color:forestgreen"
                      @elseif($task->priority=="Normal")
                          style="background-color:deepskyblue"
                       @else style="background-color: red">
                  @endif {{$task->priority}} jdjdj </td>
                  <td>{{$task->due_date}}</td>
                  <td>{{$task->status}}</td>
                  <td>
                      <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$task->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$task->progress}}%"></div>
                      </div>
                  </td>
                  <td>{{$task->updated_at}}</td>
                  <td></td>
              </tr>
                  @endforeach
          </table>
      </div>
  </div>

</body>
</html>
    @stop