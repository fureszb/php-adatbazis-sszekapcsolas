<?php
class Ab
{
    private $host = "localhost";
    private $felhasznalonev = "root";
    private $jelszo = "";
    private $AbNev = "magyar_kartya";
    private $kapcsolat;

    function __construct()
    {
        $this->kapcsolat = new mysqli($this->host, $this->felhasznalonev, $this->jelszo, $this->AbNev);
        if ($this->kapcsolat->connect_error) {
            $szoveg = "<p>sikertelen kapcsolodas!</p>";
        } else {
            $szoveg = "<p>sikeres kapcsolodas!</p>";
        }
        echo $szoveg;
        $this->kapcsolat->query("SET NAMES UTF8");
        $this->kapcsolat->query("set character set UTF8");
    }

    function adatLeker($oszlop1, $oszlop2, $tabla)
    {
        $sql = "SELECT $oszlop1, $oszlop2 FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);
        while ($sor =  $phpTomb->fetch_assoc()) {
            echo "<p>$sor[$oszlop1]</p>";
            echo "<img src='forras/$sor[$oszlop2]' alt='kártya képe'>";
            echo "<br>";
        }
    }

    function adatLekerTabla($oszlop1, $oszlop2, $tabla)
    {
        $sql = "SELECT $oszlop1, $oszlop2 FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);

        echo "<table>";
        echo "<tr><th>$oszlop1</th><th>Kép</th></tr>";

        while ($sor = $phpTomb->fetch_assoc()) {
            echo "<tr>";
            echo "<td>$sor[$oszlop1]</td>";
            echo "<td><img src='forras/$sor[$oszlop2]' alt='kártya képe'></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    function kapcsolatBezar()
    {
        $this->kapcsolat->close();
    }
}
