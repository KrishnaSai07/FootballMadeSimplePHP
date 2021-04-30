<?php 
    $playerName = $_POST["playerName"];
    $age="";
    $club="";
    $position="";
    $country="";
    $matches="";
    $goals="";
    $assists="";
    $cleansheets="";
    $imgPath="/images/".$playerName.".jpg";


    try
    {
        $db = new PDO("mysql:host=localhost:3306;dbname=footballcomplete",'root','davidsilva');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("select * from playerStats where player_name='".$playerName."'");

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
           $age = $row["age"];
           $club = $row["club"];
           $position=$row["position"];
           $country=$row["country"];
           $matches=$row["matches"];
           $goals=$row["goals"];
           $assists=$row["assists"];
           $cleansheets=$row["cleansheets"];
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
    <style>
    .flip-box {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}

.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-box-front {
  background-color: #bbb;
  color: black;
}

.flip-box-back {
  background-color: black;
  height:400px;
  color: white;
  transform: rotateY(200deg);
}
</style>
<body>
<?php
    require_once "header.php";
?>
<div class="jumbotron" style="background-color: rgb(255, 255, 255);">
<div class="container">
<div class="row pt-4">
      <div class="col-6">
            <div class="flip-box">
                <div class="flip-box-inner">
                    <div class="flip-box-front">
                     <img src='<?php echo $imgPath ?>' alt='' style='width:500px;height:400px'>";
                    </div>
                <div class="flip-box-back">
                    <h5 class="pt-5">
                    <?php 
                        echo   $playerName
                    ?>
                    </h5>
                </div>
        </div>
    </div>
</div>
<div class="col-6">
      <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Player Stats</th>
                    <th scope="col"></th>
                </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><b>Age</b></th>
      <td><?php echo $age?></td>
    </tr>
    <tr>
      <th scope="row"><b>Club</b></th>
      <td><?php echo $club?></td>
    </tr>
    <tr>
      <th scope="row"><b>Country</b></th>
      <td><?php echo $country?></td>
    </tr>
    <tr>
      <th scope="row"><b>Postion</b></th>
      <td><?php echo $position?></td>
    </tr>
    <tr>
      <th scope="row"><b>Matches Played</b></th>
      <td><?php echo $matches?></td>
    </tr>
    <tr>
      <th scope="row"><b>Goals</b></th>
      <td><?php echo $goals?></td>
    </tr>
    <tr>
      <th scope="row"><b>Assists</b></th>
      <td><?php echo $assists?></td>
    </tr>
    <tr>
      <th scope="row"><b>Clean Sheets</b></th>
      <td><?php if($cleansheets == 0) 
      {echo "N/A"; }
      else 
      {echo $cleansheets;} ?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
<button class="btn-primary"><a class="text-white" href="playerStats.php">Back <-</a></button>
</body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


