<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
        <!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
        <link rel="stylesheet" href="../login/css/login.css" type="text/css" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link rel="stylesheet" href="../menu/css/menu.css" type="text/css" />
        
        <!-- SCRIPTS -->
    	<script type="text/javascript" src="menu/js/menu.js"></script>
        <script type="text/javascript" src="login/js/login.js"></script>
    </head>
    
    <body onload="hideLoading();">
        <?php require_once('menu/menu.php'); ?>
        
        <div id="mainWrapper">
            <div id="mainWrapperLoginWrapper">
                <div id="mainWrapperLoginWrapperLoginInput">
                    <div id="mainWrapperLoginWrapperLoginInputEmail">
                        <p id="mainWrapperLoginWrapperLoginInputEmailPar">Email</p>
                        <input id="mainWrapperLoginWrapperLoginInputEmailInput" type="text"  autocomplete="off"/>
                    </div>
                    <div id="mainWrapperLoginWrapperLoginInputPassword">
                        <p id="mainWrapperLoginWrapperLoginInputPasswordPar">Password</p>
                        <input id="mainWrapperLoginWrapperLoginInputPasswordInput" type="password" autocomplete="off"/>
                    </div>
                    <div id="mainWrapperLoginWrapperLoginInputSubmit">
                        <input id="mainWrapperLoginWrapperLoginInputSubmitInput" type="submit" name="submit" value="Log in" / onclick="login();">
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>