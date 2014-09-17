<div class="container">
    <div class="row">
        <div class="span12">
            <div class="error-container">
                <h1>{{$erroTitle}}</h1>
                <h2>{{$msg}}</h2>
                <div class="error-details">
                    Volte para a <a href="/">página inicial</a> e tente novamente!
                </div> <!-- /error-details -->
                <div class="error-actions">
                    <a href="/" class="btn btn-large btn-primary">
                        <i class="icon-chevron-left"></i>
                        &nbsp;
                        Voltar!						
                    </a>
                </div> <!-- /error-actions -->
                <code class="code-block text-center">
                    <p>{{ $msgException->getMessage() }}</p>
                    <p>{{ $msgException->getFile() }}</p>
                    <p>Linha: {{ $msgException->getLine() }}</p>
                </code>
            </div> <!-- /error-container -->			
        </div> <!-- /span12 -->
    </div> <!-- /row -->
</div> <!-- /container -->