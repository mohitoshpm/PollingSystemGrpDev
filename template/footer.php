
        <!-- jQuery -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <!-- Bootstrap JavaScript -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        

        <script src="./inc/js/bootstrap/bootstrap.min.js"></script>
        
        

        <script src="./inc/js/script.js"></script>

        <script>
             var pollingApp = angular.module('pollingApp', []);
        </script>

        <?php if(isset($GLOBALS["controllerName"]) && $GLOBALS["controllerName"]!==""):?>
        <script src="./<?php echo $GLOBALS["controllerName"];?>"></script>
        <?php endif?>

    </body>
</html>
