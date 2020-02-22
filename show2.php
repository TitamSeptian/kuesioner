<?php
   include "connection.php";
   $data = "";
   $view = $mysqli->query("SELECT * FROM chats;");
   $num_result = $view->num_rows;

   if($num_result > 0){
     while ($row = $view->fetch_assoc()) {
        extract($row);
        $data.="
         <tr>
         <td>{$initials}</td>
         <td>{$message}</td>
         <td>{$created_at}</td>
         </tr>
         ";
       }
   } else {
    $data = "Masih Kosong.";
   }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Ra & 9889!</title>
</head>

<body>
    <div class=" jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Ra</h1>
            <p class="lead">This application was made to contact you</p>
        </div>
    </div>
    <div class="container">
        <!-- Flexbox container for aligning the toasts -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Initials</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $data ?>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="form-group">
            <label for="initials">Initials</label>
            <input type="text" class="form-control" id="initials" placeholder="Ra">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
        </div>
        <div aria-live="polite" aria-atomic="true" style="position: relative">
            <div class="toast" data-animation="true" data-delay="2000" data-autohide="true" style="position: absolute; top: 90%; left: 0;">
                <div class="toast-header">
                    <span class="rounded mr-2 bg-primary" style="width: 15px;height: 15px"></span>
                    <strong class="mr-auto">Thank You</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    contact me again
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-info btn-sm send float-right">Send</button>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    $('body').on('click', '.send', function(e) {
        e.preventDefault();
        let initials = $('#initials').val();
        let message = $('#message').val();
        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: {
                initials: initials,
                message: message,
            },
            success: function(res) {
                $('.toast').toast('show')
                setTimeout(() => {
                    window.location = 'show.php'
                }, 2000)
            },
            error: function(xhr) {
                alert('contact me to fix this issue')
            }
        });
    });
    </script>
</body>

</html>