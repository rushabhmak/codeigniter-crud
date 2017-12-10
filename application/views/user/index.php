<!DOCTYPE html>
<html>
<head>
	<title>Users List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php 
   echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?> 
</head>
<body>

                                                                                      
        
  <div class="container">
  <h2>Users List</h2>
  <!-- <a>Add User</a>  --> 
  <?php echo anchor('user/add', 'Add User'); ?>                                                                          
  <div class="table-responsive"> 
  <button>   
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody>
            <?php if( isset($users) && count($users) > 0 ) { 
            	foreach($users as $user):
            	?>
            <tr>
            	<td><?php echo $user['id']; ?></td>
           		<td><?php echo $user['email']; ?></td>
           		<td><?php echo $user['password']; ?></td>
           		<td> <?php echo anchor('user/delete_user/'.$user['id'],'Delete', array( 'onclick' => "return confirm('Are you want to delete?');")); ?></td>

            </tr>
        <?php endforeach;
        }
           if (isset($links)) { ?>
                <tfoot>
                <?php echo $links ?>
                 </tfoot>
            <?php } 
         else {

        } ?>
        </tbody>
    </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>

<?php
?>