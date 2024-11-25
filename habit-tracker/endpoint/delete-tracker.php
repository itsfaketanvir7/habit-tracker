<?php
include ('../conn/conn.php');

if (isset($_GET['tracker'])) {
    $tracker = $_GET['tracker'];

    try {

        $query = "DELETE FROM tbl_tracker WHERE tbl_tracker_id = '$tracker'";

        $stmt = $conn->prepare($query);

        $query_execute = $stmt->execute();

        if ($query_execute) {
            echo "
                <script>
                    alert('Tracker deleted successfully!');
                    window.location.href = 'http://localhost/habit-tracker/home.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Failed to delete tracker!');
                    window.location.href = 'http://localhost/habit-tracker/home.php';
                </script>
            ";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>