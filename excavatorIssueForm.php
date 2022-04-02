<?php
    require_once "objects/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Report Excavator Issue</title>
</head>
<body>
    <div class="container" id="app">
        <div class="row justify-content-center">
 
            <div class="col-sm-6 text-center mt-4">
                <form action="processIssue.php" method="POST">
                    <div class="form-group">
                        <h4>Report Excavator Issue<h4>
                    </div>
                  
                    <div class="form-group row">
                        <label for="rfidNumber" class="col col-form-label">RFID Number</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="rfidNumber" name="rfidNumber" value='195102108001'  readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="employeeName" class="col col-form-label">Employee Name</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="employeeName" name="employeeName" value='Peter'  readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="excavatorNo" class="col col-form-label">Excavator Location</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="location" name="location">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="excavatorNo" class="col col-form-label">Excavator No</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="excavatorNo" name="excavatorNo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="issue" class="col col-form-label">Issue</label>
                        <div class="col-sm">
                        <input type="text" class="form-control" id="issue" name="issue">
                        </div>
                    </div>

                    <button name='submit' type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>    
    <script>

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



</body>
</html>