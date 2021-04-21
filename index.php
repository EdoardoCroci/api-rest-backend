<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <form action="student.php" method="GET">
        <div class="form-group row">
            <input class="col-sm-1" type="submit" value="get all students">
        </div>
        <br>
        <div class="form-group row">
            <label for="text_get">get one student</label>
            <select class="col-sm-1" name="id">
                <option selected disabled hidden value="">Student ID</option>
                <?php 
                    include('./class/DBConnection.php');

                    $db = new DBConnection;
                    $db = $db->returnConnection();
                    $sql = "SELECT id FROM student ORDER BY id ASC;";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                    foreach($result as $key) //list of all ids
                    {   
                        echo '<option value="' . $key['id'] . '">' . $key['id'] . '</option>';
                    }   
                ?>
            </select>
            <input class="col-sm-1" type="submit" value="get 1 row">
        </div>
    </form> 
    <br>
    <div class="form-group row">
        <form action="student.php" method="POST">
            <legend class="col-sm-12">Data insert form</legend>
            <label class="col-sm-1">Name: </label>
            <input class="col-sm-1" name="name" required><br>
            <label class="col-sm-1">Last name: </label>
            <input class="col-sm-1" name="surname" required><br>
            <label class="col-sm-1">Sidi code: </label>
            <input class="col-sm-1" name="sidi_code" required><br>
            <label class="col-sm-1">Tax code: </label>
            <input class="col-sm-1" name="tax_code" required><br>
            <input class="col-sm-1" type="submit" value="Insert">
        </form>
    </div>
</body>
</html>

<!-- curl --header "Content-Type: application/json" --request DELETE http://localhost:8080/student.php/id  -->

<!-- curl --header "Content-Type: application/json" --request PUT --data "{"_name":"name", "_surname":"surname", "_sidiCode":"sidiCode", "_taxCode":"taxCode"}" http://localhost:8080/student.php/id  -->