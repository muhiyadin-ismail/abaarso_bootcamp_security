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
    <title>Profile</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="main" style="background-color:gainsboro;">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h4 class="form-title">Profile </h4>
                        <form action="api/update_profile.php" method="POST" class="register-form" id="register-form">

                            <div class="alert alert-danger" role="alert" id="profile_err" style="display: none"></div>
                            <div class="alert alert-success" role="alert" id="profile_updated_err" style="display: none"></div>

                            <input type="hidden" name="id" id="id">

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Full Name" value="<%= row.name %>" required  onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' />
                            </div>

                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="username" required/>
                            </div>

                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="tel" name="phone" id="phone" placeholder="Your Phone number" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" value="password" required/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Update"/>
                            </div>
                        
                        </form>
                    </div>
                    <div class="signup-image">
                        
                        <a href="index.php" class="btn btn-warning btn-sm">Home</a>
                        <a href="api/logout.php" class="btn btn-info btn-sm">Logout</a>

                        <figure><img src="assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <!-- <a href="login/" class="signup-image-link">I am already member</a> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        $('#name').focus();

        var id = "<?php echo $_POST['id']; ?>";
        $.ajax({
            url:"api/profile.php",
            method:"POST",
            data: {id: id},
            beforeSend: function(){

            },
            success:function(data)
            {
                
                var response = JSON.parse(JSON.stringify(data))

                
                if (response.error === true) {
                    $('#profile_err').html(response.message)
                    $('#profile_err').css({display: "block"});
                }
                else {

                    $('#profile_err').css({display: "none"});

                    $('#id').val(response.id)
                    $('#name').val(response.name)
                    $('#username').val(response.username)
                    $('#phone').val(response.phone)
                    $('#pass').val("password")
                }

            }

        });

        $('#register-form').on('submit', function(e) {

            if( $('#id').val() !== '' ||  $('#name').val() !== '' || $('#username').val() !== '' ||  $('#phone').val() !== '' ||  $('#pass').val() !== '') {
                
                e.preventDefault()
                var id = $('#id').val();
                var name = $('#name').val();
                var username = $('#username').val();
                var phone = $('#phone').val();
                var password = $('#pass').val();

                $.ajax({
                    url:"api/update_profile.php",
                    method:"POST",
                    data: {id: id,name: name, phone: phone, username: username ,pass: password},
                    beforeSend: function(){
                        
                    },
                    success:function(data)
                    {
                        
                        var response = JSON.parse(JSON.stringify(data))

                        if (response.error === true) {
                            $('#profile_err').html(response.message)
                            $('#profile_err').css({display: "block"});
                        }
                        else {

                            $('#profile_updated_err').html(response.message)
                            $('#profile_updated_err').css({display: "block"});
                            $('#profile_err').css({display: "none"});

                            // window.location.href = "index.php"
                        }

                    }

                });

            }

            else {

                $('#profile_err').html("Please fill fields")
                $('#profile_err').css({display: "block"});

            }

        })

    </script>

</body>
</html>