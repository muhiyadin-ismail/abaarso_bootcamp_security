<?php

    // start session
    session_start();

    if(!isset($_SESSION['username'])) {
        header('location: login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        #tooltip {
            position: relative;
        }

        #tooltip #tooltipText {
            visibility: hidden;
            width: 100px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            
            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;
        }

        #tooltip:hover #tooltipText {
            visibility: visible;
        }

        #overlay{	
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height:100%;
            display: none;
            background: rgba(255,255,255,0.7);
        }
        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;  
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #f46f25 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }
        @keyframes sp-anime {
            100% { 
                transform: rotate(360deg); 
            }
        }
        .is-hide{
            display:none;
        }

    </style>


</head>
<body>

    <div class="main" style="background-color:gainsboro;">

        <!-- Spinner Loading -->
        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <!-- End of spinner loading -->


        <!-- Note form -->
        <section class="signup">
            <div class="container">

                <div class="signup-content">
                    <div class="signup-form">
                        <h4 class="form-title">WELCOME  </h4>

                        <div class="alert alert-danger" id="note_err" role="alert" style="display: none"></div>
                        <div class="alert alert-success" id="note_reg_err" role="alert" style="display: none"></div>

                        <button class="btn btn-success btn-large" data-toggle="modal" data-target="#note_modal">New note</button>

                        <!-- Modal -->
                        <div class="modal fade" id="note_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                     <form action="api/note.php" method="POST" class="note-form" id="register-form">

                                        <input type="hidden" id="user_id" value="<?php echo $_SESSION['id']; ?>">
                                        
                                        <div class="form-group">
                                            <label for="title"><i class="zmdi zmdi-book material-icons-book"></i></label>
                                            <input type="text" name="title" id="title" placeholder="Title" required />
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" id="body" name="body" placeholder="Note body" rows="3"></textarea>
                                        </div>
                                        
                                        

                                </div>

                                <div class="modal-footer">

                                        <button type="button" id="dismissModal" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <div class="form-group form-button">
                                            <input type="submit" name="signup" id="note" class="btn btn-sm bg-warning text-dark" value="NEW Note"/>
                                        </div>
                                    </form>


                                </div>
                                </div>
                            </div>
                        </div>


                        <button style="display: none" class="btn btn-success btn-large edit_modal" data-toggle="modal" data-target="#edit_note_modal">New note</button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit_note_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Note</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <form action="api/note.php" method="POST" class="edit-note-form" id="register-form">

                                        <input type="hidden" id="edit_note_id">
                                        
                                        <div class="form-group">
                                            <label for="title"><i class="zmdi zmdi-book material-icons-book"></i></label>
                                            <input type="text" name="title" id="edit_title" placeholder="Title" required />
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" id="edit_body" name="body" placeholder="Note body" rows="3"></textarea>
                                        </div>
                                        
                                        

                                </div>

                                <div class="modal-footer">

                                        <button type="button" id="edit_dismissModal" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <div class="form-group form-button">
                                            <input type="submit" name="signup" id="edit_note" class="btn btn-sm bg-info text-dark" value="Edit Note"/>
                                        </div>
                                    </form>


                                </div>
                                </div>
                            </div>
                        </div>
                       

                    </div>
                    <div class="signup-image">
                        
                        
                        <button id="go_to_profile" class="btn btn-warning btn-sm">Profile</button>
                        <a href="api/logout.php" class="btn btn-info btn-sm">Logout</a>

                        <!-- <figure><img src="assets/images/signup-image.jpg" alt="sing up image"></figure> -->

                    </div>
                </div>
                  
                
                <form action="profile.php" method="POST" id="profile_btn">
                    <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['id'] ?>">
                    <input type="submit" style="display: none" value="Profile" class="btn btn-warning btn-sm">
                </form>


                <!-- NOTES -->
                <div class="alert alert-warning" id="note_delete_err" role="alert" style="display: none"></div>
                <div class="row" id="note_data_container">

                    
                    <div class="col-md-4">
                        <div class="card weather-card" style="background-color: blanchedalmond;">
                                <p>Notes</p>                        
                        </div>
                    </div>

                </div>


                <br><br>

            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $('#name').focus();
        
        get_user_data()
        fetch()

        function fetch() {

            var id = "<?php echo $_SESSION['id']; ?>";
            $.ajax({

                url:"api/fetch_note.php",
                method:"POST",
                data: {id: id},
                beforeSend: function(){
                    $("#overlay").fadeIn(300);
                },
                success:function(data)
                {
                    
                    var response = JSON.parse(JSON.stringify(data))

                    $('#note_data_container').html('');

                    if (response.error === true) {
                        $('#note_err').html(response.message)
                        $('#note_err').css({display: "block"});
                        $('#note_reg_err').css({display: "none"});
                    }
                    else {
                        $('#note_reg_err').css({display: "none"});
                        $('#note_err').css({display: "none"});

                        for (i = 0; i < response.data.length; i++) {

                            var date = new Date(response.data[i].date)
                            var months = ['Jan',"Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                            var days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
                            
                            var day = date.getDate()
                            var month = months[date.getMonth()]
                            var year = date.getFullYear()
                            
                            var dayOftheWeek = days[date.getDay()]
                            var time = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })

                            var yearDate = month  + " " + day + " " + year
                            var timeDate = dayOftheWeek + " " + time + ", "

                            $('#note_data_container').append('<div class="col-md-4" style="padding-bottom: 10px"><div class="card weather-card" style="background-color: blanchedalmond;"><div class="card-body pb-3"><h5 class="card-title font-weight-bold">'+ response.data[i].title +'</h5><p class="card-text"> '+ timeDate +' &nbsp; '+ yearDate +' </p><br><p class="text-dark">'+ response.data[i].body +'</p> <br> <button class="btn btn-sm btn-info" onclick="edit_note('+ response.data[i].id +', `'+ response.data[i].title +'` ,`'+ response.data[i].body +'`)" >edit</button> <button class="btn btn-sm btn-danger" onclick="delete_note('+response.data[i].id+')" >delete</button> </div></div></div>');
                            console.log(response.data[i].title)
                        }
                        // console.log(response.data.length)
                    }

                },
                complete:function(data){
                    $("#overlay").fadeOut(300);
                }

            });

        }
        
        function get_user_data() {
            var id = "<?php echo $_SESSION['id']; ?>";
            $.ajax({

                url:"api/fetch_user_data.php",
                method:"POST",
                data: {id: id},
                beforeSend: function(){
                    $("#overlay").fadeIn(300);
                },
                success:function(data)
                {

                },
                complete:function(data){
                    $("#overlay").fadeOut(300);
                }

            });
        }


        $('.note-form').on('submit', function(e) {

           
            if( $('#user_id').val() !== '' ||  $('#title').val() !== '' ||  $('#body').val() !== '') {
                
                e.preventDefault()

                var id = $('#user_id').val();
                var title = $('#title').val();
                var body = $('#body').val();
                
                $.ajax({
                    url:"api/reg_note.php",
                    method:"POST",
                    data: {id: id,title: title, body: body},
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);
                        $('#dismissModal').click()
                    },
                    success:function(data)
                    {
                        
                        var response = JSON.parse(JSON.stringify(data))

                        if (response.error === true) {
                            $('#note_err').html(response.message)
                            $('#note_err').css({display: "block"});
                            $('#note_reg_err').css({display: "none"});
                            $('#note_delete_err').css({display: "none"});
                        }
                        else {
                            $('#note_reg_err').html(response.message)
                            $('#note_reg_err').css({display: "block"});
                            $('#note_err').css({display: "none"});
                            $('#note_delete_err').css({display: "none"});

                            fetch()
                            $('#dismissModal').click()
                        }

                    },
                    complete:function(data){
                        $("#overlay").fadeOut(300);
                    }

                });
                
            }

            else {

                $('#note_err').html("Please fill fields")
                $('#note_err').css({display: "block"});
                $('#note_reg_err').css({display: "none"});
                $('#note_delete_err').css({display: "none"});

            }

        })

        $('.edit-note-form').on('submit', function(e) {

            if( $('#edit_user_id').val() !== '' ||  $('#edit_title').val() !== '' ||  $('#edit_body').val() !== '') {
                
                e.preventDefault()

                var id = $('#edit_note_id').val();
                var title = $('#edit_title').val();
                var body = $('#edit_body').val();
                
                $.ajax({
                    url:"api/update_note.php",
                    method:"POST",
                    data: {id: id,title: title, body: body},
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);
                        $('#edit_dismissModal').click()
                    },
                    success:function(data)
                    {
                        
                        var response = JSON.parse(JSON.stringify(data))

                        if (response.error === true) {
                            $('#note_err').html(response.message)
                            $('#note_err').css({display: "block"});
                            $('#note_reg_err').css({display: "none"});
                            $('#note_delete_err').css({display: "none"});
                            $('.edit_modal').click();
                        }
                        else {
                            $('#note_reg_err').html(response.message)
                            $('#note_reg_err').css({display: "block"});
                            $('#note_err').css({display: "none"});
                            $('#note_delete_err').css({display: "none"});

                            fetch()
                            $('#edit_dismissModal').click()
                        }

                    },
                    complete:function(data){
                        $("#overlay").fadeOut(300);
                    }

                });

            }

            else {

                $('#note_err').html("Please fill fields")
                $('#note_err').css({display: "block"});
                $('#note_reg_err').css({display: "none"});
                $('#note_delete_err').css({display: "none"});

            }

        })

        $('#go_to_profile').click(function() {
            $("#profile_btn").submit();
        })

        $('#note_modal').on('shown.bs.modal', function () {
            $('#title').trigger('focus');
            $('#id').val('');
            $('#title').val('');
            $('#body').val('');
        })

        $('#edit_note_modal').on('shown.bs.modal', function () {
            $('#edit_title').trigger('focus');
        })
        function edit_note(id,title,body) {

            $('#edit_note_id').val(id);
            $('#edit_title').val(title);
            $('#edit_body').val(body);

            $(".edit_modal").click()
        }

        function delete_note(id) {
            $.ajax({
                url:"api/delete_note.php",
                method:"POST",
                data: {id: id},
                beforeSend: function(){
                    $("#overlay").fadeIn(300);
                },
                success:function(data)
                {
                    
                    var response = JSON.parse(JSON.stringify(data))

                    if (response.error === true) {
                        $('#note_err').html(response.message)
                        $('#note_err').css({display: "block"});
                        $('#note_reg_err').css({display: "none"});
                        $('#note_delete_err').css({display: "none"});
                    }
                    else {
                        $('#note_delete_err').html(response.message)
                        $('#note_delete_err').css({display: "block"});
                        $('#note_err').css({display: "none"});
                        $('#note_reg_err').css({display: "none"});

                        fetch()
                    }

                },
                complete:function(data){
                    $("#overlay").fadeOut(300);
                }

            });
        }

    </script>

</body>
</html>