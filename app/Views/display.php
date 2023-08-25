<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 Datatables Example - positronx.io</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="/about">Insert</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/view">Display</a>
  </li>
  
</ul>
<div class="container mt-5">

  <div class="mt-3">


     <table  class="data table table-bordered dataTable" width="100%" cellspacing="0" role="grid" id="bt" aria-describedby="dataTable_info" >
       <thead>
          <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
             <th colspan="2">Operations</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr >
             <td><?php echo $user['id']; ?></td>
             <td><?php echo $user['name']; ?></td>
             <td><?php echo $user['email']; ?></td>
             <td><a class="btn btn-danger" href="delete/<?php echo $user['id']?>">Delete</a></td>
             <td><a class="btn btn-primary" href="edit/<?php echo $user['id']?>">Update</a></td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>




</script>
</body>
</html>