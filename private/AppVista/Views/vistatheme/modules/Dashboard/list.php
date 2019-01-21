    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>


    <div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="javascript:void(0);" class="list-group-item visitor" style="cursor: default;">
                    <h3 class="pull-right">
                        <i class="far fa-map"></i>
                    </h3>
                    <h4 class="list-group-item-heading count"><?php echo $qtdCities; ?></h4>
                    <p class="list-group-item-text">
                        Cidades</p>
                </a>
                <a href="javascript:void(0);" class="list-group-item" style="cursor: default;">
                    <h3 class="pull-right">
                        <i class="fas fa-map-marker-alt"></i>
                    </h3>
                    <h4 class="list-group-item-heading count"><?php echo $qtdNeigh; ?></h4>
                    <p class="list-group-item-text">
                        Bairros</p>
                </a>
            </div>
        </div>