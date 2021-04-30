<?php
    $leagueName = $_POST["leagueName"];
    $searchDate = $_POST["searchDate"];
    $count =0;
    
    echo "\n";
    $searchedDate =  substr($searchDate,8,2) . "-" .substr($searchDate,5,2) ."-" . substr($searchDate,0,4);

    echo $leagueName;
    echo $searchedDate;

    $matchId = array();
    $teamA = array();
    $teamB = array();
    $scoreA = array();
    $scoreB = array();

    try
    {
        $db = new PDO("mysql:host=localhost:3306;dbname=footballcomplete",'root','davidsilva');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("select * from fixtures where competition='".$leagueName."'" . " and date='".$searchedDate ."'");

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $count = $count +1;-
            array_push($matchId,$row["match_id"]);
            array_push($teamA,$row["teamA"]);
            array_push($teamB,$row["teamB"]);
            array_push($scoreA,$row["scoreA"]);
            array_push($scoreB,$row["scoreB"]);
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
        <img src="bpl.jpg" style="height:35px;width:60px;" class="pr-3" />
        <h5 class="pd-3">
            <?php
                   if($leagueName == 'EPL')
                   {
                       echo "Barclays English Premier League";
                   } 
            ?>
        </h5>
      <div class="col-10 pt-3">
      <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Fixtures & Results</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
  </thead>
  <tbody> 
  <?php 
  for($i=0;$i<$count;$i++)
  {
    echo "<tr>
      <td>"."<b class='pl-4'>".$teamA[$i]."</b>"."</td>
      <td class='pr-4'>".$scoreA[$i]." - ".$scoreB[$i]."</td>
      <td class='text-align-right'>"."<b>".$teamB[$i]."</b>"."</td>
      <td><form action='details.php' method='post'><button type='submit' class='btn btn-light text-dark' name='matchId' value=".$matchId[$i].">Match Stats</button></form></td>
    </tr>";
  }  
    ?>    
  </tbody>
</table>    
<button class="btn btn-light"><a class="text-dark" href="competitions.php">Go Back</a></button> 
      </div>
<div class="col-2 pl-4 pd-4 pt-3">
<button class="btn btn-light"><a class="text-dark" href="standings.php"><b>Standings</b></a></button> 
</div>
</div>
</div>
</body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>




