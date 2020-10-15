<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

    if (mysqli_connect_errno()) {
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }


    $query = "
        SELECT dept_name, first_name, last_name, gender
        FROM dept_manager
        INNER JOIN employees ON employees.emp_no = dept_manager.emp_no
        INNER JOIN departments ON departments.dept_no = dept_manager.dept_no
    ";

    $result = mysqli_query($link, $query);
    $article = '';
    while ($row = mysqli_fetch_array($result)) {
        $article .= '<tr><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['gender'];
        $article .= '</td><tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title> 부서 매니저 정보 </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href = "index.php">직원 관리 시스템</a> | 부서 매니저 정보</h2>
        <table>
            <tr>
                <th>dept_name</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>gender</th>
            </tr>
            <?= $article ?>
        </table>
</body>
</html>
