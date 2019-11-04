<?php
if(file_exists("scores.json"))
  $scores = json_decode(file_get_contents('scores.json'));
else
  $scores = array();

if($_POST["update"])
{

  // build record
  $record[player]=strtoupper($_POST["player"]);
  $record[score]=$_POST["score"];
  $record[hits]=$_POST["hits"];
  $record[inactive_hits]=$_POST["inactive_hits"];
  $record[misses]=$_POST["misses"];
  $record[time]=$_POST["time"];
  $record[raw_time]=$_POST["raw_time"];
  $record[date]=$_POST["date"];
  $record[stats]=$_POST["stats"];
  $record[stats_inactive]=$_POST["stats_inactive"];
  
  // add record to current scores
  array_push($scores, $record);

  // clear and write to file "scores.json"
  $file = fopen("scores.json", "w") or die("Unable to open file!");
  fwrite($file, json_encode($scores));
  fclose($file);

}

echo json_encode($scores);

?>