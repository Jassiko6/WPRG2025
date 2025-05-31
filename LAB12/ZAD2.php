<?php
$db = new pdo("mysql:host=localhost;dbname=ZAD1", "root", "");

$personExists = $db->query("SHOW TABLES LIKE 'Person'");
if ($personExists->rowCount() > 0) {
    printf("Table Person already exists<br>");
} else {
    $db->query("CREATE TABLE Person (Person_id INT AUTO_INCREMENT PRIMARY KEY,
                Person_firstname VARCHAR(255),
                Person_secondName VARCHAR(255))");
    printf("Table Person created successfully<br>");
}

$carsExists = $db->query("SHOW TABLES LIKE 'Cars'");
if ($carsExists->rowCount() > 0) {
    printf("Table Cars already exists<br>");
} else {
    $db->query("CREATE TABLE Cars (Cars_id INT AUTO_INCREMENT PRIMARY KEY,
 Cars_model VARCHAR(255),
 Cars_price FLOAT,
 Cars_day_of_buy DATETIME,
 Person_id INT,
 FOREIGN KEY (Person_id) REFERENCES Person(Person_id) ON DELETE CASCADE
)");
    printf("Table cars created successfully<br>");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    try {
        $statement = $db->prepare("INSERT INTO Person (Person_firstname, Person_secondName) VALUES (?, ?)");
        $statement->execute([$_POST['firstname'], $_POST['secondname']]);
        $statement = $db->prepare("INSERT INTO Cars (Cars_model, Cars_price, Cars_day_of_buy, Person_id) VALUES (?, ?, ?, ?)");
        $statement->execute([$_POST['model'], $_POST['price'], $_POST['dayofbuy'], $_POST['personid']]);
        print_r($statement->errorInfo());
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD1</title>
</head>
<body>
<form method="post">
    <h1>Add person</h1>
    <p>Firstname: <input type="text" name="firstname"></p>
    <p>Secondname: <input type="text" name="secondname"></p>
    <h1>Add car</h1>
    <p>Model: <input type="text" name="model"></p>
    <p>Price: <input type="text" name="price"></p>
    <p>Day of buy: <input type="text" name="dayofbuy"></p>
    <p> Person id:
        <select name="personid">
            <?php
                $statement = $db->prepare("SELECT Person_id FROM Person");
                $statement->execute();
                while($row = $statement->fetch()) {
                    echo "<option value='".$row['Person_id']."'>".$row['Person_id']."</option>";
                }
                $statement=null;
            ?>
        </select>
    </p>
    <button type="submit" name="add">Add</button>
</form>
<form method="post">
    <button type="submit" name="selectAll">Show all data</button>
    <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectAll']) || isset($_POST['sort_people']) || isset($_POST['sort_cars'])) {
            echo "<h1>All data</h1>";
            echo "<form>
                    <select name='sort_people_by'>
                        <option value='Person_id'>id</option>
                        <option value='Person_firstname'>firstname</option>
                        <option value='Person_secondName'>secondname</option>
                    </select>
                    <button type='submit' name='sort_people'>Sort</button>
                  </form>
            ";


            echo "<h2>People</h2>";

            echo "<table>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Firstname</th>";
            echo "<th>Lastname</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            if (isset($_POST['sort_people'])) {
                $orderBy = $_POST['sort_people_by'];
                $statement = $db->prepare("SELECT * FROM Person ORDER BY $orderBy;");
                $statement->execute();
                while($row = $statement->fetch()) {
                    echo "<tr>
                            <td>".$row['Person_id']."</td>
                            <td>".$row['Person_firstname']."</td>
                            <td>".$row['Person_secondName']."</td>
                            <td>
                                <form method='post' style='display:inline'>
                                    <input type='hidden' name='delete_person_id' value='".$row['Person_id']."'>
                                    <button type='submit' name='delete_person'>Delete</button>
                                </form>
                                <form method='post' style='display:inline'>
                                    <input type='hidden' name='edit_person_id' value='".$row['Person_id']."'>
                                    <button type='submit' name='edit_person'>Edit</button>
                                </form>
                            </td>
                          </tr>
                    ";
                }
            } else {
                $statement = $db->prepare("SELECT * FROM Person");
                $statement->execute();

                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>".$row['Person_id']."</td>";
                    echo "<td>".$row['Person_firstname']."</td>";
                    echo "<td>".$row['Person_secondName']."</td>";
                    echo "<td>
                            <form method='post' style='display:inline'>
                                <input type='hidden' name='delete_person_id' value='".$row['Person_id']."'>
                                <button type='submit' name='delete_person'>Delete</button>
                            </form>
                            <form method='post' style='display:inline'>
                                <input type='hidden' name='edit_person_id' value='".$row['Person_id']."'>
                                <button type='submit' name='edit_person'>Edit</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
            }
            echo "</table>";

            echo "<h2>Cars</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Model</th>";
            echo "<th>Price</th>";
            echo "<th>Day of buy</th>";
            echo "<th>Person id</th>";
            echo "<tr/>";

            echo "<form>
                    <select name='sort_cars_by'>
                        <option value='Cars_id'>id</option>
                        <option value='Cars_model'>model</option>
                        <option value='Cars_price'>secondname</option>
                        <option value='Cars_day_of_buy'>day of buy</option>
                    </select>
                    <button type='submit' name='sort_cars'>Sort</button>
                  </form>
            ";

            if (isset($_POST['sort_cars'])) {
                $orderBy = $_POST['sort_cars_by'];
                $statement = $db->prepare("SELECT * FROM Cars ORDER BY $orderBy");
                $statement->execute();
                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>".$row['Cars_id']."</td>";
                    echo "<td>".$row['Cars_model']."</td>";
                    echo "<td>".$row['Cars_price']."</td>";
                    echo "<td>".$row['Cars_day_of_buy']."</td>";
                    echo "<td>
                        <form method='post' style='display:inline'>
                            <input type='hidden' name='delete_car_id' value='".$row['Cars_id']."'>
                            <button type='submit' name='delete_car'>Delete</button>
                        </form>
                        <form method='post' style='display:inline'>
                            <input type='hidden' name='edit_car_id' value='".$row['Cars_id']."'>
                            <button type='submit' name='edit_car'>Edit</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                $statement =$db->prepare("SELECT * FROM Cars");
                $statement->execute();
                while ($row = $statement->fetch()) {
                    echo "<tr>";
                    echo "<td>".$row['Cars_id']."</td>";
                    echo "<td>".$row['Cars_model']."</td>";
                    echo "<td>".$row['Cars_price']."</td>";
                    echo "<td>".$row['Cars_day_of_buy']."</td>";
                    echo "<td>".$row['Person_id'];
                    echo "<td>
                        <form method='post' style='display:inline'>
                            <input type='hidden' name='delete_car_id' value='".$row['Cars_id']."'>
                            <button type='submit' name='delete_car'>Delete</button>
                        </form>
                        <form method='post' style='display:inline'>
                            <input type='hidden' name='edit_car_id' value='".$row['Cars_id']."'>
                            <button type='submit' name='edit_car'>Edit</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            }

            echo "</table>";
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_person'])) {
            $statement = $db->prepare("SELECT * FROM PERSON WHERE Person_id=?");
            $statement->bindParam(1, $_POST['edit_person_id'], PDO::PARAM_STR);
            $statement->execute();
            $row = $statement->fetch();
            echo "<form>
                    <input type='text' name='update_person_firstname' value='".$row['Person_firstname']."'>
                    <input type='text' name='update_person_secondname' value='".$row['Person_secondName']."'>
                    <input type='hidden' name='update_person_id' value='".$_POST['edit_person_id']."'>
                    <button type='submit' name='update_person'>Update</button>
                    </form>";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_person'])) {
            $statement = $db->prepare("UPDATE Person SET Person_firstname=?, Person_secondName=? WHERE Person_id=?");
            $statement->execute(array($_POST['update_person_firstname'], $_POST['update_person_secondname'], $_POST['update_person_id']));
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_person'])) {
            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->beginTransaction();
                $statement = $db->prepare("DELETE FROM Person WHERE Person_id=?");
                $statement->bindParam(1, $_POST['delete_person_id'], PDO::PARAM_INT);
                $statement->execute();
                $db->commit();
                echo "Row deleted successfully";
            } catch (Exception $error) {
                $db->rollBack();
                echo "Transaction not completed";
                echo $error;
            }


        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_car'])) {
            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->beginTransaction();
                $statement = $db->prepare("DELETE FROM Cars WHERE Cars_id=?");
                $statement->bindParam(1, $_POST['delete_car_id'], PDO::PARAM_INT);
                $statement->execute();
                $db->commit();
                echo "Row deleted successfully";
            } catch (Exception $error) {
                $db->rollBack();
                echo "Transaction not completed";
                echo $error;
            }
        }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_car'])) {
        $statement = $db->prepare("SELECT * FROM Cars WHERE Cars_id=?");
        $statement->bindParam(1, $_POST['edit_car_id'], PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch();
        echo "<form method='post'>
                    <input type='hidden' name='update_car_id' value='".$row['Cars_id']."'>
                    <input type='text' name='update_car_model' value='".$row['Cars_model']."'>
                    <input type='text' name='update_car_price' value='".$row['Cars_price']."'>
                    <input type='text' name='update_car_day_of_buy' value='".$row['Cars_day_of_buy']."'>
                    <input type='text' name='update_car_person_id' value='".$row['Person_id']."'>
                   
                    <button type='submit' name='update_car'>Update</button>
                    </form>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_car'])) {
        $statement = $db->prepare("UPDATE Cars SET Cars_model=?, Cars_price=?, Cars_day_of_buy=?, Person_id=? WHERE Cars_id=?");
        $statement->execute(array($_POST['update_car_model'], $_POST['update_car_price'],$_POST['update_car_day_of_buy'],$_POST['update_car_person_id'],$_POST['update_car_id']));
    }
    ?>
