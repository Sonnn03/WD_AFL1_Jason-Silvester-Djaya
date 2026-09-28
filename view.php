<?php require("controller.php"); ?>
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
            <h1>List Karyawan</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Usia</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0;
                    $allmembers = getAllMembers();
                    foreach ($allmembers as $index => $member) {
                        $counter++;
                    ?>
                        <tr>
                            <td><?= $counter ?></td>
                            <td><?= $member->name ?></td>
                            <td><?= $member->jabatan ?: '-' ?></td>
                            <td><?= (int) $member->usia ?></td>
                            <td><a href="controller.php?deleteID=<?= $index ?>">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <h1>Tambah Karyawan</h1>
            <form method="POST" action="controller.php">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="inputJabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="inputJabatan" name="inputJabatan" placeholder="Masukkan Jabatan">
                </div>
                <div class="mb-3">
                    <label for="inputUsia" class="form-label">Usia</label>
                    <input type="number" class="form-control" id="inputUsia" name="inputUsia" placeholder="Masukkan Usia">
                </div>
                <div class="text-center">
                    <button name="button_register" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>