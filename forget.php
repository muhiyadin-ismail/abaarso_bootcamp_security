<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    
                  

                    <div class="signin-image">
                        <figure><img src="assets/images/two.webp" alt="sing up image"></figure>
                        <a href="registeration.php" class="signup-image-link">Create an account</a>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                        
                    </div>

                    <div class="signin-form">

                        <div class="alert alert-danger" role="alert" id="login_err" style="display: none"></div>

                        <h2 class="form-title">Forget Password</h2>
                        <form action="api/login.php" method="POST" class="register-form" id="login-form">
                            
                            <div class="form-group">
                                <label for="phone"><i>063</i></label>
                                <input type="tel" name="phone" pattern=".{7}" id="phone" placeholder="4xxxxxx" required/>
                            </div>

                           
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="forget_pass" class="form-submit" value="Forget"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

        <form action="verification.php" method="POST">
            <input type="hidden" id="verification_id" name="id">
            <input type="text" id="type" name="type" value="forget">
            <input type="submit" style="display: none" value="gotoverifiation" id="verification">
        </form>

    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        $('#username').focus();

        $('#login-form').on('submit', function(e) {

            if( $('#phone').val() !== '') {
                
                e.preventDefault()
                var phone = $('#phone').val();

                $.ajax({
                    url:"api/forget_password.php",
                    method:"POST",
                    data: {phone: phone},
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);
                    },
                    success:function(data)
                    {
                        
                        var response = JSON.parse(JSON.stringify(data))
                        
                        if (response.error === true) {
                                $('#login_err').html(response.message)
                                $('#login_err').css({display: "block"});
                        }
                        else {

                            $('#verification_id').val(response.reg_id)
                            $('#verification').click()
                            // alert(response.message)
                            // window.location.replace("index.php")
                        }

                    },
                    complete:function(data){
                        $("#overlay").fadeOut(300);
                    }

                });

            }

            else {

                $('#login_err').html("Please fill fields")
                $('#login_err').css({display: "block"});

            }


        })

    </script>

</body>
</html>