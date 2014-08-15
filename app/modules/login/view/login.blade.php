@extends('login::loginLayout')


@section('loginForm')
    {{Form::open(array('action' => 'loginController@autenticar', 'method' => 'post'))}}
        <div class="form-group">
            {{Form::label('usuario','Usuário:', ['class'=>'control-label'])}}
            {{Form::text('usuario','', ['class'=>'form-control', 'id'=>'usuario', 'placeholder' => 'Usuário' ])}}
        </div>
        <div class="form-group">
            {{Form::label('senha','Senha:', ['class'=>'control-label'])}}
            {{Form::password('senha', ['class'=>'form-control', 'id'=>'senha', 'placeholder' => 'Senha' ])}}
        </div>
        @if(!empty($erro))
            <p class="warning text-center">{{ $erro }}</p>
        @endif
        <br>
        <div class="form-group text-center">
            {{Form::submit('Login',['class'=>'btn btn-primary']);}}
        </div>
    {{Form::close()}}
@stop