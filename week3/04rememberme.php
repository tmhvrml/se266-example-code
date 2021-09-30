<?php
    if (isset($_POST['addAmount'])) {
        $addAmount = filter_input (INPUT_POST, 'additionalAmount');
     
        $amount = filter_input (INPUT_POST, 'amount');
        $amount += $addAmount;
        //echo $amount;
    } else {
        $amount = 100;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="additionalAmount" value="5" />
        <input type="text" name="amount" value="<?= $amount ?>" />
        <input type="submit" name="addAmount" />
    </form>
</body>
</html>