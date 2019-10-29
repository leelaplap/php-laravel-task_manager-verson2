@extends('home')
@section('content')
    <form method="post" action="{{$task->id}}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" class="form-control" id="exampleInputTitle" name="title" value="{{$task->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputContent">Content</label>
                        <input type="text" class="form-control" id="exampleInputContent" name="inputContent"  value="{{$task->content}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDue_date">Due_date</label>
                        <input type="date" class="form-control" id="exampleInputDue_date" name="due_date"  value="{{$task->due_date}}">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $task->image) }}" alt="anh" style="width: 100px">
                        <input type="file" class="form-group" id="exampleInputImage" name="image" >
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection

