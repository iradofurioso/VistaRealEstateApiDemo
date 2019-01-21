            <div class="modal-header">
                <h5 class="modal-title" id="vista-modal-lLabel">Propriedades</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?php 
                    if(!isset($result['status'])) 
                    {
                        $count = 1;

                        foreach($result as $res)
                        {
                            echo '<h4>Imóvel número: '.$count.'</h4><br>';
                            echo '<strong>Dados do Imóvel</strong><br>';
                            echo 'Código: ' . $res['Codigo'] . '<br>';
                            echo 'Cidade: ' . $res['Cidade'] . '<br>';
                            echo 'Bairro: ' . $res['Bairro'] . '<br>';

                            if(isset($res['ValorVenda']) and ($res['ValorVenda']!=''))
                                echo 'Valor: R$' . number_format($res['ValorVenda'], 2, ',', '.') . '<br>';
                            
                            echo '<hr></hr>';
                        }
                    }
                    else
                    {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Nenhum imóvel encontrado para este endereço!
                            </div>
                        <?php
                    }
                ?> 
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-window-close"></i> Fechar</button>
            </div>
                  