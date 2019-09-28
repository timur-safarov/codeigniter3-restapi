<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of libraries</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?=base_url('library/create');?>"> Create New Library</a>
        </div>
    </div>
</div>


<table class="table table-bordered">


  <thead>
      <tr>
          <th>Name Library</th>
          <th>Owner</th>
          <th width="220px">Action</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($libraries as $library) {

      if(!is_array($library)) break;
      
      $user = $this->users->get_user($library['id_user']);
  ?>
      <tr>
          <td><?=$library['name']; ?></td>
          <td>

            <a href="<?php echo base_url('user/show/'.$library['id_user']);?>">
              <?=$user[0]['name'];?>
            </a>

          </td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('library/delete/'.$library['id']);?>">
          <a class="btn btn-info" href="<?php echo base_url('library/'.$library['id']);?>"> show</a>

 
         <a class="btn btn-primary" href="<?php echo base_url('library/edit/'.$library['id']);?>"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>


</table>