<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <main class="container">
        <section class="showdown">
            <h2>Next Showdown</h2>
            <p>次の対戦</p>
        </section>

        <section class="standings">
            <h2>Tables & Standings</h2>
            <p>順位表</p>

            <table class="table">
                <?php
                // test.csvファイルを読み込む
                $line = file('table.csv');

                $data = explode(',', $line[0]);

                echo "<thead>";
                echo "<tr>";
                for ($c = 0; $c < count($data); $c++) {
                  echo "<th>" . $data[$c] . "</th>";
                }
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                $all_data = array_slice($line, 1);

                foreach($all_data as $data){
                  echo "<tr>";
                  $value = explode(',', $data);
                  echo "<th>" . $value[0] . "</th>";?>

                <th>
                    <a href='#'>
                        <img src="img-team/<?php echo str_replace(' ', '-',strtolower($value[1])); ?>.svg" alt="">
                        <?php echo $value[1]; ?>
                    </a>
                </th>

                <?php
                  for ($c = 2; $c < count($value)-1; $c++) {
                    echo "<td>" . $value[$c] . "</td>";
                  }
                  echo "<td>";

                  $result = array_slice(mb_str_split(end($value)), 0, 5);
                  // print_r($result);
                  
                  foreach ($result as $text) {
                    if ($text === '勝') {
                      echo '<img src="img/win.svg" alt="勝ち">';
                    }else if ($text === '負') {
                      echo '<img src="img/lose.svg" alt="負け">';
                    }else {
                      echo '<img src="img/draw.svg" alt="引き分け">';
                    }
                  }

                  echo "</td>";
                  echo "</tr>";

                }
                echo "</tbody>";

                ?>


            </table>
        </section>
    </main>
</body>

</html>