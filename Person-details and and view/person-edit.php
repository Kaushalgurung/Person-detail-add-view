<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Person Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <h1>Edit Personal details</h1>
                <div class="card">
                    <div class="card-header">
                        <h4>Person Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $person_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM persons WHERE id='$person_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $person = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="person_id" value="<?= $person['id']; ?>">

                                    <div class="mb-3">
                                        <label>Person Name</label>
                                        <input type="text" name="name" value="<?=$person['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Person Email</label>
                                        <input type="email" name="email" value="<?=$person['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Person Phone</label>
                                        <input type="text" name="phone" value="<?=$person['phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Person Address</label>
                                        <input type="text" name="address" value="<?=$person['address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_person" class="btn btn-primary">
                                            Update Person
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>