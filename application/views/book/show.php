<?php

    $library = $this->libraries->get_library($book[0]['id_lib']);

?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Book</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?=base_url('book');?>"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <?=$book[0]['name'];?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Library:</strong>
            
            <a href="<?=base_url("library/show/").$library[0]['id'];?>">
                <?=$library[0]['name'];?>
            </a>

        </div>
    </div>
</div>