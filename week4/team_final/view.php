<?php
    
    include_once __DIR__ . '/model/Teams.php';
    include_once __DIR__ . '/include/functions.php';

    $teamDatabase = new Teams();

    // If POST, delete the requested team before listing all teams
    if (isPostRequest()) {
        $id = filter_input(INPUT_POST, 'teamId');
        $teamDatabase->deleteTeam ($id);

    }
    $teamListing = $teamDatabase->getTeams();
?>
<html lang="en">
<head>
  <title>View NFL Teams</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        
    <div class="col-sm-offset-2 col-sm-10">
        <h1>NFL Teams</h1>
        <br />
        <a href="updateTeam.php?action=Add">Add New Team</a>      
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Team Name</th>
                <th>Division</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
      
        <?php foreach ($teamListing as $row): ?>
            <tr>
                <td>
                    <form action="view.php" method="post">
                        <input type="hidden" name="teamId" value="<?= $row['id']; ?>" />
                        <button class="btn glyphicon glyphicon-trash" type="submit"></button>
                        <?php echo $row['teamName']; ?>
                    </form>   
                </td>
                <td><?php echo $row['division']; ?></td> 
                <td><a href="updateTeam.php?action=Update&teamId=<?= $row['id'] ?>">Update</a></td> 
                
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
       
    </div>
    </div>
</body>
</html>