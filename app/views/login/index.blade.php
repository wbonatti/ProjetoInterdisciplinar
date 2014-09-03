<div class="account-container">
	<div class="content clearfix">
        {{Form::open(array('action' => 'loginController@autenticar', 'method' => 'post'))}}
            <h1>Login</h1>		
            <div class="login-fields">
                <p>Preencha os campos necessários</p>
                <div class="field">
                    {{Form::label('usuario','Usuário:', [])}}
                    {{Form::text('usuario',Input::get('usuario'), ['autocomplete'=>'off', 'class'=>'login username-field', 'id'=>'usuario', 'placeholder' => 'Usuário'])}}
                    <p class="text-danger">{{ $errors->first('usuario'); }}</p>
                </div>
                <div class="field">
                    {{Form::label('senha','Senha:', [])}}
                    {{Form::password('senha', ['autocomplete'=>'off', 'class'=>'login password-field', 'id'=>'senha', 'placeholder' => 'Senha'])}}
                    <p class="text-danger">{{ $errors->first('senha').$erro; }}</p>
                </div>
            </div>
            <div class="login-actions">
                {{Form::submit('Login!',['class'=>'button btn btn-success btn-large']);}}
            </div>
        {{Form::close()}}
	</div> <!-- /content -->
	
</div> <!-- /account-container -->