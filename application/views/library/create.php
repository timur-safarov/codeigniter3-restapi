<?php

    $query = $this->db->order_by('id', 'desc')->get('users');
    $users = $query->result_array();

?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Library</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('library');?>"> Back</a>
        </div>
    </div>
</div>


<form method="post" action="<?php echo base_url('library/store');?>">
    <?php

    if ($this->session->flashdata('errors')){
        echo '<div class="alert alert-danger">';
        echo $this->session->flashdata('errors');
        echo "</div>";
    }

    ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name user:</strong>
                <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Owner: Выберете пользователя которому принадлежит библиотека</strong>
                <select class="form-control" name="id_user" id="id_user" required>
                    <?php foreach ($users as $user): ?>

                        <option value="<?=$user['id'];?>"><?=$user['name'];?></option>

                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


</form>