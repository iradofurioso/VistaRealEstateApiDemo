    <!-- BEGIN: Modal -->
    <div class="modal fade" id="vista-modal" tabindex="-1" role="dialog" aria-labelledby="vista-modal-lLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!-- BEGIN: Content -->
            <div class="modal-content" id="vista-modal-content">
                <!-- Content here -->
            </div>
            <!-- END: Content -->
        </div>
    </div>
    <!-- END: Modal -->
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bairros</h1>
    </div>

    <div class="form-group">
        <a href="#" class="btn btn-success" onclick="vistaTriggerModal('', 'neighborhood/add');" role="button" aria-pressed="true">
            <i class="fas fa-plus-circle"></i> Adicionar
        </a>
    </div>

    <table id="vista-grid" class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Código</th>
              <th>Bairro</th>
              <th>Cidade</th>
              <th>Imóveis</th>
              <th>Funções</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($addrs as $addr): ?>
                <tr id="tr_<?php echo $addr['id']; ?>">
                    <td><i class="fas fa-barcode"></i> <?php echo $addr['id']; ?></td>
                    <td><?php echo $addr['name']; ?></td>
                    <td><?php echo $addr['cityname']; ?></td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-info" onclick="vistaTriggerModal(<?php echo $addr['id']; ?>, 'property/index');" role="button" aria-pressed="true">
                            <i class="fas fa-search-location"></i>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-danger" onclick="vistaTriggerModal(<?php echo $addr['id']; ?>, 'neighborhood/delete');" role="button" aria-pressed="true">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="vistaTriggerModal(<?php echo $addr['id']; ?>, 'neighborhood/edit');" role="button" aria-pressed="true">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
                <td colspan="5">
                    <?php if($qtd>0):?>
                        <div id="total-found-data">
                            <strong>Total: <span id="total-found-data-qqty"><?php echo $qtd; ?></span> bairros.</strong>
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
          </tfoot>
        </table>
