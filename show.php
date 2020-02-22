<?php
    // session_start();
    // if ($_SESSION['login'] != true) {
    //     header("location:login.php");
    // }
    // include "connection.php";
    // $data = "";
    // $sql = "SELECT chats.id, chats.message, chats.created_at, users.initial AS name, chats.user_id  FROM chats JOIN `users` ON chats.user_id = users.id WHERE chats.`status`='read' ORDER BY created_at ASC";
    // $view = $mysqli->query($sql);
    // $num_result = $view->num_rows;
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/chat.css">
    <title>Questionnaire BB/TB</title>
</head>

<body>
    <div class=" jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">BB/TB</h1>
            <p class="lead">This application was created to fulfill the portfolio</p>
        </div>
    </div>
    <div class="container">
        <!-- Flexbox container for aligning the toasts -->
        <div class="card">
            <div class="card-header">
                Questionnaire
            </div>
            <div class="card-body">
                <form action="create.php" method="POST" id="form-store">
                    <div class="form-group">
                        <label for="name" class="">Nama<b class="text-danger">*</b></label>
                        <input type="text" name="name" id="name" placeholder="Jhon Doe" class="form-control" required autocomplete="off" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="class" class="">Kelas<b class="text-danger">*</b></label>
                        <select name="class" id="class" class="form-control" required>
                            <option value="AKL 1" selected>AKL 1</option>
                            <option value="AKL 2">AKL 2</option>
                            <option value="AKL 3">AKL 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jk" class="">Jenis Kelamin<b class="text-danger">*</b></label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="P" selected>P</option>
                            <option value="L">L</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bb" class="">Berat Badan (KG)<b class="text-danger">*</b></label>
                        <input type="number" min="1" name="bb" id="bb" placeholder="miss: 50" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="tb" class="">Tinggi Badan (CM)<b class="text-danger">*</b></label>
                        <input type="number" min="1" name="tb" id="tb" placeholder="miss: 140" class="form-control" required autocomplete="off">
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
                                You Are My Hero
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="sbm" class="btn btn-info btn-sm send float-right mb-3">Send</button>
                </form>
            </div>
        </div>
        <hr>
        <br>
        <br>
        <hr>
        <p class="text-muted">&copy; TM 2020</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    $('body').on('submit', '#form-store', function(e) {
        e.preventDefault();
        $(this).find(':input[type=submit]').prop('disabled', true);
        let name = $('#name').val();
        let jk = $('#jk').val();
        let kelas = $('#class').val();
        let bb = $('#bb').val();
        let tb = $('#tb').val();
        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: {
                name: name,
                jk: jk,
                class: kelas,
                bb: bb,
                tb: tb,
            },
            success: function(res) {
                $('.toast').toast('show')
                setTimeout(() => {
                    window.location = 'http://smkn1subang.sch.id/'
                    // window.reload();
                }, 2000)
            },
            error: function(xhr) {
                alert('T0912 Error Code')
            }
        });
    });
    </script>
</body>

</html>