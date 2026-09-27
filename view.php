<?php
require("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>Membership</title>
</head>

<body>
    <div class="container p-3">
        <h1>New Member</h1>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="view.php">Member List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="updatemember.php">New Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="office.php">Office Employees</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h1>Membership</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Note</th>
                            <th scope="col">Action</th>
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
                            <th scope="row"><?= $counter ?></th>
                            <td><?= $member->name ?></td>
                            <td><?= $member->phone ?></td>
                            <td><?= $member->email ?></td>
                            <td><?= $member->note ?></td>
                            <td>
                                <a href="viewupdate.php?updateID=<?= $index ?>">
                                    <button class="btn btn-warning">Update</button>
                                </a>
                                <a href="controller.php?deleteID=<?= $index ?>">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>