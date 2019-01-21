            <div class="modal-header">
                <h5 class="modal-title" id="vista-modal-lLabel">Apagar Bairro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="alert" id="vista-modal-message" role="alert">
                    <span id=vista-modal-msg-body>
                        <!-- Message loads here -->
                    </span>
                </div>

                Você tem certeza que deseja apagar este bairro? 
                <br>
            </div>

            <form action="<?php echo $url; ?>neighborhood/delete/<?php echo $id; ?>" id="vista-modal-form" method="post">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" id="vista-submit"><i class="fas fa-trash-alt"></i> Apagar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-window-close"></i> Cancelar</button>
                </div>
            </form>


            <script> 
                $(document).ready(function() { 
                    $('#vista-modal-form').ajaxForm(vistaDeleteNeighborhood);
                }); 
            </script>