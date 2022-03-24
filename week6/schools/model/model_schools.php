<?php

    include (__DIR__ . '/db.php');
    
    function insertSchoolsFromFile ($fname) {
        global $db;
        $i = 0;
       
        if (!file_exists($fname)) return false;

        deleteAllSchools();
        $file = fopen ($fname, 'rb');
        // ignore first line
        $row = fgetcsv($file);
        
        while (!feof($file) && $i++ < 10000) {
            $row = fgetcsv($file);
            $school = str_replace("'", "''", htmlspecialchars ($row[0]));
            $city = str_replace("'", "''", htmlspecialchars ($row[1]));
            $state = str_replace("'", "''", htmlspecialchars ($row[2]));

            $sql[] = "('" . $school . "' , '" . $city . "' , '" . $state. "')";
            // 1,000 records at a time
            if ($i % 1000 == 0) {
                $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
                $sql = array();
            }
        }
        if (count($sql)) {
            $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
        }

        return(true);
      }
   
    
   function deleteAllSchools () {
       global $db;
       
       $stmt = $db->query("DELETE FROM schools;");
       return 0;
   }
   
  
   function getSchoolCount() {
       global $db;

       $stmt = $db->query("SELECT COUNT(*) AS schoolCount FROM schools");
       $results = $stmt->fetch(PDO::FETCH_ASSOC);   
       return($results['schoolCount']);
   }
   function getSchools ($name, $city, $state) {
       global $db;
       
       $binds = array();
       $sql = "SELECT id, schoolName, schoolCity, schoolState FROM schools WHERE 0=0 ";
       if ($name != "") {
            $sql .= " AND schoolName LIKE :schoolName";
            $binds['schoolName'] = '%'.$name.'%';
       }
      
       if ($city != "") {
           $sql .= " AND schoolCity LIKE :city";
           $binds['city'] = '%'.$city.'%';
       }
       if ($state != "") {
           $sql .= " AND schoolState LIKE :state";
           $binds['state'] = '%'.$state.'%';
       }
       
       $stmt = $db->prepare($sql);
      
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return ($results);
   }
   
   function checkLogin ($userName, $password) {
    global $db;
    $stmt = $db->prepare("SELECT id FROM users WHERE userName =:userName AND userPassword = :password");

    $stmt->bindValue(':userName', $userName);
    $stmt->bindValue(':password', sha1("school-salt".$password));
    
    $stmt->execute ();
   
    return( $stmt->rowCount() > 0);
    
}
 

// Test code to make sure these functions work
// $schools = getSchools ('New England', '', 'RI');

// var_dump ($schools);

// $b = checkLogin('donald', 'duck');
// if ($b) echo "Logged in"; else echo "Not logged in";

// insertSchoolsFromFile('../uploads/schools.csv');
// $count= getSchoolCount();
// echo $count;

// if ($result) echo "Logged in"; else echo "Not logged in";

   
