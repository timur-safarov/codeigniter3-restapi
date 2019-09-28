<?php

    $query = $this->db->order_by('id', 'desc')->get('libraries');
    $libraries = $query->result_array();

?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Library</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('book');?>"> Back</a>
        </div>
    </div>
</div>


<form method="post" action="<?php echo base_url('book/store');?>">
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
                <strong>Name Book:</strong>
                <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Library: Выберете библиотеку которой принадлежит книга</strong>
                <select class="form-control" name="id_lib" id="id_lib" required>
                    <?php foreach ($libraries as $library): ?>

                        <option value="<?=$library['id'];?>"><?=$library['name'];?></option>

                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


</form>