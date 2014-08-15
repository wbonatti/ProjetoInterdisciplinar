    <article class="row">
        <div class="col-md-8 col-md-offset-2 yellow option-select">
            <div class="row margin-none">
                <div class="col-xs-10 col-xs-offset-1">
                    @yield('inforeserva')  
                </div>
            </div>
        </div>
    </article>
    <br>
    <article class="row">
        <div class="col-md-8 col-md-offset-2 jumbotron option-select">
            <div class="row ">
                <div class="col-xs-10 col-xs-offset-1">
                    <h4>
                        Orientações Gerais
                    </h4>
                    <hr>
                    <div class="view-tabs">
                        <ul class="nav nav-tabs" role='tablist'>
                            <li class="active"><a href="#tabs-1" data-toggle="tab">E agora, como devo proceder?!</a></li>
                            <li class=""><a href="#tabs-2" data-toggle="tab">Requisitos para Locação</a></li>
                            <li class=""><a href="#tabs-3" data-toggle="tab">Política de Pagamento</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tabs-1"  class="tab-pane active">
                                <h4>Análise de Disponibilidade</h4>
                                <ul class="square sepH_c">
                                    <li>Sua solicitação de reserva será confirmada após a análise da disponibilidade de veículos e aprovação junto à Locadora solicitada.</li>
                                    <li>Todas as solicitações de reservas são processadas pela Central de Reservas Mobicar, a qual mantém integração direta de sistemas e serviços com as locadoras de veículos.</li>
                                    <li>Em caso de indisponibilidade de veículos ou impossibilidade de atendimento por parte da locadora escolhida,  nossa Central de Reservas poderá apresentar outras opções de grupos de veículos ou locadora para seu atendimento.</li>
                                </ul>
                                <h4>Análise de Crédito - Pré-Pagamento Online</h4>
                                <ul class="square sepH_c">
                                    <li>Caso sua solicitação de reserva exija o pagamento antecipado online, esta será confirmada após a análise de crédito e aprovação do pagamento que deverá ocorrer no prazo de 48 horas a partir da data da emissão.</li>
                                </ul>
                                <h4>Confirmação da Reserva</h4>
                                <ul class="square sepH_c">
                                    <li>Você receberá por email a confirmação da sua reserva após a aprovação do pagamento.</li>
                                    <li>Para garantir o recebimento de nossas mensagens, certifique-se de que o domínio Mobicar.com.br está autorizado na ferramenta anti-spam do seu e-mail. Caso não esteja, você poderá deixar de receber as comunicações importantes sobre sua solicitação de reserva.</li>
                                    <li>É imprescindível que o locatário apresente uma via impressa do Documento Voucher de Confirmação de Reserva à locadora no ato da abertura do contrato de locação junto à loja.</li>
                                    <li>O Documento Voucher de Confirmação confere garantia real da reserva do veículo, condições de uso, desconto sobre a tarifa balcão da locadora e comprovante de pagamento antecipado dos serviços contratados deste documento.</li>
                                </ul>
                                <h4>Retirada do Veículo na Locadora</h4>
                                <ul class="square sepH_c">
                                  <li>Compareça ao endereço da loja de atendimento da locadora na data e horário informado no Documento de Confirmação de Reserva para realizar a abertura do contrato de locação e retirada do veículo. Não esqueça de apresentar os documentos de identificação solicitados: Passaporte, Carteira de Habilitação, Cartão de Crédito Internacional e uma cópia impressa do Documento Voucher de Confirmação de Reserva emitido pela Mobicar.</li>
                                  <li>Atendimento em Aeroporto: as lojas em aeroporto estarão localizadas estrategicamente no saguão de desembarque do respectivo aeroporto ou em área externa determinada para locadoras - para maiores informações consulte o serviço de atendimento do aeroporto ou a Central de Reservas Mobicar. Compareça ao guichê da locadora para abertura do contrato de locação e retirada do veículo</li>
                                  <li>Orientações para uso do Serviço de Entrega do carro no aeroporto: você será recepcionado por um funcionário da locadora no setor de desembarque do aeroporto para entrega do veículo. O serviço de entrega é realizado exclusivamente por loja de atendimento que não está localizada nas dependências do aeroporto.</li>
                                  <li>Orientações para uso do Serviço de Shuttle no aeroporto: você será recepcionado por um funcionário da locadora no setor de desembarque do aeroporto e será transportado até as instalações da loja para abertura do contrato de locação e retirada do veículo. O serviço de shuttle é realizado exclusivamente por loja de atendimento que não está localizada nas dependências do aeroporto.</li>
                                </ul>
                                <h4>Pagamento de Taxas Adicionais no Destino</h4>
                                <ul class="square sepH_c">
                                    <li>É comum a indicação e venda de serviços e acessórios adicionais pela locadora no ato da abertura do contrato de locação. Esses serviços, caso contratados, são de responsabilidade da locadora junto ao locatário e dessa maneira, havendo dúvidas ou reclamação quanto aos valores e serviços contratados, deverá o locatário tratar o assunto diretamente com a locadora contratada.</li>
                                    <li>É de responsabilidade do locatário a conferência de todos os serviços e valores apresentados no contrato de locação antes de assiná-lo. Em caso de dúvidas ou divergências de informações ou valores o locatário deverá comunicar imediatamente a atendente do balcão para as devidas orientações e correções.</li>
                                </ul>
                                <h4>Fale Conosco</h4>
                                <ul class="square sepH_c">
                                    <li>Em caso de dúvidas ou maiores informações sobre seu pedido de reserva entre em contato com nossa Central de Reservas 4003-7368 (capitais) ou 0800 604 7368 (demais localidades) ou +55 41 31529700 (ligações internacionais) e converse com nossos atendentes. Solicitações de reservas emitidas fora do horário comercial serão processadas no próximo dia útil. Nosso atendimento é de segunda-feira à sexta-feira das 08:00h às 21:30h, sábados das 09:00h às 16:30h, domingo das 13:30h às 18:30h, exceto feriados nacionais. Fuso horário de Brasília.</li>
                                </ul>
                            </div>
                            <div id="tabs-2"  class="tab-pane">
                                <h4>Termos e Condições Gerais de Locação</h4>
                                <div class="modalContract requisitosContrato">
                                    <ol class="sepH_c" start="0">
                                        <li>Os Termos e Condições Gerais, abaixo detalhados, representam as principais regras e obrigações usualmente exigidas pelas Locadoras na formalização do Contrato de Locação. A Mobicar não se responsabiliza em caso de eventuais mudanças e/ou novas exigências das Locadoras, que podem ocorrer sem aviso prévio. Quaisquer dúvidas a respeito desses procedimentos e exigências devem ser dirimidas previamente junto a Mobicar ou a Locadora, pois podem impossibilitar a efetivação da locação ou a retirada do veículo.</li> 
                                        <li>A MOBICAR oferece estes termos para conveniência do locatário, sendo que a Locadora apresentará – no momento da abertura do contrato e retirada do veículo – seus Termos e Condições específicos. Caso os Termos e Condições específicos da Locadora conflitam com os termos genéricos expostos abaixo, os termos da Locadora irão prevalecer.</li> 
                                        <li>Contrato de Locação: o contrato de locação representa o conjunto de informações, regras, direitos e deveres entre locadora e locatário, no que diz respeito aos serviços a serem contratados e será apresentado pela Locadora ao locatário no dia da retirada do veículo, sendo de responsabilidade do mesmo a devida leitura de suas cláusulas.</li> 
                                        <li>Idade Mínima do Locatário/Condutor: 25 anos. Para locatário entre 21 e 24 anos será sujeito à pagamento de taxa adicional. Para alguns países e veículos diferenciados poderá haver regras específicas de idade, consulte nossa Central de Reservas Mobicar para maiores informações.</li> 
                                        <li>Carteira de Habilitação: o locatário deverá apresentar à locadora o documento original de habilitação brasileira, válida e emitida há pelo menos 02 anos. No caso de carteira de habilitação internacional, a mesma deverá ser apresentada juntamente com a carteira de habilitação do país de sua nacionalidade. Embora não seja obrigatória em muitos países, recomendamos que você retire a Carteira de Habilitação Internacional. Consulte as condições específicas para saber se há ou não esta obrigatoriedade.</li> 
                                        <li>Passaporte: o locatário deverá apresentar à locadora o Passaporte Brasileiro original e vigente para abertura do contrato de locação.</li> 
                                        <li>Visto: alguns países exigem visto de entrada. Caberá ao locatário verificar junto aos órgãos consulares do país a ser visitado se este país exige visto de entrada para sua nacionalidade. É de responsabilidade do locatário verificar e providenciar a documentação exigida para o destino.</li> 
                                        <li>Cartão de Crédito para Caução de Garantia: o locatário deverá apresentar à locadora um cartão de crédito internacional válido, de sua titularidade e com limite disponível para a caução de garantia. Não serão aceitos cartões de crédito de terceiros ou não autorizados para operações internacionais. A aceitação do cartão de crédito é de único e exclusivo critério da locadora no ato da abertura do contrato de locação. O pagamento online e antecipado dos serviços contratados através da Mobicar não desobriga o locatário da apresentação do cartão de crédito à locadora para a caução de garantia até a devolução do veículo. Para alguns países e veículos diferenciados poderá haver regras específicas de cartão de crédito, incluindo obrigatoriedade da apresentação de mais de um cartão de crédito com limite disponível e/ou bandeira específica, consulte nossa Central de Reservas Mobicar para maiores informações. O valor caução possui variação de tarifa de acordo com o grupo do veículo locado, período de utilização e poderá ser retido pela locadora em casos de avarias ao veículo locado ou para pagamento de serviços opcionais contratados diretamente no balcão da locadora.</li> 
                                        <li>Documento Voucher de Confirmação de Reserva: representa a garantia de reserva do veículo junto à locadora, que deverá ser impresso para apresentação ou para consulta dos dados de sua reserva, sendo que o mesmo só poderá ser aceito se os dados (nome do titular, número de confirmação, datas, entre outros) coincidirem exatamente com os dados da reserva junto à locadora. A não apresentação do documento Voucher à locadora poderá impossibilitar ao locatário fazer uso do valor pago antecipadamente online, assim como o direito de usufruir das tarifas previamente contratadas. Certifique-se quais serviços e opcionais estão cobertos pelo Voucher que você adquiriu. Mesmo as tarifas denominadas “All Inclusive” não contemplam todos os opcionais disponíveis para contratação no destino.</li> 
                                        <li>Moeda: o valor da reserva pré-pago no Brasil é normalmente expresso em Dólar Americano (USD), porém poderão ser usadas outras divisas, convertidas no câmbio do dia para Real, taxas ou serviços opcionais pagos no destino são expressos na moeda local.</li> 
                                        <li>Pagamento de Taxas e Opcionais Adicionais: serviços, produtos ou acessórios adicionais contratados pelo locatário junto à locadora no dia da abertura do contrato de locação ou durante a locação são de responsabilidade do locatário e a quitação destas taxas deverá ser realizada diretamente na locadora. Uma vez assinado o contrato e iniciada a locação, os serviços opcionais contratados não poderão ser cancelados e não serão reembolsados. Poderão ser cobradas taxas locais não incluídas no Voucher de Confirmação de Reserva.</li> 
                                        <li>Proibido fumar: é proibido fumar dentro do veículo locado. Será aplicada uma penalidade a partir de US$250,00 se, ao devolver o veículo, for identificado sinais de que se fumou em seu interior. O valor da multa poderá sofrer variações de locadora para locadora e só poderá ser confirmada no destino.</li> 
                                        <li>Kit bafômetro: para alguns países da Europa é obrigatório ter um kit bafômetro que é de responsabilidade do locatário providenciar, a indisponibilidade do mesmo implicará em multa.</li> 
                                        <li>Devolução do Veículo: a não devolução do veículo na data prevista no Voucher de Confirmação da Reserva implicará em apropriação indébita, ocasionando a ação de busca e apreensão do mesmo, além de outras penalidades cíveis e criminais.</li> 
                                        <li>Prazo para Retirada do Veículo: a locadora permanecerá com a reserva do veículo garantida até o limite de 01 hora após o horário previsto para retirada, ou até o horário limite de funcionamento da loja de retirada, o que for menor. Após este prazo a reserva será cancelada em sistema (No-Show). Em caso de atraso de qualquer natureza (incluído atraso aéreo, substituição de vôo ou overbooking aéreo para aqueles que retiram o veículo em aeroporto), comunicar imediatamente a loja de retirada do veículo através do telefone presente no Documento Voucher de Confirmação de Reserva ou, em caso de dificuldades, entrar em contato com a Central de Reservas Mobicar por e-mail vendas@mobicar.com.br ou telefone (41) 3152 9701 para atualização do horário de retirada do veículo.</li> 
                                        <li>Prazo de Devolução do Veículo: o locatário deverá realizar a devolução do veículo à locadora em data, horário e local determinado no contrato de locação. Após o período de tolerância de 29 minutos, a partir do horário previsto para devolução do veículo, a locadora efetuará a cobrança de diária adicional. Sugerimos que chegue no guichê da locadora para devolução do veículo com pelo menos quatro horas de antecedência de seu embarque. Isso vai assegurar tempo suficiente para completar sua transação e retornar ao aeroporto.</li> 
                                        <li>Horários de Funcionamento da loja: os horários de funcionamento da loja apresentados em seu Documento de Confirmação de Reserva Mobicar poderão sofrer mudanças sem prévio aviso, por isso orientamos a conferir as informações pertinentes à devolução do veículo no momento da abertura do contrato junto a locadora. Em caso de devolução em data, horário e local diferentes do determinado em contrato de locação, é de responsabilidade do Locatário verificar a disponibilidade junto a Locadora ou Central de Reservas Mobicar o horário de funcionamento antes de qualquer deslocamento.</li> 
                                        <li>Prorrogação data de devolução: havendo necessidade de prorrogação na devolução do veículo, o contato com a Central de Reservas Mobicar deverá ocorrer em um prazo mínimo de 48 horas antes da data prevista de devolução para verificação da disponibilidade e valores atualizados. Considera-se o fuso horário do Brasil.</li> 
                                        <li>Serviço de Entrega ou Shuttle: o locatário deverá apresentar antecipadamente o número do vôo e companhia aérea do desembarque para os serviços de atendimento à distância, realizado por locadora localizada fora da área aeroportuária. O não fornecimento das informações poderá resultar no cancelamento da reserva pela locadora sem prévio aviso.</li> 
                                        <li>Serviços e Acessórios Opcionais: o locatário poderá solicitar os opcionais de locação de acordo com sua necessidade diretamente à locadora no dia da retirada do veículo. Os acessórios opcionais não poderão ser garantidos com antecedência e estará sujeito a disponibilidade junto à locadora. Condutores adicionais estarão sujeitos às mesmas regras do locatário e deverão estar presentes no ato da abertura do contrato de locação. Algumas locadoras oferecem a opção do contrato de locação em português e é responsabilidade do locatário (ou o locatário poderá) questionar a disponibilidade do mesmo antes da assinatura.</li> 
                                        <li>Grupo de Veículos: os veículos são reservados por GRUPO (veículos com características similares) e não serão garantidos por marca, ano, modelo, cor, final de placa ou configuração. Os modelos poderão sofrer variações na renovação de frota da locadora sem prévio aviso. A capacidade de bagagem é meramente indicativa e poderá ser reduzida ou inexistente de acordo com o balanceamento entre número de ocupantes do veículo e a quantidade e formato das malas que se deseja transportar. Caso a quantidade de passageiros e/ou bagagens seja superior à capacidade do veículo reservado, a Mobicar não poderá ser responsabilizada pelo não atendimento da reserva ou cobrança adicional para mudança de categoria. A Mobicar recomenda usar cautela na expectativa da capacidade do bagageiro. É comum a oferta de upgrade de categoria com custo adicional no momento da retirada do veículo e optando pela contratação de um veículo de categoria superior. Caso o upgrade seja aceito pelo locatário, o voucher pré-pago será usado como parte do pagamento e a diferença será cobrada diretamente no cartão de crédito do locatário. </li> 
                                        <li>Taxa de Retorno ou One Way: é a taxa cobrada quando o local de devolução do veículo for diferente do local de retirada, é necessário consultar previamente as localidades permitidas e deverá ser paga diretamente à locadora. Além da taxa de retorno, a locadora poderá cobrar uma taxa adicional por considerar “quebra de contrato” a devolução do veículo em loja diferente da previamente definida no contrato de locação, ficando a critério da Locadora aceitar ou não a devolução em outra localidade sem prévia negociação.</li> 
                                        <li>Restrições de Fronteira: poderão haver restrições para se cruzar fronteiras de países/estados, sendo de responsabilidade do locatário informar-se previamente junto a nossa Central de Reservas Mobicar ou junto a loja no momento da retirada do veículo.</li> 
                                        <li>Despesas Extras: despesas extras não apresentadas no documento Voucher de Confirmação de Reserva serão cobradas pela locadora diretamente ao locatário. Alguns exemplos de despesas extras são: multas de trânsito, danos ou avarias causados ao veículo locado e sem cobertura, taxa de limpeza, combustível, serviços e acessórios contratados diretamente na locadora. A critério da locadora podem ser cobradas também em outras situações.</li> 
                                        <li>Multas de Trânsito: o pagamento e a responsabilidade civil e criminal referente a multas de trânsito será exclusivamente do locatário junto ao órgão de trânsito do país, embora a locadora reserve o direto de intermediar e/ou antecipar pagamentos, para posterior cobrança junto ao locatário.</li> 
                                        <li>Atualização de Valores: os valores da reserva possuem como referência as informações contidas na solicitação do locatário. Os valores poderão sofrer alterações quando: a) Ocorrer mudanças de itinerário, grupos, serviços e informações da reserva; b) Forem incluídos ou excluídos serviços e acessórios opcionais; c) Forem incluídas taxas adicionais apresentadas pela locadora e não calculadas na emissão da reserva ou não apresentadas no documento de confirmação.Na discordância dos valores recalculados com opcionais ofertados no balcão e apresentados em documento contratual, o locatário poderá contestar. A assinatura ou a rubrica de aceite do cliente no contrato será interpretada como concordância, não podendo ser contestado o custo adicional posteriormente.</li> 
                                        <li>Vistoria do Veículo: quando disponível pela locadora, recomendamos ao locatário acompanhar a vistoria do veículo. Lembre-se de verificar e apontar as condições de limpeza, higiene, conservação, danos e/ou avarias existentes no veículo locado. A locadora poderá realizar a cobrança de manutenção das avarias causadas ao veículo durante o período da sua locação, assim como a taxa de limpeza e higienização com base na tabela de valores da locadora.</li> 
                                        <li>Documentos do Veículo e Itens de Segurança: confira no ato da retirada do veículo a documentação do automóvel e a existência dos acessórios de segurança: pneu estepe, macaco, chave de roda, triângulo de sinalização e nível do tanque de combustível.</li> 
                                        <li>Combustível e Reabastecimento: o veículo será entregue ao locatário com combustível (normalmente com tanque cheio) e deverá ser devolvido nas mesmas condições em que for retirado. Em caso de não reabastecimento aos mesmos níveis originais para a devolução do veículo, haverá a cobrança do combustível com base na tabela de preços da locadora disponível no balcão de atendimento. A isenção do reabastecimento do veículo será aplicada quando esta condição estiver incluída no plano de tarifa contratado.</li> 
                                        <li>Itens sem Cobertura de Risco / Proteção Obrigatória: o locatário estará sujeito às cláusulas, exclusões e pagamento presentes no contrato de locação da locadora. Como regra geral, a cobertura exclui, entre outros, os seguintes itens: acessórios, pneu danificado, roda danificada, suspensão danificada devido a buracos ou guias, trincos no para-brisa, danos causados por enchentes ou qualquer outro fenômeno da natureza, perda ou danificação da chave e/ou documentação do veículo. Tais itens podem variar entre as locadoras e deverão ser confirmados no ato da retirada do veículo. Verifique cuidadosamente os detalhes da proteção e cobertura disponíveis em sua reserva. Havendo interesse pela contratação de proteções disponíveis, ou na discordância das condições apresentadas, o locatário deverá contatar nossa Central de Reservas. A Mobicar não se responsabiliza pela perda da proteção do veículo decorrente do mesmo ser conduzido por pessoas não autorizadas, sob influência de álcool/ drogas ou em desrespeito à legislação de trânsito vigente.</li> 
                                        <li>Acidentes de Trânsito: em caso de acidente, furto ou dano ao veículo locado, é imprescindível que o locatário comunique imediatamente a locadora e realize o Boletim de Ocorrência Policial. O locatário deverá preencher o formulário de relatório de acidentes junto à locadora no prazo de 24 horas.</li> 
                                        <li>Titularidade da Reserva: o documento Voucher de Confirmação de Reserva é individual e intransferível.</li> 
                                        <li>Alterações da Reserva: a solicitação de alteração nos dados da reserva estará sujeita a reanálise de disponibilidade de veículos do grupo e atualização de valores com base na tabela vigente de tarifas e descontos da locadora.</li> 
                                        <li>Cancelamento da Reserva: em caso de não utilização da reserva confirmada, o locatário deverá solicitar o cancelamento da reserva através da Central de Reservas Mobicar (no Brasil: 4003-7368, no Exterior: +55 (41) 3152 9701) em horário comercial, com até 72 horas de antecedência ao horário de retirada do veículo. Regras e taxas de cancelamento estão expressas nos Termos e Condições Gerais de Pagamentos.</li> 
                                        <li>No-Show: será realizada a cobrança e débito de No-Show ao locatário, caso este não compareça à locadora para abertura do contrato de locação e retirada do veículo ou não realize o comunicado de cancelamento da referida reserva no prazo mínimo de 72 horas de antecedência ao horário de retirada do veículo.</li> 
                                        <li>Indisponibilidade de Veículos: a locadora poderá recusar o atendimento a qualquer pessoa que não cumprir com os requisitos de locação ou que seja considerada incapaz de conduzir o veículo. A Mobicar não se responsabiliza pelo não cumprimento das obrigações da locadora quanto à indisponibilidade de veículos para atendimento. É de responsabilidade do locatário comunicar à Central de Reservas Mobicar quaisquer dificuldades apresentada junto à locadora na abertura do contrato de locação ou retirada do veículo. A Mobicar não poderá ser responsabilizada por quaisquer perdas, danos, alterações, cancelamentos e atrasos decorrentes de força maior incluindo companhias aéreas, conflitos civis, desastres naturais e outros.</li> 
                                        <li>Central de Reservas e Atendimento ao Cliente Mobicar. No Brasil (ligação local): 4003 7368 ou (41) 3152 9701. No Exterior (ligação interurbana): +55 41 3152 9701. Nosso horário de atendimento é de segunda-feira à sexta-feiras das 08:00h às 21:35h, sábados das 09:00h às 16:45h, domingos das 13:30h às 18:30h.</li> 
                                    </ol>
                                </div>              
                            </div>
                            <div id="tabs-3"  class="tab-pane"><h4>Política de Pagamento</h4>
                                <div class="requisitosContrato">
                                    <ol class="sepH_c">
                                        <li>Pagamento com cartão de crédito: o locatário poderá utilizar os seguintes cartões de crédito para pagar suas reservas internacionais online pela Mobicar: Visa, Mastercard, American Express, Diners e Elo. No momento do pagamento online, tenha sempre em mãos o seu cartão de crédito. Através dele, você poderá informar com exatidão dados imprescindíveis para completar a sua reserva: a bandeira do cartão, nome do titular do cartão (exatamente como aparece impresso), número do cartão e código de segurança. Somente um cartão de crédito poderá ser indicado como forma de pagamento online. Não é possível dividir o pagamento da reserva com a utilização de outros cartões.</li> 
                                        <li>Parcelamento: o locatário poderá parcelar o valor total da venda em até 3 (três) vezes sem juros, sendo R$100,00 o valor mínimo de cada parcela.</li> 
                                        <li>Aprovação e Confirmação do Pagamento: para sua segurança, toda solicitação de reserva está sujeita à confirmação dos dados cadastrais e do pagamento. Esta conferência, quando necessária, poderá ser realizada através de contato telefônico e visa exclusivamente garantir a identidade do locatário e evitar qualquer dano ou prejuízo ao mesmo. Após a aprovação do pagamento, o locatário receberá por e-mail o documento Voucher de Confirmação de Reserva, o qual representa a garantia de reserva do veículo junto à locadora e comprovante de pagamento dos serviços contratados, que deverá ser impresso e apresentado à locadora no dia da retirada do veículo obrigatoriamente.</li> 
                                        <li>Pagamento não autorizado: a solicitação de reserva poderá ser cancelada caso o cartão de crédito utilizado para pagamento não seja aprovado pela administradora do cartão e/ou pelo sistema de cobrança, sem qualquer responsabilidade e/ou interferência da Mobicar. A reserva não poderá ser reutilizada após o seu cancelamento. A Mobicar não tem acesso aos motivos de não aprovação do pagamento, sendo necessária a consulta somente junto a administradora de seu cartão de crédito. Importante: o pagamento online e antecipado dos serviços contratados através da Mobicar não desobrigará o locatário da apresentação do cartão de crédito internacional e de sua titularidade à locadora na data de abertura do contrato de locação e retirada do veículo. O cartão de crédito deverá possuir o limite mínimo exigido pela locadora, quando será feita uma pré-autorização de débito, para cobrir eventuais danos ou avarias que o veículo possa sofrer durante a locação.</li> 
                                        <li>Serviços Opcionais: é comum a indicação e venda de serviços e acessórios adicionais pela locadora no ato da abertura do contrato de locação (serviços não contratados pelo locatário em sua reserva online). Você tem a opção de aceitar ou não quaisquer opcionais que lhe forem oferecidos no ato da abertura do contrato. Uma vez assinado o contrato e iniciada a locação, os serviços opcionais contratados não poderão ser cancelados e não serão reembolsados. Certifique-se de que as assinaturas solicitadas correspondem aos serviços opcionais que contratou (accepted - aceito) ou não (declined - recusado).</li> 
                                        <li>Alterações na Reserva: todas as alterações solicitadas na reserva estarão sujeitas a uma nova análise de disponibilidade de veículos junto à locadora contratada. Algumas alterações exigirão o recálculo dos valores dos serviços contratados com base nas tarifas atuais da locadora e conversão da moeda com base na cotação do dia. Uma nova cobrança poderá ser solicitada ao locatário quando os valores atualizados divergirem daqueles já pagos na emissão da reserva.</li> 
                                        <li>Alteração na Forma de Pagamento: após a aprovação da reserva, a forma de pagamento não poderá ser alterada.</li> 
                                        <li>Devolução antecipada: ocorrendo a interrupção da reserva após seu início de utilização, não haverá devolução de valores pagos.</li> 
                                        <li>Cancelamento: o locatário deverá solicitar o cancelamento da reserva em até 24 horas de antecedência da data prevista para retirada do veículo junto à locadora através da Central de Atendimento ao Cliente. Encargos não reembolsáveis em caso de estorno conforme item 10. Não haverá prorrogação do prazo para cancelamento caso o prazo de desistência tenha vencimento em dia não útil. A reserva não poderá ser reutilizada após o seu cancelamento.</li> 
                                        <li>Condições de Estorno e Taxas: a Mobicar realizará a devolução do valor pago ao locatário com dedução de encargos conforme abaixo: Para cancelamentos haverá taxa de 5% do valor total da venda.</li> 
                                        <li>O cancelamento da reserva pela locadora devido o não preenchimento dos requisitos necessários para a abertura do contrato como (idade mínima requerida, carteira de habilitação válida e aceitável no país de destino, passaporte válido, cartão de crédito internacional com limite disponível para caução, apresentação do voucher impresso, etc.), taxa de 5% do valor total da venda.</li> 
                                        <li>O não comparecimento do locatário para retirada do veículo junto à locadora (No-Show) de acordo com datas e horários estabelecidos no Voucher de Confirmação de Reserva, taxa de 10% do valor total da venda.</li> 
                                        <li>Para alteração, não haverá encargos quando tratar-se de uma única alteração. Na necessidade de outras alterações, será cobrado taxa de 5% por alteração sobre o valor total da venda. Importante Alterações estarão sujeitas a disponibilidade e reajuste de tarifa.</li> 
                                        <li>Estorno do Pagamento: a Mobicar solicitará o estorno do lançamento do débito à administradora do cartão de crédito no prazo de até 10 dias úteis a contar da data de emissão do cancelamento da reserva. A restituição do valor pago ocorrerá em faturas subsequentes quando a solicitação de estorno ocorrer dentro de um prazo de até 180 dias a contar da data em que foi efetivada a venda. Após esse prazo, qualquer estorno será administrado diretamente pela Mobicar com o cliente.</li> 
                                        <li>No-Show: em caso de No-Show (não comparecimento à locadora para retirada do veículo), a reserva não poderá ser alterada ou utilizada.</li> 
                                        <li>Autorização de Cambio e Transferência: o cliente autoriza a Mobicar Turismo Ltda. a realizar o cambio e transferência em seu nome junto às instituições bancárias brasileiras para fim exclusivo do pagamento às locadoras no exterior dos custos da locação de seu(s) veículo(s).</li> 
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <script>
        $(document).ready(function(){
          $('#tabs').tab();    
        });
    </script>
