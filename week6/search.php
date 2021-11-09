<?php
    include_once __DIR__ . "/models/model_patients.php";
    include_once __DIR__ . "/includes/functions.php";
   
    
     $schoolName = "";
    $city = "";
    $state = "";
    if (isPostRequest()) {
        $schoolName = filter_input(INPUT_POST, 'schoolName');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        
       $results = getSchools ($schoolName, $city, $state);
      
    }
    include_once __DIR__ . "/includes/header.php";
?>

            <h2>Search Schools</h2>
            <form method="post" action="search.php">
                <div class="rowContainer">
                   <div class="col1">School Name:</div>
                   <div class="col2"><input type="text" name="schoolName" value="<?php echo $schoolName; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">City:</div>
                   <div class="col2"><input type="text" name="city" value="<?php echo $city; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">State:</div>
                   <div class="col2"><input type="text" name="state" value="<?php echo $state; ?>"></div> 
               </div>
                 <div class="rowContainer">
                   <div class="col1">&nbsp;</div>
                   <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-warning"></div> 
               </div>
            </form>
            
            <?php
                if (isset ($results)) {
                    $count = count ($results);
                    if ($count == 0) {
                        echo "<p>Could not find any school with these criteria.</p>";
                    }
                    else if ($count == 1) {
                        echo "<p>Found One School</p>";
                    } else {
                        echo "<p>Found $count schools</p>";
                    }
                }
                
                
            ?>
          
            <?php 
                if (isset ($results) && $count > 0) {
            
            ?>
                
                    <table class="table table-bordered table-striped" style="width:70%;">
                    <thead>
                        <tr>
                            <th>School Name</th>
                            <th>City</th>
                            <th>State</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($results as $row): ?>
                            <tr>
                                <td><?php echo $row['schoolName']; ?></td>
                                <td><?php echo $row['schoolCity']; ?></td>
                                <td><?php echo $row['schoolState']; ?></td>            
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php
                }
                include_once __DIR__ . "/includes/footer.php";
            ?>
        
