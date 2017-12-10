<?php echo validation_errors('<div class="error">', '</div>'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/select2/dist/css/select2.min.css' ?>">
</head>
<body>	

                                                                                      
        
  <div class="container">
  <h2>Add User</h2>
  <!-- <a>Add User</a>  --> 
                                                                          
  <div class="table-responsive"> 
  <?php echo form_open_multipart('user/add', 'class="email" id="myform" method="post"'); ?>
    <table>
    <tr>
    <td> Name : <input type="text" class="form-control" name="name"></td>
    </tr>
    <tr>
    <td> Email : <input type="text" name="email"></td>
    </tr>
    <tr>
    <td> Gender : <input type="radio" name="gender" value="0" />Male
    <input type="radio" name="gender" value="1" /> Female
    </td>
    </tr>
    <tr>
    <td> Contry : <select name="country[]" class="js-example-basic-single form-control" multiple>
      <option value="1" selected="selected">India</option>
      <option value="2" selected="selected">USA</option>
    </select></td>
    </tr>
    <tr>
     <td>Upload Profile Pic: <input type="file" name="picture"></td>
    </tr>
	<tr>
		<td> Password: <input type="password" name="password"></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="save" value="Add">
        <button>Cancel</button>
      </td>
    </tr>
    </table>
  </div>
</div>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function(){
		$('.js-example-basic-single').select2({
			placeholder: 'Select an option'
		});
	});
</script>
</body>
</html>

<?php
?>