<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Books</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?=base_url('book/create');?>"> Create New Book</a>
        </div>
    </div>
</div>

<table class="table table-bordered">

  <thead>
      <tr>
          <th>Name Book</th>
          <th>Library</th>
          <th width="220px">Action</th>
      </tr>
  </thead>

  <tbody>
   <?php 

   foreach ($books as $book) {

      if(!is_array($book)) break;

      $library = $this->libraries->get_library($book['id_lib']);
  ?>
      <tr>
          <td><?=$book['name']; ?></td>
          <td>

            <a href="<?php echo base_url('book/show/'.$book['id_lib']);?>">
              <?=$library[0]['name'];?>
            </a>

          </td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('book/delete/'.$book['id']);?>">
          <a class="btn btn-info" href="<?php echo base_url('book/'.$book['id']);?>"> show</a>

 
         <a class="btn btn-primary" href="<?php echo base_url('book/edit/'.$book['id']);?>"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>


</table>