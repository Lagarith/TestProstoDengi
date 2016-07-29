@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Новый комментарий</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/comment/new') }}">
                        {{ csrf_field() }}
                        <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                        <label for="title" class="col-md-1 control-label">Текст:</label>
                            <div class="col-md-12">
                                <textarea name="text" class="form-control" rows="16"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-5"></br>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-floppy-o"></i>Сохранить
                                    </button>
                                </div>
                            </div>                        
                    </form>
                    @if(Session::has('message'))
                    {{Session::get('message')}}
                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop