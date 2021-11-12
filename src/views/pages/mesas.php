<?php $render('header'); ?>

<script>
    $('#abrirMesa').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>
<div class="col-11 justify-content-center">
    <div class="row h-50">
        <a class="col h-100 btn btn-outline-primary" href="<?= $base ?>/mesa/1">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="<?= $base ?>/mesa/2">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="<?= $base ?>/mesa/3">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="<?= $base ?>/mesa/4">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
    </div>
    <div class="row h-50">
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
    </div>
    <div class="row h-50">
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
        <a class="col h-100 btn btn-outline-primary" href="#">
            Mesa
        </a>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="abrirMesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>






<?php $render('footer'); ?>