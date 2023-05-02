<?php

    // Load helper functions (which also starts the session) then check if user is logged in
    include_once __DIR__ . '/controllers/listController.php'; 
   // This loads HTML header and starts our session if it has not been started
   include_once __DIR__ . "/controllers/header.php";


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
                    <form action="listTeams.php" method="post">
                        <input type="hidden" name="teamId" value="<?= $row['id']; ?>" />
                        <button class="btn glyphicon glyphicon-trash" name="deleteTeam" type="submit"></button>
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