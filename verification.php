<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <style type="text/css">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        input[type=number], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    
    <!-- Spinner Loading -->
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!-- End of spinner loading -->


    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We're thrilled to have you here! Get ready to dive into your new account. </div>
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        
        <!-- LOGO -->
        <tr>
            <td bgcolor="#FFA73B" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Welcome!</h1> <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">We're excited to have you get started. First, you need to confirm your account. Enter your verification here.</p>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">

                                            <tr>
                                                <form action="/verification" method="POST" class="register-form" id="verification-form">
                                                    
                                                        <div class="alert alert-danger" id="verification_err" style="display: none" role="alert"></div>

                                                    <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id" id="id">
                                                    <div class="form-group">
                                                        <input type="number" name="verification" id="verification" placeholder="xxxx" required/>
                                                    </div>
                                                
                                                    <div class="form-group form-button" align="center" style="border-radius: 3px;">
                                                        <input type="submit" name="signin" id="signin" style="margin: 8px 0;background-color: #FFA73B;" value="  Verify  " class="btn btn-lg"/>
                                                    </div>
                                                </form>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                </table>
            </td>
        </tr>

        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">ABAARSO TECH UNIVERSITY</h2>
                            <p style="margin: 0; color: #FFA73B;">Thank you for visiting this page</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script> 

        $('#verification').focus()

        $('#verification-form').on('submit', function(e) {

            if( $('#id').val() !== '' ||  $('#verification').val() !== '') {
                
                e.preventDefault()
                var id = $('#id').val();
                var verification = $('#verification').val();

                $.ajax({
                    url:"api/verification.php",
                    method:"POST",
                    data: {id: id, verification: verification},
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);
                    },
                    success:function(data)
                    {
                        
                        var response = JSON.parse(JSON.stringify(data))


                        if (response.verified === false) {
                            $('#verification_err').html("Invalid code PLEASE TRY AGAIN LATER !!")
                            $('#verification_err').css({display: "block"});
                        }
                        else {
                            activate(id); // Activate                          
                        }

                    },
                    complete:function(data){
                        $("#overlay").fadeOut(300);
                    }

                });

            }

            else {

                $('#verification_err').html("Please fill fields")
                $('#verification_err').css({display: "block"});

            }

        })

        function activate(id,username) {
            $.ajax({
                url:"api/activate.php",
                method:"POST",
                data: {id: id},
                beforeSend: function(){
                    $("#overlay").fadeIn(300);
                },
                success:function(data)
                {
                    var response = JSON.parse(JSON.stringify(data))

                    if (response.error === true) {
                        $('#verification_err').html(response.message)
                        $('#verification_err').css({display: "block"});
                    }
                    else {
                        // alert('Verified')
                        // window.location.replace("index.php");
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