<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Habit Tracker</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Data Table --> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1517960413843-0aee8e2b3285?q=80&w=1799&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .tracker-container {
            width: 1450px;
            height: 700px;
            background-color: rgba(0, 0, 0, 0.7);
            color: rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 40px;
        }

        .table {
            color: rgb(255, 255, 255) !important; 
            }

        .dataTables_wrapper {
            position: relative;
            padding: 10px;
            height: 570px !important;
            text-align: center !important;
        }

        .dataTables_info {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .dataTables_paginate {
            position: absolute;
            bottom: 10px;
            right: 0px;
        }

        table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting_asc_disabled, table.dataTable thead > tr > th.sorting_desc_disabled, table.dataTable thead > tr > td.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting_asc_disabled, table.dataTable thead > tr > td.sorting_desc_disabled {
            text-align: center;
        }

        .action-button {
            display: flex;
            justify-content: center;
        }
        
        .action-button > button {
            width: 28px;
            height: 28px;
            font-size: 17px;
            display: flex !important;
            justify-content: center;
            align-items: center;
            margin: 0px 2px;
        }
        </style>

</head>
<body>
    
    <div class="main">

        <div class="tracker-container">
            <div class="tracker-header row">
                <h3 class="col-9">Track your daily habit!</h3>
                <button class="btn btn-dark ml-5" data-toggle="modal" data-target="#addTrackerModal">Add tracker today</button>
                <button class="btn btn-danger ml-4" onclick="window.location.href = 'index.php'">Logout</button>
            </div>
            <hr style="background-color: rgb(200, 200, 200)">

            <!-- Add Modal -->
            <div class="modal fade" id="addTrackerModal" tabindex="-1" aria-labelledby="addTracker" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: rgb(60, 60, 60)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTracker">Add Daily Habit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./endpoint/add-tracker.php" method="POST">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label">Date:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="day" class="col-sm-2 col-form-label">Day:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="day" name="day">
                                    </div>
                                </div>
                                <hr style="background-color: rgb(255, 255, 255);">
                                <h4>Habbits</h4>
                                <div class="form-group row">
                                    <label for="exercise" class="col-sm-6 col-form-label">Exercise:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="exercise" id="exercise">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pray" class="col-sm-6 col-form-label">Pray:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="pray" id="pray">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="readBook" class="col-sm-6 col-form-label">Read Book:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="read_book" id="readBook">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vitamins" class="col-sm-6 col-form-label">Vitamins:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="vitamins" id="vitamins">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="laundry" class="col-sm-6 col-form-label">Make Laundry:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="laundry" id="laundry">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alcohol" class="col-sm-6 col-form-label">No Alcohol:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="alcohol" id="alcohol">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meat" class="col-sm-6 col-form-label">No Meat:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="meat" id="meat">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-secondary">Add Tracker</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Modal -->
            <div class="modal fade" id="updateTrackerModal" tabindex="-1" aria-labelledby="updateTracker" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: rgb(60, 60, 60)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTracker">Update Daily Habit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./endpoint/update-tracker.php" method="POST">
                                <input type="hidden" class="form-control" id="updateTrackerID" name="tbl_tracker_id">

                                <div class="form-group row">
                                    <label for="updateDate" class="col-sm-2 col-form-label">Date:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="updateDate" name="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateDay" class="col-sm-2 col-form-label">Day:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="updateDay" name="day">
                                    </div>
                                </div>
                                <hr style="background-color: rgb(255, 255, 255);">
                                <h4>Habbits</h4>
                                <div class="form-group row">
                                    <label for="updateExercise" class="col-sm-6 col-form-label">Exercise:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="exercise" id="updateExercise">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updatePray" class="col-sm-6 col-form-label">Pray:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="pray" id="updatePray">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateReadBook" class="col-sm-6 col-form-label">Read Book:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="read_book" id="updateReadBook">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateVitamins" class="col-sm-6 col-form-label">Vitamins:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="vitamins" id="updateVitamins">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateLaundry" class="col-sm-6 col-form-label">Make Laundry:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="laundry" id="updateLaundry">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateAlcohol" class="col-sm-6 col-form-label">No Alcohol:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="alcohol" id="updateAlcohol">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateMeat" class="col-sm-6 col-form-label">No Meat:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="meat" id="updateMeat">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-secondary">Update Tracker</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-container">
                <table class="table habit-table">
                    <thead class="thead-dark">
                        <tr>    
                            <th scope="col">Date</th>
                            <th scope="col">Day</th>
                            <th scope="col">Exercise</th>
                            <th scope="col">Pray</th>
                            <th scope="col">Read Book</th>
                            <th scope="col">Vitamins</th>
                            <th scope="col">Make Laundry</th>
                            <th scope="col">No Alcohol</th>
                            <th scope="col">No Meat</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        include ('./conn/conn.php');

                        $stmt = $conn->prepare("SELECT * FROM tbl_tracker");
                        $stmt->execute();

                        $result = $stmt->fetchAll();

                        foreach ($result as $row) {
                            $trackerID = $row['tbl_tracker_id'];
                            $date = $row['date'];
                            $day = $row['day'];
                            $exercise = $row['exercise'];
                            $pray = $row['pray'];
                            $readBook = $row['read_book'];
                            $vitamins = $row['vitamins'];
                            $laundry = $row['laundry'];
                            $alcohol = $row['alcohol'];
                            $meat = $row['meat'];

                            // Calculate progress here
                            $totalHabits  = 7;
                            $completedHabits = count(array_filter([$exercise, $pray, $readBook, $vitamins, $laundry, $alcohol, $meat], function($habit) { return $habit == 'Yes'; }));

                            // Avoid division by zero
                            $progress = $totalHabits > 0 ? ($completedHabits / $totalHabits) * 100 : 0;
                            ?>

                            <tr>
                                <th scope="row" id="date-<?= $trackerID ?>"><?= $date ?></th>
                                <td id="day-<?= $trackerID ?>"><?= $day ?></td>
                                <td id="exercise-<?= $trackerID ?>"><?= $exercise ?></td>
                                <td id="pray-<?= $trackerID ?>"><?= $pray ?></td>
                                <td id="readBook-<?= $trackerID ?>"><?= $readBook ?></td>
                                <td id="vitamins-<?= $trackerID ?>"><?= $vitamins ?></td>
                                <td id="laundry-<?= $trackerID ?>"><?= $laundry ?></td>
                                <td id="alcohol-<?= $trackerID ?>"><?= $alcohol ?></td>
                                <td id="meat-<?= $trackerID ?>"><?= $meat ?></td>
                                <td style="width: 150px;">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="action-button">
                                    <button class="btn btn-dark" onclick="updateTracker(<?= $trackerID ?>)"><i class="fa-solid fa-pencil"></i></button>
                                    <button class="btn btn-danger" onclick="deleteTracker(<?= $trackerID ?>)"><i class="fa-solid fa-trash"></i></button>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    
    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('.habit-table').DataTable();
        });

        function updateTracker(id) {
            $("#updateTrackerModal").modal("show");

            let updateTrackerID = id;
            let updateDate = $("#date-" + id).text();
            let updateDay = $("#day-" + id).text();
            let updateExercise = $("#exercise-" + id).text();
            let updatePray = $("#pray-" + id).text();
            let updateReadBook = $("#readBook-" + id).text();
            let updateVitamins = $("#vitamins-" + id).text();
            let updateLaundry = $("#laundry-" + id).text();
            let updateAlcohol = $("#alcohol-" + id).text();
            let updateMeat = $("#meat-" + id).text();

            $("#updateTrackerID").val(updateTrackerID);
            $("#updateDate").val(updateDate);
            $("#updateDay").val(updateDay);
            $("#updateExercise option").each(function() {
                let exercise = $(this).text();
                if (exercise === updateExercise) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updatePray option").each(function() {
                let pray = $(this).text();
                if (pray === updatePray) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateReadBook option").each(function() {
                let readBook = $(this).text();
                if (readBook === updateReadBook) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateVitamins option").each(function() {
                let vitamins = $(this).text();
                if (vitamins === updateVitamins) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateLaundry option").each(function() {
                let laundry = $(this).text();
                if (laundry === updateLaundry) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateAlcohol option").each(function() {
                let alcohol = $(this).text();
                if (alcohol === updateAlcohol) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateMeat option").each(function() {
                let meat = $(this).text();
                if (meat === updateMeat) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
        }

        function deleteTracker(id) {
            if (confirm("Do you want to delete this record?")) {
                window.location = "./endpoint/delete-tracker.php?tracker=" + id;
            }
        }
    </script>
</body>
</html>