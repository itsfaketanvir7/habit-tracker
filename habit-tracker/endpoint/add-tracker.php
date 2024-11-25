<?php 
include ('../conn/conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

    if (isset($_POST['date'], $_POST['day'])) {
        $date = $_POST['date'];
        $day = $_POST['day'];
        $exercise = $_POST['exercise'];
        $pray = $_POST['pray'];
        $readBook = $_POST['read_book'];
        $vitamins = $_POST['vitamins'];
        $laundry = $_POST['laundry'];
        $alcohol = $_POST['alcohol'];
        $meat = $_POST['meat'];

        try {
            $checkStmt = $conn->prepare("SELECT date FROM tbl_tracker WHERE date = :date");
            $checkStmt->bindParam(":date", $date, PDO::PARAM_STR);
            $checkStmt->execute();

            $dateExist = $checkStmt->fetch(PDO::FETCH_ASSOC);

            if (empty($dateExist)) {
                $conn->beginTransaction();

                $stmt = $conn->prepare("INSERT INTO tbl_tracker (date, day, exercise, pray, read_book, vitamins, laundry, alcohol, meat) VALUES (:date, :day, :exercise, :pray, :read_book, :vitamins, :laundry, :alcohol, :meat)");
    
                $stmt->bindParam(":date", $date, PDO::PARAM_STR);
                $stmt->bindParam(":day", $day, PDO::PARAM_STR);
                $stmt->bindParam(":exercise", $exercise, PDO::PARAM_STR);
                $stmt->bindParam(":pray", $pray, PDO::PARAM_STR);
                $stmt->bindParam(":read_book", $readBook, PDO::PARAM_STR);
                $stmt->bindParam(":vitamins", $vitamins, PDO::PARAM_STR);
                $stmt->bindParam(":laundry", $laundry, PDO::PARAM_STR);
                $stmt->bindParam(":alcohol", $alcohol, PDO::PARAM_STR);
                $stmt->bindParam(":meat", $meat, PDO::PARAM_STR);
    
                $stmt->execute();
                $conn->commit();
    
                echo "
                    <script>
                        alert('Tracker added successfully!');
                        window.location.href = 'http://localhost/habit-tracker/home.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Date already exists!');
                        window.location.href = 'http://localhost/habit-tracker/home.php';
                    </script>
                ";
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    } else {
        echo "
            <script>
                alert('Fill the date!');
                window.location.href = 'http://localhost/habit-tracker/home.php';
            </script>
        ";
    }
}

?>
