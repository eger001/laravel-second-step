@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit task</div>
                    <div class="panel-body">
                        @include('common.errors')
                        <form action="{{ route('task.update', $task->id) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Enter a new task:</label>
                                <div class="col-sm-6">
                                    @php
                                        $oldValue = old('name');
                                    @endphp
                                    <input type="text" name="name" id="task-name" class="form-control" value="{{$oldValue ?? $task->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-pencil"></i> Save changes
                                    </button>
                                </div>
                            </div>
                        </form>
                        <a href="{{route('task.index')}}" style="color: #000; text-decoration: none"><i class="fa fa-reply"></i> Back to view</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
