<!DOCTYPE html>
<html style="background:#2C2C2C;">

<head>
    <meta charset="UTF-8">
    <title>Logs</title>
    <style>
        table {
            position: absolute;
            border-spacing: 0;
            border-collapse: collapse;
            width: 70%;
            box-shadow: 4px 10px rgb(255 255 255 / 25%);
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #282828;
        }

        tr:nth-child(odd) {
            background-color: #1C1C1C;
        }
    </style>
</head>

<body>
    <?php
    $db_host = "mysql";
    $db_user = "root";
    $db_password = "root";
    $db_name = "laravel";

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id, time, duration, ip, url, method, input FROM logs_2";
        $statement = $db->prepare($sql);
        $statement->execute();

        $result_array = $statement->fetchAll();

        echo "<div class='list'><table>";
        echo "<tr><th>id</th><th>time</th><th>duration</th><th>ip</th><th>url</th><th>method</th><th>input</th></tr>";

        foreach ($result_array as $result_row) {
            echo "<tr>";
            echo "<td align='center'>" . $result_row['id'] . "</td>";
            echo "<td align='center'>" . $result_row['time'] . "</td>";
            echo "<td align='center'>" . $result_row['duration'] . "</td>";
            echo "<td align='center'>" . $result_row['ip'] . "</td>";
            echo "<td align='center'>" . $result_row['url'] . "</td>";
            echo "<td align='center'>" . $result_row['method'] . "</td>";
            echo "<td align='center'>" . $result_row['input'] . "</td>";
            echo "</tr>";
        }

        echo "</table></div>";
    } catch (PDOException $e) {
        echo "Ошибка при создании записи в базе данных: " . $e->getMessage();
    }

    $db = null;
    ?>
</body>

</html>