@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">All tasks</div>
                    <div class="panel-body">
                        @include('task.component.create_button')
                        <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th colspan="2" style="text-align: center">Action</th>  {{--TODO CSS file --}}
                                </tr>
                            </thead>
                            <tbody>
                            @if (count($tasks) > 0)
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->id }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td style="display: grid; grid-auto-columns: 1fr 1fr; justify-items: center">
                                            {{--TODO CSS file --}}
                                            <form action="{{ route('task.destroy', $task->id) }}" method="POST"
                                                  style="grid-column-start: 1; grid-column-end: 2">
                                                {{--TODO CSS file --}}
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                                </button>
                                            </form>
                                            <form action="{{ route('task.edit', $task->id) }}" method="GET"
                                                  style="grid-column-start: 2; grid-column-end: 3">
                                                {{--TODO CSS file --}}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-pencil"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No tasks</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        @include('task.component.create_button')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
