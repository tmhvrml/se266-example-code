 <?php
        // This code runs everytime the page loads

        include __DIR__ . '/model/model_teams.php';
        include __DIR__ . '/include/functions.php';
        
        // let's figure out if we're doing update or add
        if (isset($_GET['action'])) {
            $action = filter_input(INPUT_GET, 'action');
            $id = filter_input(INPUT_GET, 'teamId');
            if ($action == "update") {
                $row = getTeam($id);
                $teamName = $row['teamName'];
                $division = $row['division'];
            } else {
                $teamName = "";
                $division = "";
            }
            
            
        } elseif (isset($_POST['action'])) {
            $action = filter_input(INPUT_POST, 'action');
            $id = filter_input(INPUT_POST, 'teamId');
            $teamName = filter_input(INPUT_POST, 'team');
            $division = filter_input(INPUT_POST, 'division');
            
        } 
            
       
       if (isPostRequest() && $action == "add") {
       
           $result = addTeam ($teamName, $division);
           header('Location: view.php');
           
       } elseif (isPostRequest() && $action == "update") {
           $result = updateTeam ($id, $teamName, $division);
           header('Location: view.php');
           
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
    
<div class="container">
    
  <h2>Add Team</h2>
  <form class="form-horizontal" action="editTeam.php" method="post">
      <input type="text" name="action" value="<?= $action; ?>">
      <input type="text" name="teamId" value="<?= $id; ?>">
      
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
  </form>
  
  <div class="col-sm-offset-2 col-sm-10"><a href="./view.php">View Teams</a></div>
</div>

</body>
</html>