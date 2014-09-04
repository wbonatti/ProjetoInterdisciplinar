<div class="account-container">
	<div class="content clearfix">
        {{Form::open(array('action' => 'loginController@autenticar', 'method' => 'post'))}}
            <h1>Login</h1>		
            <div class="login-fields">
                <p>Preencha os campos necessários</p>
                <div class="field">
                    {{Form::label('email','E-mail:', [])}}
                    {{Form::text('email',Input::get('email'), ['autocomplete'=>'off', 'class'=>'login username-field', 'id'=>'email', 'placeholder' => 'E-mail'])}}
                    <p class="text-danger">{{ $errors->first('email'); }}</p>
                </div>
                <div class="field">
                    {{Form::label('senha','Senha:', [])}}
                    {{Form::password('senha', ['autocomplete'=>'off', 'class'=>'login password-field', 'id'=>'senha', 'placeholder' => 'Senha'])}}
                    <p class="text-danger">{{ $errors->first('senha'); }}
                    @if(!empty($erro))
                        {{ $erro }}
                    @endif
                    </p>
                </div>
            </div>
            <div class="login-actions">
                {{Form::submit('Login!',['class'=>'button btn btn-success btn-large']);}}
            </div>
        {{Form::close()}}
	</div>
</div>