<?php
require("controller.php");
if (isset($_GET["updateID"])) {
    $member_id = $_GET["updateID"];
    $member = getMemberWithID($member_id);
}
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
    </style>
    <title>Employee</title>
</head>

<body>
    <div class="container p-3">
        <div class="menu-bar">
            <a href="view.php" class="active">Employee</a>
            <a href="viewoffice.php">Office</a>
            <a href="office.php">Office-Employees</a>
        </div>

        <div class="main-box">
            <h1>Update Karyawan</h1>
            <form method="POST" action="controller.php">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Masukkan Nama" value="<?= $member->name ?>">
                </div>
                <div class="mb-3">
                    <label for="inputJabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="inputJabatan" name="inputJabatan" placeholder="Masukkan Jabatan" value="<?= $member->jabatan ?>">
                </div>
                <div class="mb-3">
                    <label for="inputUsia" class="form-label">Usia</label>
                    <input type="number" class="form-control" id="inputUsia" name="inputUsia" placeholder="Masukkan Usia" value="<?= $member->usia ?>">
                </div>

                <input type="hidden" name="input_id" value="<?= $member_id ?>">
                <div class="text-center">
                    <button name="button_update" type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>