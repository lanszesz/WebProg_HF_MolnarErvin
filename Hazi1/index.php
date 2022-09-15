<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <style>
            body {
                font-family: arial, sans-serif;
            }

            table {
                border-collapse: collapse;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            p.szamologep-eredmeny {
                color: green;
            }

            div.osztotablak {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            div.sakktabla {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            div.sakktabla td {
                height: 50px;
                width: 50px;
            }

            div.sakktabla td.fekete {
                background-color: black;
            }

            div.sakktabla td.feher {
                background-color: white;
            }
        </style>

    </head>
    <body>
        <h1>PHP HÁZI</h1>

        <h1>Első feladat</h1>

        <?php
            $day = date('l');

            switch ($day) {
                case 'Monday':
                    echo "Ma Hétfő";
                    break;
                case 'Tuesday':
                    echo "Ma Kedd";
                    break;
                case 'Wednesday':
                    echo "Ma Szerda";
                    break;
                case 'Thursday':
                    echo "Ma Csütörtök";
                    break;
                case 'Friday':
                    echo "Ma Péntek";
                    break;
                case 'Saturday':
                    echo "Ma Szombat";
                    break;
                case 'Sunday':
                    echo "Ma Vasárnap";
                    break;
            }
        ?>

        <h1>Második feladat</h1>
        <form method="GET">
            <table>
                <tr>
                    <td><label for="szam1">Szám 1</label></td>
                    <td><label for="muvelet">Művelet</label></td>
                    <td><label for="szam2">Szám 2</label></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="szam1" id="szam1">
                    </td>
                    <td>
                        <select name="muvelet" id="muvelet">
                            <option value="1">+</option>
                            <option value="2">-</option>
                            <option value="3">*</option>
                            <option value="4">/</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="szam2" id="szam2" autocomplete="off">
                    </td>
                    <td>
                        <input type="submit" name="submit" value="=" autocomplete="off">
                    </td>
                </tr>
            </table>
        </form>

        <?php if (isset($_GET["szam1"])) {
            $ok = true;

            if (!is_numeric($_GET["szam1"]) || !is_numeric($_GET["szam2"])) {
                $ok = false;
            }

            if ($ok) {
                switch ($_GET["muvelet"]) {
                    case "1":
                        echo "<p class='szamologep-eredmeny'>Eredmény: " . $_GET["szam1"] + $_GET["szam2"] . "</p>";
                        break;
                    case "2":
                        echo "<p class='szamologep-eredmeny'>Eredmény: " . $_GET["szam1"] - $_GET["szam2"] . "</p>";
                        break;
                    case "3":
                        echo "<p class='szamologep-eredmeny'>Eredmény: " . $_GET["szam1"] * $_GET["szam2"] . "</p>";
                        break;
                    case "4":
                        echo "<p class='szamologep-eredmeny'>Eredmény: " . $_GET["szam1"] / $_GET["szam2"] . "</p>";
                        break;
                }
            } else {
                echo "<p style='color: red; margin-top: 5px'>Tölts ki minden mezőt vagy valamelyiket hibásan töltötted ki.</p>";
            }
        }
        ?>

        <h1>Harmadik feladat</h1>
        <div class="osztotablak">
            <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<table>";
                    echo "<tr><th>$i</th></tr>";
                    for ($j = 1; $j <= 10; $j++) {
                        echo "<tr><td>$j / $i = " . number_format($j / $i, 2) . "</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>

        <h1>Negyedik feladat</h1>
        <div class="sakktabla">
            <table>
                <?php
                    for ($i = 0, $k = 0; $i < 8; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < 8; $j++, $k++) {
                            echo ($k % 2 === 0) ? "<td class='fekete'>" : "<td class='feher'>";
                        }
                        $k--;
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>

        <h1>Ötödik feladat</h1>
        <form>
            <label for="spongecaseInput">Írd be amit spongecaseé akarsz alakítani</label>
            <input type="text" id="spongecaseInput" name="spongecaseInput">
            <button type="submit">Mehet!</button>
        </form>

        <?php
            $input = $_GET["spongecaseInput"] ?? 'false';

            if ($input) {
                $input = str_split(strtolower($input));
                $output = '';

                for ($i = 0, $max = count($input); $i < $max; $i++) {
                    if ($i % 2 === 0) {
                        $output .= strtolower($input[$i]);
                    } else {
                        $output .= strtoupper($input[$i]);
                    }
                }

                echo $output;
            }
        ?>
</html>