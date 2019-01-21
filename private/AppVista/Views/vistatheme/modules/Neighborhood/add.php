            <div class="modal-header">
                <h5 class="modal-title" id="vista-modal-lLabel">Adicionar Bairro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?php echo $url; ?>neighborhood/save" id="vista-modal-form" method="post">

                <div class="modal-body">
                    <div class="alert" id="vista-modal-message" role="alert">
                        <span id=vista-modal-msg-body>
                            <!-- Message loads here -->
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <select name="city" id="city" class="form-control" required="">
                            <?php 
                                foreach($cities as $city)
                                {
                                    echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="neighborhood">Bairro</label>
                        <input type="text" class="form-control" value="" name="neighborhood" id="neighborhood" placeholder="Bairro...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="vista-submit"><i class="fas fa-save"></i> Salvar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-window-close"></i> Cancelar</button>
                </div>
            </form>


            <script> 
                $(document).ready(function() { 
                    $('#vista-modal-form').ajaxForm(vistaAddNeighborhood);
                }); 
            </script>