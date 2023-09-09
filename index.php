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
            <div class="teams">
                <div class="team home">
                    <?php $name_home = "Battle Gear"; ?>
                    <img src="img-team/<?php echo str_replace(' ', '-',strtolower($name_home)); ?>.svg" alt="">
                    <?php echo str_replace(' ', ' <br>',$name_home); ?>
                </div>
                <div class="kickoff">
                    <span class="date">Tomorrow</span>
                    <span class="time">20:00</span>
                    <span class="timezone">SGT (UTC+8)</span>
                </div>
                <div class="team away">
                    <?php $name_away = "Mecha Mask"; ?>
                    <img src="img-team/<?php echo str_replace(' ', '-',strtolower($name_away)); ?>.svg" alt="">
                    <?php echo str_replace(' ', ' <br>',$name_away); ?>
                </div>
            </div>
        </section>

        <section class="standings">
            <h2>Tables & Standings</h2>
            <p>順位表</p>
            <div class="table-wrapper">
                <table class="table">
                    <?php
                  // test.csvファイルを読み込む
                  $line = file('table.csv');
                  $data = explode(',', $line[0]);
                  echo "<thead>";
                  echo "<tr>";
                  echo "<th>" . $data[0] . "</th>";
                  echo "<th>" . $data[1] . "</th>";
                  for ($c = 2; $c < count($data)-1; $c++) {
                    echo "<th><span>" . $data[$c] . "</span></th>";
                  }
                  echo "<th>" . end($data) . "</th>";
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
            </div>
        </section>

        <footer class="footer container">
            <nav class="menus">
                <div class="menu-text">
                    <h3>EVENTS</h3>
                    <ul>
                        <li><a href="#"></a>リーグ</li>
                        <li><a href="#"></a>ウィンターカップ</li>
                        <li><a href="#"></a>リージョンステージ</li>
                        <li><a href="#"></a>ワールドファイナル</li>
                    </ul>
                    </ul>
                </div>
                <div class="menu-text">
                    <h3>ABOUT</h3>
                    <ul>
                        <li><a href="#">プロジェクト</a></li>
                        <li><a href="#"></a>スポンサー</li>
                        <li><a href="#"></a>チーム</li>
                    </ul>
                </div>
                <div class="menu-text">
                    <h3>REGION</h3>

                    <ul>
                        <li><a href="#"></a>東京</li>
                        <li><a href="#"></a>アジア</li>
                        <li><a href="#"></a>アメリカ</li>
                        <li><a href="#"></a>ヨーロッパ</li>
                    </ul>
                </div>
                <div class="menu-sns">
                    <h3>JOIN</h3>
                    <ul>
                        <li><a href="#"><img src="img-sns/logo-twitter.svg" alt="Twitter"></a></li>
                        <li><a href="#"><img src="img-sns/logo-facebook.svg" alt="Facebook"></a></li>
                        <li><a href="#"><img src="img-sns/logo-instagram.svg" alt="Instagram"></a></li>
                        <li><a href="#"><img src="img-sns/logo-youtube.svg" alt="Youtube"></a></li>
                        <li><a href="#"><img src="img-sns/logo-discord.svg" alt="Discord"></a></li>
                        <li><a href="#"><img src="img-sns/logo-twitch.svg" alt="Twitch"></a></li>
                    </ul>

                </div>
                </menu>
        </footer>

    </main>
</body>

</html>