<?php
require("controller.php");

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
$allOffices = getAllOffices();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .menu-bar {
            display: flex;
            gap: .75rem;
            background: #cfe6f5;
            border: 1px solid #b9d7ea;
            border-radius: .4rem;
            padding: .6rem .9rem;
            margin-bottom: .75rem;
        }
        .menu-bar a {
            color: #6c757d;
            text-decoration: none;
        }
        .menu-bar a:hover {
            color: #000;
        }
        .menu-bar a.active {
            color: #000;
            font-weight: 700;
        }
        .main-box {
            border: 2px solid #495057;
            border-radius: .4rem;
            padding: 1.5rem;
        }
        .main-box h1 {
            text-align: center;
            font-size: 2.25rem;
            margin-bottom: 1rem;
        }
        .theme-blue h1 {
            color: #2a5d7c;
        }
        .theme-blue .table thead th {
            background-color: #cfe6f5;
        }
        .form-row-inline {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-bottom: .75rem;
        }
        .form-row-inline label {
            width: 80px;
            margin: 0;
        }
        .btn-save {
            background-color: #7dbfe9;
            border-color: #7dbfe9;
            color: #fff;
        }
        .btn-save:hover {
            background-color: #5fb0e3;
            border-color: #5fb0e3;
            color: #fff;
        }
    </style>
    <title>Office-Employees</title>
</head>

<body>
    <div class="container p-3">
        <div class="menu-bar">
            <a href="view.php">Employee</a>
            <a href="viewoffice.php">Office</a>
            <a href="office.php" class="active">Office-Employees</a>
        </div>

        <div class="main-box theme-blue">
            <h1>Office Employees</h1>
            <table class="table table-bordered mb-4">
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

            <form method="POST" action="office.php">
                <div class="form-row-inline">
                    <label for="inputEmployee">Employee</label>
                    <select class="form-select" name="inputEmployee" id="inputEmployee">
                        <?php foreach ($allMembers as $member) { ?>
                            <option value="<?= $member->name ?>"><?= $member->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row-inline">
                    <label for="inputOffice">Office</label>
                    <select class="form-select" name="inputOffice" id="inputOffice">
                        <?php foreach ($allOffices as $off) { ?>
                            <option value="<?= $off->name ?>"><?= $off->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="text-center">
                    <button name="button_save" type="submit" class="btn btn-save">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>