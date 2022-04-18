<?php
    
    include_once __DIR__ . '/ExpandedTeams.php';
    include_once __DIR__ . '/../week4/team_final/include/functions.php';

    // Set up configuration file and create database
    $configFile = __DIR__ . '/../week4/team_final/model/dbconfig.ini';
    try 
    {
        $teamDatabase = new ExpandedTeams($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    // If POST, delete the requested team before listing all teams
    $teamListing = [];
    if (isPostRequest()) 
    {
        if (isset($_POST["Search"]))
        {
            $teamName="";
            $division="";
            if ($_POST["fieldName"] == "teamName")
            {
                $teamName = $_POST['fieldValue'];
            }
            else
            {
                $division = $_POST['fieldValue'];
            }
            //echo "Team: " . $teamName . "   Division: " . $divison;
            $teamListing = $teamDatabase->searchTeams($teamName, $division);
        }
        else
        {
        
            $id = filter_input(INPUT_POST, 'teamId');
            $teamDatabase->deleteTeam ($id);
            $teamListing = $teamDatabase->getTeams();
        }
    }
    else
    {
        $teamListing = $teamDatabase->getTeams();
    }

    $teams  = array_column($teamListing, 'teamName');
    $division = array_column($teamListing, 'division');

    array_multisort($division, SORT_ASC, $teams, SORT_ASC, $teamListing);


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
    <h2>Search for Team</h2>
  <form action="#" method="post">
      <input type="hidden" name="action" value="search" />
      <label>Search by Field:</label>
       <select name="fieldName">
              <option value="">Select One</option>
              <option value="teamName">Team Name</option>
              <option value="division">Division</option>              
          </select>
       <input type="text" name="fieldValue" />
      <button type="submit" name="Search">Search</button>     
  </form>      
  <h2>Sort Teams</h2>
<form  action="#" method="post">
    <input type="hidden" name="action" value="sort">
       <label>Sort By Field:&nbsp;&nbsp;&nbsp;</label>
       <select name="fieldName">
              <option value="">Select One</option>
              <option value="teamName">Team Name</option>
              <option value="division">Division</option>
              
          </select>
       <input type="radio" name="fieldValue" value="ASC" checked />Ascending
       <input type="radio" name="fieldValue" value="DESC" />Descending
       
      <button type="submit"  name="sortTeam">Sort</button>
</form>  
    <div class="col-sm-offset-2 col-sm-10">
        <h1>NFL Teams</h1>
        <br />
        <a href="../week4/team_final/updateTeam.php?action=Add">Add New Team</a>      
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
                    <form action="teamLinsting.php" method="post">
                        <input type="hidden" name="teamId" value="<?= $row['id']; ?>" />
                        <button class="btn glyphicon glyphicon-trash" type="submit"></button>
                        <?php echo $row['teamName']; ?>
                    </form>   
                </td>
                <td><?php echo $row['division']; ?></td> 
                <td><a href="../week4/team_final/updateTeam.php?action=Update&teamId=<?= $row['id'] ?>">Update</a></td> 
                
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
       
    </div>
    </div>
</body>
</html>