</form>
<h2>Find rows by field value</h2>
<form method="post">
    <input type="text" name="value">
    <button type="submit" name="findRows">Search</button>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['findRows'])) {
        $value = $_POST['value'];
        $statement = $db->prepare('SELECT * FROM Cars WHERE Cars_id = :value OR Cars_model = :value OR Cars_price = :value OR Cars_day_of_buy = :value OR Person_id = :value;');
        $statement->execute([':value'=>$value]);
        echo "<h2>Cars</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Model</th>";
        echo "<th>Price</th>";
        echo "<th>Day of buy</th>";
        echo "<th>Person id</th>";
        echo "</tr>";

        while($row = $statement->fetch()) {
            echo "<tr>";
            echo "<td>".$row['Cars_id']."</td>";
            echo "<td>".$row['Cars_model']."</td>";
            echo "<td>".$row['Cars_price']."</td>";
            echo "<td>".$row['Cars_day_of_buy']."</td>";
            echo "<td>".$row['Person_id'];
            echo "</tr>";
        }
        echo "</table>";
    }

    $statement = $db->prepare('SELECT * FROM Person WHERE Person_id = :value OR Person_firstname = :value OR Person_secondName = :value');
    $statement->execute([':value'=>$value]);
    echo "<h2>People</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Firsname</th>";
    echo "<th>Seconname</th>";
    echo "</tr>";

    while($row = $statement->fetch()) {
        echo "<tr>";
        echo "<td>".$row['Person_id']."</td>";
        echo "<td>".$row['Person_firstname']."</td>";
        echo "<td>".$row['Person_secondName']."</td>";
        echo "</tr>";

    }
    echo "</table>";
?>
</body>
</html>