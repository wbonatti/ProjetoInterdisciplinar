<div class="container">
    <div class="row">
        <div class="span12">      		
            <div class="widget ">

                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Novo Pagamento de Salário</h3>
                </div> <!-- /widget-header -->
                
                <div class="widget-content">
                    <div class="tabbable">
                        <div class="tab-content">
                            <div class="tab-pane active" id="formcontrols">
                                <div id="edit-profile" class="form-horizontal">
                                
                                @if(isset($success))
                                    @if($success)
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Sucesso!</h4>
                                            Salário pago com sucesso.
                                        </div>
                                    @else
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <h4>Erro!</h4>
                                            Houve um erro ao pagar o salário.
                                        </div>
                                    @endif
                                @endif
                                    
                                {{ Form::open() }}
                                    <fieldset>
                                        
                                        <div class="control-group">
                                            {{Form::label('funcionario','Funcionario:', ['class'=>'control-label'])}}
                                            <div class="controls">
                                                {{Form::select('funcionario',$funcionario, $dados['funcionario'], ['autocomplete'=>'off', 'class'=>'span6'])}}
                                                <p class="text-danger">{{ $errors->first('funcionario'); }}</p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">
                                            <label class="control-label">Valor (R$):</label>
                                            <div class="controls">
                                                <p class="control-p" id="valor"></p>
                                            </div> <!-- /controls -->				
                                        </div> <!-- /control-group -->
                                        
                                        <div class="clear-footer"></div>
                                        <div class="form-actions footer-actions">
                                            <button type="submit" class="btn btn-primary">Pagar!</button> 
                                            <a class="btn" href='/financeiro'>Voltar</a>
                                        </div> <!-- /form-actions -->
                                    </fieldset>
                                {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /widget-content -->
            </div> <!-- /widget -->
        </div> <!-- /span8 -->
    </div> <!-- /row -->
</div>
<script type="text/javascript">
    $.ajax("/ajax/getSalario/"+$('#funcionario').val()).success(function(data){
       $("#valor").html(data); 
    });
    $('#funcionario').change(function(){
        var x = $(this);
        $.ajax("/ajax/getSalario/"+x.val()).success(function(data){
           $("#valor").html(data); 
        });
    });
</script>