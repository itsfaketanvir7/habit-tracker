<?php 
include ('../conn/conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

    if (isset($_POST['date'], $_POST['day'])) {
        $trackerID = $_POST['tbl_tracker_id'];
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
            $conn->beginTransaction();

            $stmt = $conn->prepare("UPDATE tbl_tracker SET date = :date, day = :day, exercise = :exercise, pray = :pray, read_book = :read_book, vitamins = :vitamins, laundry = :laundry, alcohol = :alcohol, meat = :meat WHERE tbl_tracker_id = :tbl_tracker_id ");

            $stmt->bindParam(":tbl_tracker_id", $trackerID, PDO::PARAM_STR);
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
                    alert('Tracker updated successfully!');
                    window.location.href = 'http://localhost/habit-tracker/home.php';
                </script>
            ";
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
