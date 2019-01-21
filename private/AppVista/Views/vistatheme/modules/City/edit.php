            <div class="modal-header">
                <h5 class="modal-title" id="vista-modal-lLabel">Editar Cidade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?php echo $url; ?>city/save" id="vista-modal-form" method="post">

                <div class="modal-body">
                    <div class="alert" id="vista-modal-message" role="alert">
                        <span id=vista-modal-msg-body>
                            <!-- Message loads here -->
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <select name="state" id="state" class="form-control" required="">
                            <option value="1">Santa Catarina</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input type="text" class="form-control" value="<?php echo $city['name']; ?>" name="city" id="city" placeholder="Cidade...">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-success" id="vista-submit"><i class="fas fa-save"></i> Salvar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-window-close"></i> Cancelar</button>
                </div>
            </form>


            <script> 
                $(document).ready(function() { 
                    $('#vista-modal-form').ajaxForm(vistaEditCity);
                }); 
            </script>