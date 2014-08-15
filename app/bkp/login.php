<div class="row">
    <div class="col-md-8 col-md-offset-2" ng-hide="loadingcadastro">
        <div class="row">
            <div class="col-md-5 jumbotron option-select">
                <p><h4>&nbsp;Já sou cadastrado</h4></p>
                <hr>
                <form class="row" name="login" id="login">
                    <div class="col-md-6">
                        <label for="email">Email:</label><br>
                        <input type="text" class="form-control" id="email" ng-model="email" name="email"/>
                    </div>
                    <div class="col-md-6">
                        <label for="senha">Senha: </label><br>
                        <input type="password" class="form-control" id="senha" ng-model="senha" name="senha"/>
                    </div>
                    <div class="col-md-12">
                        <p class="warning">{{ naoencontrado }}</p>
                        <br>
                        <button type="submit" class="btn btn-default pull-right"> Login </button>
                    </div>
                </form>
            </div>
            <div class="col-md-5 jumbotron col-md-offset-1 option-select">
                <p><h4>&nbsp;Sou um novo cliente</h4></p>
                <hr>
                <form class="row" name="criarnovocadastro" id="criarnovocadastro">
                    <div class="col-md-6">
                        <label for="nomenovocad">Nome:</label><br>
                        <input type="text" class="form-control" ng-model="nomenovocad" id="nomenovocad" name="nomenovocad"/>
                    </div>
                    <div class="col-md-6">
                        <label for="emailnovocad">Email: </label><br>
                        <input type="text" class="form-control" ng-model="emailnovocad" id="emailnovocad" name="emailnovocad"/>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <button type="submit" class="btn btn-default pull-right"> Criar cadastro </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>