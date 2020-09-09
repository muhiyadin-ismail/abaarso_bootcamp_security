<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="main" style="background-color:gainsboro;">

        <!-- Note form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">

                        <%
                            if (typeof err !== 'undefined') {
                        %>
                        <div class="alert alert-danger" role="alert">
                                Error Happened : <%= err %>
                        </div>

                        <%
                            }   
                        %>

                        <form action="note/" method="POST" class="register-form" id="register-form">

                            <div class="form-group">
                                <label for="title"><i class="zmdi zmdi-book material-icons-book"></i></label>
                                <input type="text" name="title" id="title" placeholder="Title" required />
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="body" name="body" placeholder="Note body" rows="3" required ></textarea>/textarea>
                            </div>
                              
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="note" class="btn btn-sm bg-warning text-dark" value="NEW Note"/>
                            </div>
                        </form>

                    </div>
                    <div class="signup-image">
                        
                        <a href="../" class="btn btn-dark btn-sm">Home</a>
                        <a href="profile?id=<%= id %>" class="btn btn-warning btn-sm">Profile</a>
                        <a href="../logout" class="btn btn-info btn-sm">Logout</a>

                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../js/main.js"></script>

    <script>
        $('#name').focus();
    </script>

</body>
</html>