<?php
include 'db_connection.php';

function isValid()
{
    if (!is_numeric($_POST['startPoint']) || $_POST['startPoint'] < 0 || !is_numeric($_POST['endPoint']) || ($_POST['endPoint']) < 1 || !is_numeric($_POST['iterations']) || $_POST['iterations'] <1) {
        return false;
    }

    return true;
}


function register_database()
{
    global $connection;
    if (isset($_POST['submit'])) {

        $start = $_POST['startPoint'];
        $end = $_POST['endPoint'];
        $iterations = $_POST['iterations'];
        $sql = "INSERT INTO multiplication (start,end,iterations) VALUES ('$start', '$end','$iterations')";

        if ($connection->query($sql) === TRUE) {
            echo '<script language="javascript">';
            echo 'alert("Numerele inserate au fost salvate in baza de date cu succes")';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

        $connection->close();

    }
}


function multiplication()
{
    if (isset($_POST['startPoint']) && isset($_POST['endPoint']) && isset($_POST['iterations'])) {
        $start = $_POST['startPoint'];
        $end = $_POST['endPoint'];
        $iterations = $_POST['iterations'];

        echo "<pre>";
        echo "<b>1)</b>Sirul de numere in functie de numarul de elemente selectat este:";
        echo "<pre>";

        $numbers = (array_slice(range($start + 1, $end - 1), 0, $iterations));


        print_r($numbers);

        $multiplication = array();
        $multiplication5 = array();

        echo "<pre>";


        foreach ($numbers as $number => $value) {
            if ($value % 3 == 0) {

                echo "<b>2)</b>multiplu de 3 este = $value \n <br>";
            }


            if ($value % 4 == 0) {
                $multiplication[] = $value;
            }


            if ($value % 5 == 0) {
                $multiplication5[] = $value;
            }

        }


        print_r($multiplication);
        echo "<b>3)</b>numarul de numere multiplu de 4 este =" . count($multiplication) . "\n <br>";
        echo "<b>4)</b>suma numerelor multiplu de 5 este =" . array_sum($multiplication5) . "\n <br>";
    }

}


function curl()
{
    $ch = curl_init("http://php.net/manual/ro/function.array-slice.php");

    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    curl_close($ch);
}
