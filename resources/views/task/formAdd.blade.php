@extends('home')
@section('content')
    <form method="post" action="" class="text-left" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" class="form-control" id="exampleInputTitle" name="title"
                               placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputContent">Content</label>
                        <input type="text" class="form-control" id="exampleInputContent" name="inputContent"
                               placeholder="Enter content">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDue_date">Due_date</label>
                        <input type="date" class="form-control" id="exampleInputDue_date" name="due_date"
                               placeholder="Enter Due_date">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-group"  name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </form>
@endsection
