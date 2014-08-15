<div class="row" ng-animate="'animate-leave'">
    <form class="col-md-6 col-md-offset-3 yellow option-select" ng-submit="submit()" method="post" name="formPesquisa" id="formPesquisa" novalidate="novalidate">
        <div class="row">
            <h3><b>Pesquisar aluguel de carro</b></h3>
            <small>Compare os melhores preços em mais de 140 locadoras em todo mundo</small>
            <hr>
            <label for="local-retirada">Retirar o carro em:</label>
            <input type="text" value="Aeroporto Curitiba (CWB)" class="form-control ui-autocomplete-input" autocomplete name="local-retirada" placeholder="Digite o nome da cidade ou aeroporto" id="local-retirada" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
            <input type="hidden" value="41" id="local-retirada-id" name="local-retirada-id">
            <br><label for="devolver-em-outra-cidade"><input type="checkbox" rel='' id="devolver-em-outra-cidade" value="1" name="local"> Devolver em outra cidade</label>
            <div id="div-local-devolucao">
                <br><label for="local-devolucao">Devolver o carro em:</label>
                <input type="text" value="Aeroporto Curitiba (CWB)" class="form-control expand ui-autocomplete-input" autocomplete name="local-devolucao" placeholder="Digite o nome da cidade ou aeroporto" id="local-devolucao" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                <input type="hidden" value="41" id="local-devolucao-id" name="local-devolucao-id">
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-6" style="padding-left:0;">
                <label for="data-retirada">Data da Retirada:</label>
                <div class="row" style="margin-left: 0;">
                    <div class="col-md-6" style="padding-left: 0;">
                        <input type="text" value="" class="form-control" name="data-retirada" id="data-retirada" datepickerchangeonselect>
                    </div>
                    <div class="col-md-6"  style="padding-left: 0;">
                        <select name="hora-retirada" class="form-control" id="hora-retirada">
                           <option value=""></option>
                           <option value="00:00">00:00</option>
                           <option value="00:30">00:30</option>
                           <option value="01:00">01:00</option>
                           <option value="01:30">01:30</option>
                           <option value="02:00">02:00</option>
                           <option value="02:30">02:30</option>
                           <option value="03:00">03:00</option>
                           <option value="03:30">03:30</option>
                           <option value="04:00">04:00</option>
                           <option value="04:30">04:30</option>
                           <option value="05:00">05:00</option>
                           <option value="05:30">05:30</option>
                           <option value="06:00">06:00</option>
                           <option value="06:30">06:30</option>
                           <option value="07:00">07:00</option>
                           <option value="07:30">07:30</option>
                           <option value="08:00">08:00</option>
                           <option value="08:30">08:30</option>
                           <option value="09:00">09:00</option>
                           <option value="09:30">09:30</option>
                           <option selected value="10:00">10:00</option>
                           <option value="10:30">10:30</option>
                           <option value="11:00">11:00</option>
                           <option value="11:30">11:30</option>
                           <option value="12:00">12:00</option>
                           <option value="12:30">12:30</option>
                           <option value="13:00">13:00</option>
                           <option value="13:30">13:30</option>
                           <option value="14:00">14:00</option>
                           <option value="14:30">14:30</option>
                           <option value="15:00">15:00</option>
                           <option value="15:30">15:30</option>
                           <option value="16:00">16:00</option>
                           <option value="16:30">16:30</option>
                           <option value="17:00">17:00</option>
                           <option value="17:30">17:30</option>
                           <option value="18:00">18:00</option>
                           <option value="18:30">18:30</option>
                           <option value="19:00">19:00</option>
                           <option value="19:30">19:30</option>
                           <option value="20:00">20:00</option>
                           <option value="20:30">20:30</option>
                           <option value="21:00">21:00</option>
                           <option value="21:30">21:30</option>
                           <option value="22:00">22:00</option>
                           <option value="22:30">22:30</option>
                           <option value="23:00">23:00</option>
                           <option value="23:30">23:30</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6"  style="padding-left: 0;">
                <label for="data-devolucao">Data da Devolução:</label>
                <div class="row" style="margin-left: 0;">
                    <div class="col-md-6"  style="padding-left: 0;">
                        <input type="text" value="" class="form-control" name="data-devolucao" id="data-devolucao">
                    </div>
                    <div class="col-md-6"  style="padding-left: 0;">
                        <select name="hora-devolucao" class="form-control" id="hora-devolucao">
                           <option value=""></option>
                           <option value="00:00">00:00</option>
                           <option value="00:30">00:30</option>
                           <option value="01:00">01:00</option>
                           <option value="01:30">01:30</option>
                           <option value="02:00">02:00</option>
                           <option value="02:30">02:30</option>
                           <option value="03:00">03:00</option>
                           <option value="03:30">03:30</option>
                           <option value="04:00">04:00</option>
                           <option value="04:30">04:30</option>
                           <option value="05:00">05:00</option>
                           <option value="05:30">05:30</option>
                           <option value="06:00">06:00</option>
                           <option value="06:30">06:30</option>
                           <option value="07:00">07:00</option>
                           <option value="07:30">07:30</option>
                           <option value="08:00">08:00</option>
                           <option value="08:30">08:30</option>
                           <option value="09:00">09:00</option>
                           <option value="09:30">09:30</option>
                           <option selected value="10:00">10:00</option>
                           <option value="10:30">10:30</option>
                           <option value="11:00">11:00</option>
                           <option value="11:30">11:30</option>
                           <option value="12:00">12:00</option>
                           <option value="12:30">12:30</option>
                           <option value="13:00">13:00</option>
                           <option value="13:30">13:30</option>
                           <option value="14:00">14:00</option>
                           <option value="14:30">14:30</option>
                           <option value="15:00">15:00</option>
                           <option value="15:30">15:30</option>
                           <option value="16:00">16:00</option>
                           <option value="16:30">16:30</option>
                           <option value="17:00">17:00</option>
                           <option value="17:30">17:30</option>
                           <option value="18:00">18:00</option>
                           <option value="18:30">18:30</option>
                           <option value="19:00">19:00</option>
                           <option value="19:30">19:30</option>
                           <option value="20:00">20:00</option>
                           <option value="20:30">20:30</option>
                           <option value="21:00">21:00</option>
                           <option value="21:30">21:30</option>
                           <option value="22:00">22:00</option>
                           <option value="22:30">22:30</option>
                           <option value="23:00">23:00</option>
                           <option value="23:30">23:30</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row warning" id="error-message">
        </div>
        <div class="row" style="margin-top: 20px;">
            <input type="submit" value="Pesquisar" class="btn btn-success pull-right">
        </div>
    </form>
</div>