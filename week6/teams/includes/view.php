<table class="table table-striped" style="width:50%">
    <thead>
        <tr>
            <th>Team Name</th>
            <th>Division</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $row): ?>
            <tr>
                <td><?php echo $row['teamName']; ?></td>
                <td><?php echo $row['division']; ?></td> 
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
   
