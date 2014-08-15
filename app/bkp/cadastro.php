<div class="row">
    <div class="col-md-8 col-md-offset-2 option-select jumbotron">
        <p><h2>&nbsp;Crie sua conta</h2></p>
        <hr>
        <form class="row" ng-submit="criarconta()" id="cadastroForm">
            <div class="col-md-11 col-md-offset-1">
                <h4>Dados Pessoais</h4>
                <div class="row" name="novocadastro">
                    <div class="col-md-4">
                        <label for="tratamentonovo">Tratamento:</label><br>
                        <select class="form-control" id="tratamentonovo" ng-model="tratamento" required>
                            <option value="M">Sr.</option>
                            <option value="F">Sra.</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="nomenovo">Nome:</label><br>
                        <input type="text" class="form-control" id="nomenovo" name="nome" ng-model="nome"/>
                    </div>
                    <div class="col-md-4">
                        <label for="sobrenomenovo">Sobrenome:</label><br>
                        <input type="text" class="form-control" id="sobrenomenovo" ng-model="sobrenome"  name="sobrenome"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="datanascimentonovo">Data de Nascimento:</label><br>
                        <input type="text" class="form-control" id="datanascimentonovo"  name="datanascimento" ng-model="datanascimento"/>
                    </div>
                    <div class="col-md-4">
                        <label for="cpfnovo">CPF/Passaporte:</label><br>
                        <input type="text" class="form-control" id="cpfnovo"  name="cpf" ng-model="cpf"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="telefonenovo">Telefone:</label><br>
                        <input type="text" class="form-control" id="telefonenovo"  name="telefone" ng-model="telefone"/>
                        <small>Ex: (+51 99 9999 9999 )</small>
                    </div>
                    <div class="col-md-4">
                        <label for="celularnovo">Celular:</label><br>
                        <input type="text" class="form-control" id="celularnovo"  name="celular" ng-model="celular"/>
                        <small>Ex: (+51 99 9999 9999 )</small>
                    </div>
                </div>
                <hr>
                <h4>Dados de acesso</h4>
                <div class="row">
                    <div class="col-md-4">
                        <label for="emailnovo">Email:</label><br>
                        <input type="text" class="form-control" id="emailnovo"  name="email" ng-model="email"/>
                    </div>
                    <div class="col-md-4">
                        <label for="confemailnovo">Confirme sue email:</label><br>
                        <input type="text" class="form-control" id="confemailnovo"  name="emailconf" ng-model="emailconf"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="senhanovo">Senha:</label><br>
                        <input type="password" class="form-control" id="senhanovo"  name="senha" ng-model="senha"/>
                    </div>
                    <div class="col-md-4">
                        <label for="confsenhanovo">Confirme sua senha:</label><br>
                        <input type="password" class="form-control" id="confsenhanovo"  name="senhaconf" ng-model="senhaconf"/>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <button type="button" class="btn btn-primary" ng-click="voltar()">Voltar</button>
                    <button type="submit" class="btn btn-default">Criar Conta</button>
                </div>
            </div>
        </form>
    </div>
</div>
