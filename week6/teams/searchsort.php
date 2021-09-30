<?php
    include __DIR__ . '/model/model_teams.php';
    $action = filter_input(INPUT_POST, 'action');
    $fieldName = filter_input(INPUT_POST, 'fieldName');
    $fieldValue = filter_input(INPUT_POST, 'fieldValue');
    if ( $action === 'sort' && $fieldName != '' ) {
            $teams = sortTeams ($fieldName, $fieldValue);   
    }
    else if ( $action === 'search' && $fieldName != '' ) {
            $teams = searchTeams ($fieldName, $fieldValue);
    } else {
        $teams = getTeams ();  
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            <meta charset="UTF-8">
    <style type="text/css">
        body {margin-left: 20px;}
    </style>
        <title>Search and Sort</title>
    </head>
    <body>
 
        <?php
            include __DIR__ . '/includes/searchForm.php';
            include __DIR__ . '/includes/sortForm.php';
            include __DIR__ . '/includes/view.php';
        
        ?>
    </body>
</html>
