<?php
$firstFormHidden = false;
$secondFormHidden = true;
$resultHidden = true;

if (isset($_POST["first_form"])) {
    $firstFormHidden = true;
    $secondFormHidden = false;

    $rows = range(1, $_POST["row"]);
    $columns = range(1, $_POST["column"]);
}

if (isset($_POST["second_form"])) {
    $firstFormHidden = true;
    $secondFormHidden = true;
    $resultHidden = false;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
    <style>
        .hidden {
            visibility: hidden;
            position: fixed;
        }
        .box {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        table {
            padding: 20px 10px;
            min-width: 350px;
            border: 1px solid black;
        }
        input[type=text] {
            width: 50px;
        }

        .tr {
            display: block;
            float: left;
        }
        .td {
            display: block;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    <div class="box <?php echo ($firstFormHidden) ? 'hidden' : '' ?>">
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <label for="row">Inputkan Jumlah Baris:</label>
                    </td>
                    <td>
                        <input type="text" name="row" id="row">
                    </td>
                    <td>
                        Contoh: 1
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="column">Inputkan Jumlah Kolom:</label>
                    </td>
                    <td>
                        <input type="text" name="column" id="column">
                    </td>
                    <td>
                        Contoh: 3
                    </td>
                </tr>
                <tr>
                    <td colspan=3 style="text-align: center">
                        <input type="submit" value="Submit" name="first_form">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="box <?php echo ($secondFormHidden) ? 'hidden' : '' ?>">
        <form action="" method="post">
            <table>
                <?php foreach($rows as $row ) { ?>
                    <tr>
                        <?php foreach($columns as $column) { ?>
                            <td>
                                <label for="<?php echo 'number_'.$row.'_'.$column ?>"><?php echo "$row.$column" ?></label>
                                <input type="text" name="<?php echo "number[$row][$column]" ?>">
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan=<?php echo $columns ?> style="text-align: center">
                            <input type="submit" value="Submit" name="second_form">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="box <?php echo ($resultHidden) ? 'hidden' : '' ?>">
        <table>
            <?php foreach($_POST["number"] as $rowKey => $row) { ?>
                <tr class="tr">
                    <?php foreach($row as $columnKey => $column) { ?>
                        <td class="td">
                            <?php echo "$rowKey.$columnKey : $column" ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>
    
</body>
</html>