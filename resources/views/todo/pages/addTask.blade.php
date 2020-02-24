@extends('todo/main')

@section('content')



    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors -> all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="/storeTask" enctype="multipart/form-data" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                <input type="text" id="name" name="subject" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">Priority</label>
                                <select class="form-control form-control-sm" name="priority">
                                    <option>Low</option>
                                    <option>Normal</option>
                                    <option>High</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="text-black" for="Date">Due date</label>
                                <input type="date" id="dueDate" name="due_date" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="text">Status</label>
                                <select class="form-control form-control-sm" name="status">
                                    <option>New</option>
                                    <option>In Progress</option>
                                    <option>Complete</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="text-black" for="progress">Percent complete</label>
                                <input type="number" id="phone" name="progress" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Add" name="submit" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@stop