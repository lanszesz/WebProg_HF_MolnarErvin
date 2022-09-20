<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>HÁZIK</h1>
        <h1>ELSŐ FELADAT</h1>
        <?php
            $array = ([5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200']);
            array_filter($array, function ($element) {
                echo $element . ' ' . gettype($element) . (is_numeric($element) ? ' Igen<br>' : ' Nem<br>');
            })
        ?>

        <h1>MÁSODIK FELADAT</h1>
        <?php
            $orszagok = array(" Magyarország " => " Budapest", " Románia" => " Bukarest", "Belgium" => "Brussels", "Austria" => "Vienna", "Poland" => "Warsaw");
            foreach ($orszagok as $orszag => $fovaros) {
                echo $orszag . ' fővárosa ' . $fovaros . '<br>';
            }
        ?>

        <h1>HARMADIK FELADAT</h1>
        <?php
            $napok = array(
                    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
                    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
                    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
            );

            foreach ($napok as $nyelv => $nap) {
                echo $nyelv . ': ' . implode(', ',$nap);
                echo '<br>';
            }
        ?>

        <h1>NEGYEDIK FELADAT</h1>
        <?php
            $szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

            function atalakit(&$tomb, $betu)
            {
                switch ($betu) {
                    case "kisbetus":
                        foreach ($tomb as $k => $v) {
                            $tomb[$k] = strtolower($v);
                        }
                        break;
                    case "nagybetus":
                        foreach ($tomb as $k => $v) {
                            $tomb[$k] = strtoupper($v);
                        }
                        break;
                }
            }

            atalakit($szinek, "nagybetus");
            print_r($szinek);
            atalakit($szinek, "kisbetus");
            print_r($szinek);
        ?>
    </body>
</html>