<?php
require("controller.php");

if (!isset($_SESSION['officeList'])) {
    $_SESSION['officeList'] = [];
}

if (!isset($_SESSION['officeEmployeeList'])) {
    $_SESSION['officeEmployeeList'] = [];
}

if (isset($_POST['button_save'])) {
    $newAssign = [
        "employee" => $_POST['inputEmployee'],
        "office"   => $_POST['inputOffice']
    ];
    array_push($_SESSION['officeEmployeeList'], $newAssign);
    header("Location: office.php"); 
    exit;
}

$allMembers = getAllMembers(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #ffffff;
            margin: 0;
        }
        .box {
            max-width: 480px;
            margin: 30px auto;
            border: 1px solid #bcbcbc;
        }
        .box-nav {
            background: #d9edf9;
            padding: 10px 14px;
            font-weight: bold;
            font-size: 14px;
            border-bottom: 1px solid #bcbcbc;
        }
        .box-nav a {
            color: #000;
            text-decoration: none;
        }
        .box-nav a:hover {
            text-decoration: underline;
        }
        .box-nav .sep {
            color: #666;
            margin: 0 6px;
            font-weight: normal;
        }
        .box-body {
            padding: 20px;
        }
        .box-title {
            text-align: center;
            color: #3355a8;
            font-size: 30px;
            font-weight: bold;
            margin: 5px 0 20px 0;
        }
        table.wf-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        table.wf-table th, table.wf-table td {
            border: 1px solid #a8a8a8;
            padding: 8px 12px;
            font-size: 14px;
            text-align: left;
        }
        table.wf-table thead th {
            background: #8ecdf0;
            font-weight: bold;
        }
        .wf-form .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .wf-form label {
            width: 80px;
            font-size: 14px;
        }
        .wf-form select {
            flex: 1;
            padding: 6px 30px 6px 10px;
            border: 1px solid #a8a8a8;
            border-radius: 2px;
            background-color: #fff;
            font-size: 14px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='8'><polygon points='0,0 12,0 6,8' style='fill:%232196f3;'/></svg>");
            background-repeat: no-repeat;
            background-position: right 10px center;
        }
        .wf-save-btn {
            display: block;
            margin: 0 auto;
            background: #2196f3;
            color: #fff;
            border: none;
            padding: 8px 26px;
            border-radius: 3px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }
        .wf-save-btn:hover {
            background: #1a7fd1;
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="box-nav">
            <a href="view.php">Member List</a>
            <span class="sep">|</span>
            <a href="updatemember.php">New Member</a>
            <span class="sep">|</span>
            <a href="office.php">Office Employees</a>
        </div>
        <div class="box-body">
            <div class="box-title">Office Employees</div>

            <table class="wf-table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Office</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['officeEmployeeList'] as $item) { ?>
                    <tr>
                        <td><?= $item['employee'] ?></td>
                        <td><?= $item['office'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <form method="POST" action="office.php" class="wf-form">
                <div class="form-row">
                    <label for="inputEmployee">Employee</label>
                    <select name="inputEmployee" id="inputEmployee">
                        <?php foreach ($allMembers as $member) { ?>
                        <option value="<?= $member->name ?>"><?= $member->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="inputOffice">Office</label>
                    <select name="inputOffice" id="inputOffice">
                        <?php foreach ($_SESSION['officeList'] as $off) { ?>
                        <option value="<?= $off ?>"><?= $off ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button name="button_save" type="submit" class="wf-save-btn">SAVE</button>
            </form>
        </div>
    </div>
</body>
</html>