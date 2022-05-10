<?php
    include ('functions.php');
    
    include_once __DIR__ . '/model/DisneyVotes.php';

    // Set up configuration file and create database
    $configFile = __DIR__ . '/model/dbconfig.ini';
    try 
    {
        $voteDatabase = new DisneyVotes($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
     
    /*
     * We execute the statement and make sure we
     * got some results back.
     */
    $characters =  $voteDatabase->getCharacters();
 //   echo var_dump($characters);
?>


<html>
<head>
<title>Vote for your favorite Disney Character</title>
<style type="text/css">
    .main {margin-left: 100px; margin-top: 100px;}
    .character {float: left; margin-right: 10px; border: 10px solid black; padding: 0px 10px 0px 0px; width: 300px;}
    .results {float: left; margin-right: 10px; border: 1px solid black; width: 400px; margin-top: 100px;}
    .button-size {width: 200px; height: 50px;}
    .button-div {margin: 10px 0px 10px 30px;}
    h2, h3 {margin-left: 50px;}
   
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

<script>
    async function insertVote(caller) 
    { 
        // The URL of the PHP router function  
        let ajaxURL = 'vote.php';
        $ch = caller.dataset.characterId;
        // JSON to pass we will pass to router
        let ajaxJSONdata = { characterId:  $ch };

        // Use POST to fetch the URL and wait for a response
        try 
        {
            let response = await fetch(ajaxURL, 
                                {
                                    method: 'POST', 
                                    body: JSON.stringify(ajaxJSONdata), 
                                    headers: 
                                    {
                                        'Content-Type': 'application/json'
                                    }
                                }); // end fetch URL w/POST

            // Parse the response into a JSON array        
            let jsonResponse = await response.json();
            displayChart(jsonResponse);
            // Assign the response into a DOM object for display
            //document.getElementById("resultDiv").innerHTML = jsonResponse;

            // Display in console for error checking
            // console.log(json);
   
        } 
        catch (error) 
        {
               console.error(error);
        }

    }

</script>
  
</head>
<body>

    <div class="main"><h1>Vote for your favorite Disney Character</h1>

        <?php foreach ($characters as $c): ?>
        <div class="character">
            <h3><?php echo $c['DisneyCharacterName']; ?></h3>
            <img src="./images/<?php echo $c['DisneyCharacterImage']; ?> ">
            <div class="button-div">
            <input type="button" 
                   class="btn btn-success button-size" 
                   data-character-id="<?php echo $c['DisneyCharacterId']; ?>"
                   value="Vote for <?php echo $c['DisneyCharacterName']; ?>"
                   onclick="insertVote(this)" >
            </div>
         </div>       
        <?php endforeach; ?>

        <div class="results">
            <h2>Voting Results</h2>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</body>
</html>

<script>
    function displayChart () {
        $.get ("vote.php", function(data) {
            votes = JSON.parse(data);
            
            new Chart(document.getElementById("myChart"), {
                type: 'bar',
                data: {
                  labels: votes[0],
                  datasets: [
                    {
                      label: "Number of Votes",
                      backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                      data: votes[1],
                      borderWidth: 10
                    }
                  ]
                },
                options: {
                  legend: { display: false },
                  title: {
                    display: false,
                    text: 'Number of Votes By Disney Character'
                  },
                  scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        })
    }
    // $(document).ready (function (e) {
    //     displayChart ();
    //     $(".btn").click (function (e) {
            
    //         $.post ("vote.php", { characterId: $(this).dataset.characterId}, function (data) {
    //            displayChart ();
    //         })
    //     });
    // })
</script>