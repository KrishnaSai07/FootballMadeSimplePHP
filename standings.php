<?php

    $club = array();
    $matches = array();
    $won = array();
    $draws = array();
    $loss = array();
    $gf = array();
    $ga = array();
    $gd = array();
    $points = array();

    $count = 0;

    try
    {
        $db = new PDO("mysql:host=localhost:3306;dbname=footballcomplete",'root','davidsilva');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("select * from standings");

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
          
            $count = $count +1;
            array_push($club,$row["club"]);
            array_push($matches,$row["matches"]);
            array_push($won,$row["won"]);
            array_push($draws,$row["draws"]);
            array_push($loss,$row["loss"]);
            array_push($gf,$row["GF"]);
            array_push($ga,$row["GA"]);
            array_push($gd,$row["GD"]);
            array_push($points,$row["points"]);

        }


    }
    catch(PDOException $e)
    {
        printf("Unable to connect to database: %s\n", $e->getMessage());
    }

?>
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
<div class="row pt-3">
      <div class="col-10 pt-3">
      <table class="table">
      <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Club</th>
                <th scope="col">Matches Played</th>
                <th scope="col">Won</th>
                <th scope="col">Draw</th>
                <th scope="col">Loss</th>
                <th scope="col">Points</th>
                <th scope="col">GF</th>
                <th scope="col">GA</th>
                <th scope="col">GD</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  for($i=0;$i<$count;$i++)
  {
    echo "<tr>
    <th scope='row'>".($i+1)."</th>
      <td>".$club[$i]."</td>
      <td>".$matches[$i]."</td>
      <td>".$won[$i]."</td>
      <td>".$draws[$i]."</td>
      <td>".$loss[$i]."</td>
      <td>".$points[$i]."</td>
      <td>".$gf[$i]."</td>
      <td>".$ga[$i]."</td>
      <td>".$gd[$i]."</td>
    </tr>";
  }  
    ?>    
  </tbody>
</table>    
<button class="btn btn-light"><a class="text-dark" href="competitions.php"><b><- Back</b></a></button> 
</div>
</div>
</div>
</body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>




