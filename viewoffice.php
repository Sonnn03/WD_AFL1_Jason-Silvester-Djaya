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
        .theme-blue h1 {
            color: #2a5d7c;
        }
        .theme-blue .table thead th {
            background-color: #cfe6f5;
        }
    </style>
    <title>Office</title>
</head>

<body>
    <div class="container p-3">
        <div class="menu-bar">
            <a href="view.php">Employee</a>
            <a href="viewoffice.php" class="active">Office</a>
            <a href="office.php">Office-Employees</a>
        </div>

        <div class="main-box theme-blue">
            <h1>List Office</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Kantor</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getAllOffices() as $index => $office) { ?>
                        <tr>
                            <td><?= $office->name ?></td>
                            <td><?= $office->address ?></td>
                            <td><?= $office->city ?></td>
                            <td><?= $office->phone ?></td>
                            <td><a href="controller.php?deleteOfficeID=<?= $index ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h1>Tambah Office</h1>
            <form method="POST" action="controller.php">
                <div class="mb-3">
                    <label for="inputOfficeName" class="form-label">Name Kantor</label>
                    <input type="text" class="form-control" id="inputOfficeName" name="inputOfficeName" placeholder="Masukkan Name Kantor">
                </div>
                <div class="mb-3">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Masukkan Address">
                </div>
                <div class="mb-3">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Masukkan City">
                </div>
                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Masukkan Phone">
                </div>
                <div class="text-center">
                    <button name="button_register_office" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>