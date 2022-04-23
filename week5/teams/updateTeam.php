 <?php
 
  // This code runs everything the page loads
  include_once __DIR__ . '/model/TeamSearcher.php';
  include_once __DIR__ . '/../week4/team_final/include/functions.php';

    // Set up configuration file and create database
    $configFile = __DIR__ . '/../week4/team_final/model/dbconfig.ini';
  
  // Set up configuration file and create database
  $configFile = __DIR__ . '/model/dbconfig.ini';
  try 
  {
      $teamDatabase = new Teams($configFile);
  } 
  catch ( Exception $error ) 
  {
      echo "<h2>" . $error->getMessage() . "</h2>";
  }   
   
  // If it is a GET, we are coming from view.php
  // let's figure out if we're doing update or add
  if (isset($_GET['action'])) 
  {
      $action = filter_input(INPUT_GET, 'action');
      $id = filter_input(INPUT_GET, 'teamId', );
      if ($action == "Update") 
      {
          $row = $teamDatabase->getTeam($id);
          $teamName = $row['teamName'];
          $division = $row['division'];
      } 
      //else it is Add and the user will enter team & dvision
      else 
      {
          $teamName = "";
          $division = "";
      }
  } // end if GET

  // If it is a POST, we are coming from updateTeam.php
  // we need to determine action, then return to view.php
  elseif (isset($_POST['action'])) 
  {
      $action = filter_input(INPUT_POST, 'action');
      $id = filter_input(INPUT_POST, 'teamId');
      $teamName = filter_input(INPUT_POST, 'team');
      $division = filter_input(INPUT_POST, 'division');

      if ($action == "Add") 
      {
          $result = $teamDatabase->addTeam ($teamName, $division);
      } 
      elseif ($action == "Update") 
      {
          $result = $teamDatabase->updateTeam ($id, $teamName, $division);
      }

      // Redirect to team listing on view.php
      header('Location: teamListing.php');
  } // end if POST

  // If it is neither POST nor GET, we go to view.php
  // This page should not be loaded directly
  else
  {
    header('Location: teamListing.php');  
  }
      
?>
    

<html lang="en">
<head>
  <title><?= $action ?> NFL Team</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <span class="navbar-brand">Team Listing</span>
    </div>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="logoff.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <p></p>
  <form class="form-horizontal" action="updateTeam.php" method="post">
    
  <div class="panel panel-primary">
<div class="panel-heading"><h4><?= $action; ?> Team</h4></div>
<p></p>
    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">Team Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team" placeholder="Enter team name" name="team" value="<?= $teamName; ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Division:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter division" name="division" value="<?= $division; ?>">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default"><?php echo $action; ?> Team</button>
      </div>
    </div>
</div>
    <p></p>
    <div class="panel panel-warning">
    <div class="panel-heading"><strong>This is for testing and verification:</strong></div>    
        Action: <input type="text" name="action" value="<?= $action; ?>">
        Team ID: <input type="text" name="teamId" value="<?= $id; ?>">
      </div>

  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="./teamListing.php">View Teams</a></div>
</div>
</div>

</body>
</html>