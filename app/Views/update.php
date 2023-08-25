<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
  <title>codeigniter 4 ajax insert form with validation</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
 
</head>
<body>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="/about">Insert</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/view">Display</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" >Update</a>
  </li>
  
</ul>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>

    <div class="row">
      <div class="col-md-9">
        <form action="javascript:void(0)"  name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
 
          <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" name="name" value="<?php echo $user['name']?>" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
             <input type="hidden" name="id" value="<?php echo $user['id']?>">
          </div> 
 
          <div class="form-group">
            <label for="email">Email Id</label>
            <input type="text" name="email" value="<?php echo $user['email']?>" class="form-control" id="email" placeholder="Please enter email id">
             
          </div>   
 
          <div class="form-group">
            <label for="message">Password</label>
            <input type="text" name="message" value="<?php echo $user['password']?>" placeholder="Please enter password" class="form-control"></textarea>
             
          </div>
 
          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Update</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#ajax_form").length > 0) {
      $("#ajax_form").validate({
      
    rules: {
      name: {
        required: true,
      },
  
      email: {
        required: true,
        maxlength: 50,
        email: true,
      }, 
 
      message: {
        required: true,
      },   
    },
    messages: {
        
      name: {
        required: "Please enter name",
      },
      email: {
        required: "Please enter valid email",
        email: "Please enter valid email",
        maxlength: "The email name should less than or equal to 50 characters",
        },      
     message: {
        required: "Please enter password",
      },
         
    },
    submitHandler: function(form) {
      $('#send_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('update') ?>",
        type: "POST",
        data: $('#ajax_form').serialize(),
        dataType: "json",
        success: function( response ) {
            console.log(response);
            console.log(response.success);
            $('#send_form').html('Submit');
            $('#res_message').html(response.msg);
            $('#res_message').show();
            $('#res_message').removeClass('d-none');
 
            document.getElementById("ajax_form").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#res_message').html('');
            },10000);
        }
      });
    }
  })
}
</script>
</body>
</html>
</body>
</html>