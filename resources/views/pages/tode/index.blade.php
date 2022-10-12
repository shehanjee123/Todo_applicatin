@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 text-center">
            @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
            @endforeach
            <h1 class="home-title" >Todo List</h1>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('todo.insert') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-2">
                        <h1 class="task-name">Enter Task Here :</h1>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" name="title" class="form-control" placeholder="Enter Task" id="">
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" value="Update" class="btn btn-warning">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </div>
                </div>
            </form>
            <div class="table-task">
                <div class="row">
                    <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key=> $task)
                                <tr class="table-primary">
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                    @if ( $task->status==0 )
                                        {{-- <td ></td> --}}
                                        <span class="badge bg-warning">Not Completed</span>
                                    @else
                                    <span class="badge bg-success">It's Completed</span>
                                    @endif
                                    </td>
                                    <td>
                                        @if ($task->status==0)
                                        <a href="{{ route('todo.complete', $task->id) }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-circle-check"></i></a>
                                        @else
                                        <a href="{{ route('todo.not_complete', $task->id) }}" class="btn btn-warning"><i class="fa-solid fa-circle-xmark"></i></a>
                                        @endif
                                        
                                       <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can-arrow-up"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .home-title{
            padding-top: 15vh;
            font-family: sans-serif;
            font-size: 5rem;
            color: #00c921;
    }
    .task-name{
        font-size: 25px;
        margin-left: 48px;
        color: #7c7c7c;
    }    
    .table-task{
        padding: 5vh;
    }
</style>
@endpush