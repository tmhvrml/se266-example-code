<?php
// Example class for the Disney Character Voting app 

class DisneyVotes
{
   // This data field represents the database
   private $voteData;

   //*****************************************************
   // Teams class constructor:
   // Instantiates a PDO object based on given URL and
   // uses that to initialize the data field $teamData
   //
   // INPUT: URL of database configuration file
   // Throws exception if database access fails
   // ** This constructor is very generic and can be used to 
   // ** access your course database for any assignment
   // ** The methods need to be changed to hit the correct table(s)
   public function __construct($configFile) 
   {
       // Parse config file, throw exception if it fails
       if ($ini = parse_ini_file($configFile))
       {
           // Create PHP Database Object
           $votePDO = new PDO( "mysql:host=" . $ini['servername'] . 
                               ";port=" . $ini['port'] . 
                               ";dbname=" . $ini['dbname'], 
                               $ini['username'], 
                               $ini['password']);

           // Don't emulate (pre-compile) prepare statements
           $votePDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

           // Throw exceptions if there is a database error
           $votePDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           //Set our database to be the newly created PDO
           $this->voteData = $votePDO;
       }
       else
       {
           // Things didn't go well, throw exception!
           throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
       }

   } // end constructor

    // Retrieves all Disney characters in the database
    function getCharacters()
    {
        $voteTable = $this->voteData;   // Alias for database PDO
        $stmt = $voteTable->prepare("SELECT DisneyCharacterId, DisneyCharacterName, DisneyCharacterImage FROM DisneyCharacters ORDER BY DisneyCharacterName");

        $characters = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
            $characters = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $characters;
    }
    
   
    // Adds a vote for the charater whose ID is sent
    function insertDisneyVote($character_id, $voterIP, $voteDTG) 
    {
        $voteTable = $this->voteData;   // Alias for database PDO

        $stmt = $voteTable->prepare("INSERT INTO DisneyVotes SET DisneyCharacterID = :DisneyCharacterID, VoterIP = :VoterIP, VoterDateTime = :voteDTG");
        $results = "Not added";
        $binds = array(
            ":character_id" => $character_id,
            ":VoterIP" => $voterIP,
            ":voteDTG" => $voteDTG
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = 'Data Added';
        }
        
        return ($this->getVotes());
    }
    //
    
    // Gets total of votes for each character
    function getVotes() 
    {
        $results = [];
        $voteTable = $this->voteData;   // Alias for database PDO

         $sql = "SELECT DisneyCharacterName, COUNT(*) AS VoteCount FROM DisneyCharacters c 
                LEFT OUTER JOIN DisneyVotes v ON c.DisneyCharacterID=v.DisneyCharacterID
                GROUP BY DisneyCharacterName ORDER BY v.DisneyCharacterID ";
        $stmt = $voteTable->query ($sql);
       
       $votes = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $results[0] = array(); // list characters
       $results[1] = array (); // number of votes for each character
    
        foreach ($votes as $v) {
            array_push($results[0], $v['DisneyCharacterName']);
            array_push($results[1], $v['VoteCount']);
        } 
       
        return $results;
        // return (json_encode($results));
    }
 
}
    
