<head>
    <style>
        .tt {

            border: solid black 1px;
        }

        th {
            color: grey;
            background-color: black;
            width: 10%;
            border: solid black 1px;
        }

        td {
            justify-content: center;
            text-align: center;
            width: 10%;
            padding: 2%;
            border: solid black 2px;
            background-color: lightgray;
        }

        table {

            text-shadow: -1px -1px #eee, 1px 1px black, black;
            font-family: "Segoe print", Arial, Helvetica, sans-serif;
            color: black;
width:60%;
            font-weight: lighter;
            -moz-box-shadow: 2px 2px 6px #888;
            -webkit-box-shadow: 2px 2px 6px #888;
            box-shadow: 2px 2px 6px #888;
            text-align: center;

            line-height: 19px;
            margin: 0 auto;
        }
        h2{

        }

        h1 {

            font-size: 24px;
            text-shadow: -1px -1px #eee, 1px 1px #888, -3px 0 4px #000;
            font-family: "Segoe print", Arial, Helvetica, sans-serif;
            color: #ccc;
            padding: 16px;
            font-weight: lighter;
            -moz-box-shadow: 2px 2px 6px #888;
            -webkit-box-shadow: 2px 2px 6px #888;
            box-shadow: 2px 2px 6px #888;
            text-align: center;

            display: inline;
            width: 50%;
            line-height: 122px;
        }

    </style>

</head>


<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 14/01/2019
 * Time: 10:08
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colyseum";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} else {

    $conn->select_db($dbname);
}

function affiche()
{
    global $conn;

    $sql = "SELECT *  from clients where 1 limit 0, 20 ";

    $result = $conn->query($sql);

    echo "<th>Prenom</th><th>Nom</th>";

    while ($row = $result->fetch_assoc()) {

        ?>

        <tr>
            <td class="tt"><?= $row['firstName']; ?></td>

            <td class="tt"><?= $row['lastName']; ?></td>



        </tr>

        <?php
    }
}
echo "<table>";
affiche();
echo "</table>";
function affiche2()
{
    global $conn;

    $sql = "SELECT *  from showtypes ";

    $result = $conn->query($sql);

    echo "<th>type</th>";

    while ($row = $result->fetch_assoc()) {

        ?>

        <tr>
            <td class="tt"><?= $row['type']; ?></td>





        </tr>

        <?php
    }
}
echo "<table>";
affiche2();
echo "</table>";
function affiche3()
{
    global $conn;

    $sql = "select * from clients,cards,cardtypes where cardtypes.id = cards.cardTypesId and clients.cardNumber = cards.cardNumber and cards.cardTypesId = 1";

    $result = $conn->query($sql);

    echo "<th>client avec carte de fideliter
</th>";



    while ($row = $result->fetch_assoc()) {

        ?>

        <tr>

            <td class="tt"><?= $row['lastName']; ?></td>





        </tr>

        <?php
    }
}
echo "<table>";
affiche3();
echo "</table>";
function affiche4()
{
    global $conn;

    $sql = "SELECT *  from clients WHERE lastName like 'M%' order by lastName asc ";

    $result = $conn->query($sql);

    echo "<th>client avec carte de fideliter
</th>";
    echo "<th>client sans carte de fideliter
</th>";

    while ($row = $result->fetch_assoc()) {

        ?>

        <tr>
            <td class="tt"><?= $row['lastName']; ?></td>
            <td class="tt"><?= $row['firstName']; ?></td>





        </tr>

        <?php
    }
}
echo"<table>";
affiche4();
echo"</table>";
function affiche5()
{
    global $conn;

    $sql = "SELECT *  from shows WHERE 1 order by title asc ";

    $result = $conn->query($sql);




    while ($row = $result->fetch_assoc()) {




           echo  $row['title'].' '.'par'.' '.
             $row['performer'].' '.'le'.' '.
             $row['date'].' '.'a'.' '.
            $row['duration'].'<br>';









    }
}

affiche5();
function affiche6()
{
    global $conn;

    $sql = "SELECT * FROM clients left join cards ON ( cards.cardNumber = clients.cardNumber) WHERE 1 ";

    $result = $conn->query($sql);

    echo"exo 7";
    echo"<br>.<br>";


    while ($row = $result->fetch_assoc()) {




        echo  $row['firstName'].' '.'par'.' '.
            $row['lastName'].' '.'le'.' '.
            $row['birthDate'].' '.' ';
            if($row['cardTypesId']==1) {
               echo "<br>".'Oui il posséde une carte de fidéliter '.' '.' sont numero de carte de fidéliter'.' '.$row['cardNumber']. '<br>';
            }
            else{
                echo "<br> "."non il ne possede pas de carte de fidéliter";
            }








    }
}
affiche6();

