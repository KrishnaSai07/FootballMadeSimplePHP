<html>
    <head>
           <title>Welcome to Football Complete</title> 
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>
<body>
<?php
    require_once "header.php";
?>
<div class="jumbotron" style="background-color: rgb(255, 255, 255);">
<div class="container">
<div class="row align-center pl-6">
    <h3 class="text-dark text-center">Player Stats</h3>
</div>
<div class="row">
      <div class="col-6">
          <form action ="checkStats.php" method="post">
          <div class="form-group pt-3 pr-3">
                     <label class="text-dark">Please enter the player name:</label>
                     <input type="text" class="form-control pd-3" placeholder="Player Name" name="playerName">
                     <br>
                     <button type="submit" class="btn btn-primary text-white">Search</button>
          </div>
          </form>
      </div>
</div>
</div>
</body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>