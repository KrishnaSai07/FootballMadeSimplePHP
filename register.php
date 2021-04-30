<?php
$bakPic = "Fms.jpg";
?>

<html>
    <head>
           <title>Welcome to Football Complete</title> 
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>
    <style>
            body {
            height: 100%;
            margin: 0;
                }

            .bg {
            /* The image used */
            background-image: url('<?php echo $bakPic;?>');

            /* Full height */
            height: 100%; 

          /* Center and scale the image nicely */
             background-position: center;
             background-repeat: no-repeat;
             background-size: cover;
            }
    </style>
    <body>
        <div class="row">
            <div class="col-7">    
                 <img src="Fms.jpg" style="width:803px;height:633px">
            </div>
            <div class="col-5 pl-5 pt-5 bg-dark bg-gradient">
                <div class="col-md-6 col-sm-12">
            <div class="login-form pl-3">
                    <h3 class="text-white">Football Complete</h3>
               <form action="completed.php" method="post">
                  <div class="form-group pt-3">
                     <label class="text-white">User Name</label>
                     <input type="text" class="form-control" placeholder="User Name" name="username">
                  </div>
                  <div class="form-group pt-3">
                     <label class="text-white">Email Address</label>
                     <input type="text" class="form-control" placeholder="User Name" name="email">
                  </div>
                  <div class="form-group">
                     <label class="text-white">Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                     <label class="text-white">Re-Confirm Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="reconfirm">
                  </div>
                  <button type="submit" class="btn btn-black text-white">Create Account</button>
               </form>
            </div>
            </div>
            </div>    
            </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>