<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Users</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?=base_url('user/create');?>"> Create New User</a>
        </div>
    </div>
</div>


<table class="table table-bordered">


  <thead>
      <tr>
          <th>Name User</th>
          <th>Login</th>
          <th width="220px">Action</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($users as $user) { 

      if(!is_array($user)) break;

    ?>      
      <tr>
          <td><?=$user['name']; ?></td>
          <td><?=$user['login']; ?></td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('user/delete/'.$user['id']);?>">
          <a class="btn btn-info" href="<?php echo base_url('user/'.$user['id']);?>"> show</a>

 
         <a class="btn btn-primary" href="<?php echo base_url('user/edit/'.$user['id']);?>"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>


</table>