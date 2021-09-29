@extends('layouts.app')
@section('content')
<div class="card">
<ul>
    <li><a href="{!! route('task.language', ['en']) !!}">ENGLISH</a></li>
    <li><a href="{!! route('task.language', ['vi']) !!}">VIETNAM</a></li>
</ul>
    <div class="card-header">
        @lang('mess.tasklist')
    </div>
    <div class="card-body">
        {{-- add --}}
         <div class="card">
             <div class="card-header">
                 @lang('mess.newtask')
             </div>
             <div class="card-body">
                 <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                     @csrf
             
                     <!-- Task Name -->
                     <div class="form-group">
                         <label for="task-name" class="col-sm-3 control-label">@lang('mess.task')</label>
             
                         <div class="col-sm-6">
                             <input type="text" name="name" id="task-name" class="form-control">
                         </div>
                     </div>
             
                     <!-- Add Task Button -->
                     <div class="form-group">
                         <div class="col-sm-offset-3 col-sm-6">
                             <button type="submit" class="btn btn-primary">
                                 @lang('mess.addtask')
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         {{-- list --}}
         @if (count($tasks) > 0)
         <div style="margin-top: 5%;" class="card">
             <div class="card-header">
                 @lang('mess.currenttask')
             </div>
             <div class="card-body">
                 <table class="table">
                     <thead>
                         <tr>
                             <th><p style="font-weight: bold">@lang('mess.task')</p></th>
                             <th></th>
                             <th></th>
                         </tr>
                     </thead>
                     @foreach ($tasks as $task)
                     <tbody>
                         
                         <tr>
                             
                             <td>{{ $task->name }}</td>
                             <td>
                                <a href="/task/{{$task->id}}" class="btn btn-warning">@lang('mess.edit')</a>
                            </td>
                             <td>
                                 <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="DELETE">
                                 </form>
                             </td>
                          
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
         @endif
    </div>
 </div>
@endsection
