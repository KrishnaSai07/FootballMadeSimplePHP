<?php
    $matchId = $_POST["matchId"];
    $teamA = '';
    $teamB='';
    $imageA='';
    $imageB='';
    $goalsA = '';
    $goalsB = '';
    $goalTimeA = array();
    $goalTimeB = array();
    $scorerA = array();
    $scorerB = array();
    $competition = '';


    $shotsA = '';
    $shotsB = '';
    $shotsTargetA='';
    $shotsTargetB='';
    $possessionA='';
    $possessionB='';
    $passesA='';
    $passesB='';
    $passAccuracyA = '';
    $passAccuracyB = '';
    $foulsA = '';
    $foulsB = '';
    $yellowA = '';
    $yellowB = '';
    $redA = '';
    $redB = '';
    $offsidesA = '';
    $offsidesB = '';
    $cornersA = '';
    $cornersB = '';

    try
    {
        $db = new PDO("mysql:host=localhost:3306;dbname=footballcomplete",'root','davidsilva');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("select * from fixtures where match_id = '".$matchId."'");

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $competition = $row["competition"];
            $teamA = $row["teamA"];
            $teamB = $row["teamB"];
            $imageA ='/teams/'.$row["competition"]."/".$teamA.".png";
            $imageB ='/teams/'.$row["competition"]."/".$teamB.".png";
            $goalsA = $row["scoreA"];
            $goalsB = $row["scoreB"];
        }

        $db1 = new PDO("mysql:host=localhost:3306;dbname=footballcomplete",'root','davidsilva');
        $db1->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt1 = $db1->query("select * from Summary where match_id = '".$matchId."'");

        while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
        {
                $goalTime = $row["goalTime"];
                $tempGoalTime = explode(":",$goalTime);
                $goalTimeA = getTime($tempGoalTime[0]);
                $goalTimeB = getTime($tempGoalTime[1]);

                $goalScorer = $row["goalScorers"];
                $tempGoalScorer = explode(":",$goalScorer);
                $scorerA = getTime($tempGoalScorer[0]);
                $scorerB = getTime($tempGoalScorer[1]); 

                // echo count($goalTimeB);
                // echo count($scorerB);

        }

        $db2 = new PDO("mysql:host=localhost:3306;dbname=footballcomplete",'root','davidsilva');
        $db2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt2 = $db2->query("select * from stats where match_id = '".$matchId."'");

        while($row = $stmt2->fetch(PDO::FETCH_ASSOC))
        {
               $tempShots = explode(":",$row["shots"]);
               $tempShotsTarget = explode(":",$row["shotsOnTarget"]);
               $tempPossession = explode(":",$row["possession"]);
               $tempPasses = explode(":",$row["passes"]);
               $tempPassAccuracy = explode(":",$row["passAccuracy"]);
               $tempFouls = explode(":",$row["fouls"]);
               $tempYellow = explode(":",$row["yellowCards"]);
               $tempRed = explode(":",$row["redCards"]);
               $tempOffsides = explode(":",$row["offsides"]);
               $tempCorners = explode(":",$row["corners"]);
            
               $shotsA = $tempShots[0];
               $shotsB = $tempShots[1];
               $shotsTargetA = $tempShotsTarget[0];
               $shotsTargetB = $tempShotsTarget[1];
               $possessionA = $tempPossession[0];
               $possessionB = $tempPossession[1];
               $passesA = $tempPasses[0];
               $passesB = $tempPasses[1];
               $passAccuracyA = $tempPassAccuracy[0];
               $passAccuracyB = $tempPassAccuracy[1];
               $foulsA = $tempFouls[0];
               $foulsB = $tempFouls[1];
               $yellowA = $tempYellow[0];
               $yellowB = $tempYellow[1];
               $redA = $tempRed[0];
               $redB = $tempRed[1];
               $offsidesA = $tempOffsides[0];
               $offsidesB = $tempOffsides[1];

               $cornersA = $tempCorners[0];
               $cornersB = $tempCorners[1];
        }


    }
    catch(PDOException $e)
    {
        printf("Unable to connect to database: %s\n", $e->getMessage());
    }

    function getTime($x)
    {
          $new = explode(";",$x);
          return $new;  
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
<div class="row align-center pl-6">
    <h3 class="text-dark text-center"><?php echo $competition  ?></h3>
</div>
<div class="row">
      <div class="col-1">
            
      </div>
      <div class="col-2">
            <img src="<?php echo $imageA ?>" style="width:100px;height:100px">
      </div>
      <div class="col-1 pt-4 pr-5">
            <b class="pr-5"style="font-size:50px"><?php echo $goalsA ?></b>
      </div> 
      <div class="col-3 pl-5" style="left:40px;">
      <b style="font-size:20px;">Goals</b>
      </div> 
    <div class="col-1 pt-4" >
      <b style="font-size:50px"><?php echo $goalsB ?></b>
    </div> 
    <div class="col-1">
    <img src="<?php echo $imageB ?>" style="width:100px;height:100px">
    </div>
    <div class="col-2 pl-5" style="left:90px;">
    <button class="btn btn-light"><a class="text-dark" href="competitions.php"><b><- Back</b></a></button> 
    </div>
</div>
<div class="row pt-2">
<?php
if($scorerA[0] != "0")
{
$left= "<div class='col-2'>
      
      </div>";
$leftScorer= "<div class='col-4' style='left:180px;'>";
$rightScorer="<div class='col-4' style='right:30px;'>";
$middle = "<div class='col-2' style='left:0px;'>
                <img src='football.png' style='width:20px;height:20px' />
           </div>
";
for($i=0;$i<count($goalTimeA);$i++)
{
        if($scorerA[$i] != 'NA')
        {
       $leftScorer = $leftScorer . "<p>".$goalTimeA[$i]."' ".$scorerA[$i]."</p>"; 
        }
}
for($i=0;$i<count($goalTimeB);$i++)
{
    if($scorerB[$i] != 'NA')
    {
       $rightScorer = $rightScorer . "<p>".$goalTimeB[$i]."' ".$scorerB[$i]."</p>"; 

    }
}
echo "<div class='col-1'></div>" .$leftScorer."</div>".$middle.$rightScorer."</div><div class='col-1'></div>";

}
?>
</div>
<div class="row">
<div class="col-1">

</div>
<div class="col-9">
<table class="table" style="left:20px;">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Match Stats</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>  
                    <tr>
                        <td><?php echo $shotsA ?></td>
                        <td class="pl-3"><b>Shots</b></td>
                        <td><?php echo $shotsB ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $shotsTargetA ?></td>
                        <td class="pl-3"><b>Shots On Target</b></td>
                        <td><?php echo $shotsTargetB ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $possessionA ?>%</td>
                        <td class="pl-3"><b>Possession</b></td>
                        <td><?php echo $possessionB ?>%</td>
                    </tr>
                    <tr>
                        <td><?php echo $passesA ?></td>
                        <td class="pl-3"><b>Passes</b></td>
                        <td><?php echo $passesB ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $passAccuracyA ?>%</td>
                        <td class="pl-3"><b>Pass Accuracy</b></td>
                        <td><?php echo $passAccuracyB ?>%</td>
                    </tr>
                    <tr>
                        <td><?php echo $foulsA ?></td>
                        <td class="pl-3"><b>Fouls</b></td>
                        <td><?php echo $foulsB ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $yellowA ?></td>
                        <td class="pl-3"><b>Yellow Cards</b></td>
                        <td><?php echo $yellowB ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $redA ?></td>
                        <td class="pl-3"><b>Red Cards</b></td>
                        <td><?php echo $redB ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $offsidesA ?></td>
                        <td class="pl-3"><b>Offsides</b></td>
                        <td><?php echo $offsidesB ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $cornersA ?></td>
                        <td class="pl-3"><b>Corners</b></td>
                        <td><?php echo $cornersB ?></td>
                    </tr>
                </tbody>
</div>

<div class="col-1">

</div>
</div>
</div>
</div>
</body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>