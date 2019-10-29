@extends('home')
@section('content')
    <form action="{{route('tasks.search')}}" method="get">

        <input type="text" name="inputSearch" placeholder="inputSearch">
        <button type="submit">Search</button>
    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Ngày hết hạn</th>
            <th scope="col">Ảnh mô tả</th>
            <th scope="col" >Hoạt động</th>
        </tr>
        </thead>
        @foreach($tasks as $key => $task)
            <tbody>
            <tr>
                <th scope="row">{{++$key}}</th>
                <th scope="row">{{$task->title}}</th>
                <th scope="row">{{$task->content}}</th>
                <th scope="row">{{$task->due_date}}</th>
                <th scope="row"><img src="{{ asset('storage/' . $task->image) }}" alt="anh" style="width: 100px"></th>
                <th><a href="{{route('tasks.delete',$task->id)}}">Xóa</a> |
                    <a href="{{route('tasks.formEdit',$task->id)}}">Sửa</a>
                </th>
            </tr>
            </tbody>
        @endforeach
    </table>
    </form>
    <a href="{{route('tasks.index')}}">Home</a>
    {{$tasks->links()}}
@endsection
