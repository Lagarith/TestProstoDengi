@extends('layouts.app')
@section('content')
<?php //dd($balance); ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Перевод</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/transfer') }}">
                        {{ csrf_field() }}
                        <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                        @if(Session::has('message'))
                        {{Session::get('message')}}
                        @endif                                            
                        <div class="form-group">
                            <label class="col-md-4 control-label">Ваш баланс</label>
                                @foreach ($balance as $b)
                                <label class="col-md-7 control-label">{{$b->balance}} руб.</label>
                                @endforeach
                            </div>
                        
                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label for="summa" class="col-md-4 control-label">Сумма перевода:</label>
                            <div class="col-md-7">
                                <input name="summa" class="form-control" value="{{ old('summa') }}">
                                @if ($errors->has('balance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('balance') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('recipient') ? ' has-error' : '' }}">
                        <label for="recipient" class="col-md-4 control-label">Получатель:</label>
                            <div class="col-md-7">
                                <input name="recipient" class="form-control" value="{{ old('recipient') }}">
                                @if ($errors->has('recipient'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('recipient') }}</strong>
                                    </span>
                                @endif                                                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5"></br>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-floppy-o"></i>Сохранить
                                </button>
                            </div>                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop