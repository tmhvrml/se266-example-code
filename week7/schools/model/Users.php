<?php

//*****************************************************
//
// This class provides a wrapper for the database 
// All methods work on the users table

class Users
{
    // This data field represents the database
    private $userData;

    // Used to salt user password
    const PASSWORD_SALT = "school-salt";

    //*****************************************************
    // Users class constructor:
    // Instantiates a PDO object based on given URL and
    // uses that to initialize the data field $userData
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
            $userPDO = new PDO( "mysql:host=" . $ini['servername'] . 
                                ";port=" . $ini['port'] . 
                                ";dbname=" . $ini['dbname'], 
                                $ini['username'], 
                                $ini['password']);

            // Don't emulate (pre-compile) prepare statements
            $userPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Throw exceptions if there is a database error
            $userPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Set our database to be the newly created PDO
            $this->userData = $userPDO;
        }
        else
        {
            // Things didn't go well, throw exception!
            throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
        }

    } // end constructor

// Database access & modify methods are listed below. 
// General structure of each method is:
//  1) Set up variable for database and query results
//  2) Set up SQL statement (with parameters, if needed)
//  3) Bind any parameters to values
//  4) Execute statement and check for returned rows
//  5) Return results if needed.

    //*****************************************************
    // Get listing of all users
    // INPUT: None
    // RETURNS: Array with each entry representing a row in the table
    //          If no records in table, array is empty
    //**************
    //**** STUB ****
    //**************
    public function getAllUsers() 
    {
        $results = [];                  // Array to hold results
        $userTable = $this->userData;   // Alias for database PDO

        // Return results to client
        return $results;
    }

    //*****************************************************
    // Add a user to database
    // INPUT: user and divison to add
    // RETURNS: True if add is successful, false otherwise
    //**************
    //**** STUB ****
    //**************
    public function addUser($user, $password) 
    {
        $addSucessful = false;         // user not added at this point
        $userTable = $this->userData;   // Alias for database PDO
        
        $salt = random_bytes(32);

        $stmt = $userTable->prepare("INSERT INTO users SET userName = :user, userPassword = :pwd, userSalt = :salt");

        // Bind query parameters to method parameter values
        $boundParams = array(
            ":user" => $user,
            ":password" => sha1($salt . $password),
            ":salt" => $salt
        );       
        
         // Execute query and check to see if rows were returned 
         // If so, the user was successfully added
        $addSucessful = ($stmt->execute($boundParams) && $stmt->rowCount() > 0);


         // Return status to client
         return $addSucessful;
    }
   

    //*****************************************************
    // Delete specified user from table
    // INPUT: id of user to delete
    // RETURNS: True if delete is successful, false otherwise
    //**************
    //**** STUB ****
    //**************
    public function deleteUser ($id) 
    {
        $deleteSucessful = false;       // user not updated at this point
        $userTable = $this->userData;   // Alias for database PDO

        // Return status to client           
        return $deleteSucessful;
    }
 
    //*****************************************************
    // Get one user and place it into an associative array
    public function getUser($id) 
    {
        $results = [];                  // Array to hold results
        $userTable = $this->userData;   // Alias for database PDO

        // Return results to client
        return $results;
    }

    // Special function accessible to derived classes
    // Allows children to make database queries.
    public function getDatabaseRef()
    {
        return $this->userData;
    }

    // Validates credentials user entered on form
    // INPUT: username and password from login form
    // RETURN: True if credentials are in database, false otherwise
    //      Password is salted.
    public function validateCredentials($userName, $password)
    {
        $isValidUser = false;
        $userTable = $this->userData;   // Alias for database PDO

        // Create query object with username and password
        // $stmt = $userTable->prepare("SELECT id FROM users WHERE userName =:userName AND userPassword = :password");
        $stmt = $userTable->prepare("SELECT userPassword, userSalt FROM users WHERE userName =:userName");
 
        // Bind query parameter values
        $stmt->bindValue(':userName', $userName);

        $foundUser = ($stmt->execute() && $stmt->rowCount() > 0);

        if ($foundUser)
        {
            $results = $stmt->fetch(PDO::FETCH_ASSOC); 
            $hashedPassword = sha1( $results['userSalt'] . $password);
            $isValidUser = ($hashedPassword == $results['userPassword']);
        }
        // Note that we prepend salt.
        // You can post-pend it also, but be consistent with how the password is stored.
       // $stmt->bindValue(':password', sha1( self::PASSWORD_SALT . $password));
               
        // If we successfully execute and return a row, the crednetials are valid
        return $isValidUser;
    }

    // Destructor to clean up any memory allocation
    public function __destruct() 
    {
        // Mark the PDO for deletion
        $this->userData = null;

     }

 
} // end class users
?>