<?php
# check to see if we have been given a query
if(!isset($_POST["search"])) {
  echo("No query recieved.");
  exit();
}
# the name of the user the user was searching for
$username = $_POST["search"];

try {
  # execute our query
  DB::query('SELECT * FROM cl_users, st_users WHERE username = $username', array(':username'=>$username));
  # fetch our results
  $results = $query->fetchAll(PDO::FETCH_ASSOC);
  # make sure we have at least one result
  if(count($results) > 0) {
    # you can now use any profile
    # loop through each profile
    # or even just use the first like this:
    $profile = $results[0];
    echo("Your search for: <b>\"" . $username . "\"</b> returned: <b>\"" . count($results) . "\"</b> results.");
  }
} catch(PDOException $e) {
  # catch and handle errors here
  echo("Oops something went wrong :(");
}
?>