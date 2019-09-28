<?php
    $library = $this->libraries->get_library($book[0]['id_lib']);

    $query = $this->db->where('id !=', $book[0]['id_lib'])->order_by('id', 'desc')->get('libraries');
    $libraries = $query->result_array();

?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Book</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('book');?>"> Back</a>
        </div>
    </div>
</div>


<form method="post" action="<?php echo base_url('book/update/'.$book[0]['id']);?>">
    <?php

        if ($this->session->flashdata('errors')){
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }

    ?>

    <div class="row">

        <input type="hidden" name="id" class="form-control" value="<?=$book[0]['id']; ?>">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="<?=$book[0]['name']; ?>">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Library: Выберете библиотеку которой принадлежит книга</strong>
                <select class="form-control" name="id_lib" id="id_lib" required>
                    <option value="<?=$library[0]['id'];?>"><?=$library[0]['name'];?></option>
                    
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