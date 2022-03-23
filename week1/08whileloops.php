<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While Loops</title>
    <style type="text/css">
        body {
            margin-left:20px;
            margin-top: 20px;
        }
        table,td {
                border: 1px solid black;
            }
            tr:nth-child(odd) {
                background-color: #fff;
            }
            tr:nth-child(even) {
                background-color: #eee;
            }
            td {
               padding: 5px;
            }
    </style>
</head>
<body>
    <h2>While Loops</h2>
    
    <table>
        <tr>
            <th>Month</th>
            <th>Interest Paid</th>
            <th>Balance</th>
        <tr>

        <?php
            // In the future, code like this is best placed in a function
            $balance = 1000;
            $apr = 17.99;
            $monthlyPayment = 100;
            $month = 1;
            $totalInterestPaid = 0;
            while ($balance>0) {
                $interestPaid = $balance * $apr / 12 / 100;
                $totalInterestPaid += $interestPaid;
                $balance = $balance + $interestPaid - $monthlyPayment;
                if ($balance < 0) $balance=0;
        ?>
            <tr>
                <td><?= $month; ?></td>
                <td><?php echo "$" . number_format($interestPaid, 2); ?></td>
                <td><?php echo "$" . number_format($balance, 2); ?></td>
                
            </tr>
        <?php
                $month++;
            } 
        ?>
    </table>
        <p>
            Total amount of interest paid: <?php echo "$" . number_format($totalInterestPaid, 2); ?>
        </p>

    <table>
        <tr>
            <th>Month</th>
            <th>Interest Paid</th>
            <th>Balance</th>
        <tr>

        <?php
           
            $balance = 1000;
            $apr = 17.99;
            $monthlyPayment = 100;
            $month = 1;
            $totalInterestPaid = 0;
            do {
                $interestPaid = $balance * $apr/12/100;
                $totalInterestPaid += $interestPaid;
                $balance = $balance + $interestPaid - $monthlyPayment;
                if ($balance < 0) $balance=0;
            ?>
            <tr>
                <td><?php echo $month; ?></td>
                <td><?php echo "$" .number_format($interestPaid, 2); ?></td>
                <td><?php echo "$" . number_format($balance, 2); ?></td>
            </tr>
            <?php
                $month++;
            } while($balance>0);
        ?>
    </table>
        <p>
            Total amount of interest paid: <?php echo "$" . number_format($totalInterestPaid, 2); ?>
        </p>
</body>
</html>