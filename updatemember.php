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
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="view.php">Member List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="updatemember.php">New Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="office.php">Office Employees</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <h1>New Member</h1>
                <form method="POST" action="controller.php" class="w-75 mx-auto">
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" name="inputName">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone</label>
                            <input type="text" class="form-control" name="inputPhone">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail14">Email</label>
                            <input type="email" class="form-control" name="inputEmail">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputNote">Note</label>
                            <input type="text" class="form-control" name="inputNote">
                        </div>
                    </div>

                    <button name="button_register" type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>


    </div>

</body>

</html>