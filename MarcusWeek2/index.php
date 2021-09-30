<!--Marcus Laflamme
SE2666
Week 2 - Patient intake
----------->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Patient Intake</title>
    </head>
    <body>
        <div class='main'>

            <h1>Patient Intake</h1>

            <form action = 'functions.php' method='POST'>        <!--starting form-->
            First Name: <input type="text" name="firstName">

            <br>
            Last Name: <input type="text" name="lastName">

            <br>
            Married: <input type="radio" name="married" value="Yes">Yes <input type="radio" name="married" value="No">No

            <br>
            Birthdate: <input type="date" name="birthDate" value ="">

            <br>
            Weight: <input type="number" name="weight">

            <br>
            Feet:<input type="number" name="feet">
            Inches: <input type="number" name = "inches">

            <br>
            <input type="submit" name="submitButton">
            </form>
                
        </div>

    </body>
</html>