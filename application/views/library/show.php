<?php

    $user = $this->users->get_user($library[0]['id_user']);

?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Library</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?=base_url('library');?>"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <?=$library[0]['name'];?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Owner:</strong>
            
            <a href="<?=base_url("user/show/").$user[0]['id'];?>">
                <?=$user[0]['name'];?>
            </a>

        </div>
    </div>
</div>