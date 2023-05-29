<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="text-center">
            <h2 style="font-size: 5rem;">Attack List</h2>
            <a class="btn btn-primary mt-2" href="/myshop/create.php" role="button">Add Clients</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                // create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }

                // read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query: " . $connection->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc()){
                    echo '
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>'.$row['created_at'].'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/myshop/edit.php?id='.$row['id'].'">Edit</a>
                            <a class="btn btn-danger btn-sm" href="/myshop/delete.php?id='.$row['id'].'">Delete</a>
                        </td>
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
        <form class="d-flex justify-content-end" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</body>
</html>