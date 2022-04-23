<?php

    // Load helper functions (which also starts the session) then check if user is logged in
    include_once __DIR__ . '/include/functions.php'; 
    if (!isUserLoggedIn())
    {
        header ('Location: login.php');
    }

   include_once __DIR__ . '/model/TeamSearcher.php';

    // Set up configuration file and create database
    $configFile = __DIR__ . '/model/dbconfig.ini';
    try 
    {
        $teamDatabase = new TeamSearcher($configFile);
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

// Preliminaries are done, load HTML page header
    include_once __DIR__ . "/include/header.php";

?>
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
  <div style="background-color: #fff0cc; padding: 10px;">

  <h2>Sort Teams [<em>not implemented</em>]</h2>
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
</div>
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
                    <form action="teamListing.php" method="post">
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