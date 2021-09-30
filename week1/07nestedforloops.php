<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nested for loop</title>
        <style type="text/css">
            table {
                border: 1px solid black;
            }
            td {
                width: 50px; 
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h2>Hard Coded HTML</h2>
        <table border="1">
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>            
        </table>
        <hr />
        
        <h2>PHP Generated</h2>
       <table border="1" cellpadding="5">

        <?php 
            define("ROWS", 15);
            define("COLS", 8);
            
            for($row = 1; $row <= ROWS; $row++):?>
            <tr> 
            <?php for($col = 1; $col <= COLS; $col++):?>
                <td> <?php echo "($row, $col)"; ?> </td>
            <?php endfor; ?>                
            </tr>
        <?php endfor; ?>
        </table>
    </body>
</html>
