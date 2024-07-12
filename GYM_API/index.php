<?php
require __DIR__ . "/inc/bootstrap.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
// echo print_r($uri);
if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'list') {

   require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
   $objFeedController = new UserController();
   $strMethodName = $uri[4] . 'Action';
   $objFeedController->{$strMethodName}();
} else
   if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'signin') {

      require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
      $objFeedController = new UserController();
      $strMethodName = $uri[4] . 'Action';
      $objFeedController->{$strMethodName}();
   } else
      if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'addStaff') {

         require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
         $objFeedController = new UserController();
         $strMethodName = $uri[4] . 'Action';
         $objFeedController->{$strMethodName}();
      } else
         if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'removeStudent') {

            require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
            $objFeedController = new UserController();
            $strMethodName = $uri[4] . 'Action';
            $objFeedController->{$strMethodName}();
         } else
            if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'updatePass') {

               require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
               $objFeedController = new UserController();
               $strMethodName = $uri[4] . 'Action';
               $objFeedController->{$strMethodName}();
            } else
               if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'getUsersForClients') {

                  require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
                  $objFeedController = new UserController();
                  $strMethodName = $uri[4] . 'Action';
                  $objFeedController->{$strMethodName}();
               } else
                  if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'getSubscription') {

                     require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
                     $objFeedController = new UserController();
                     $strMethodName = $uri[4] . 'Action';
                     $objFeedController->{$strMethodName}();
                  } else
                     if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'addCustomer') {

                        require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
                        $objFeedController = new UserController();
                        $strMethodName = $uri[4] . 'Action';
                        $objFeedController->{$strMethodName}();
                     } else
                        if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'addSubscription') {

                           require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
                           $objFeedController = new UserController();
                           $strMethodName = $uri[4] . 'Action';
                           $objFeedController->{$strMethodName}();
                        } else
                           if ((isset($uri[3]) && $uri[3] == 'user') && isset($uri[4]) && $uri[4] == 'updatePrices') {

                              require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
                              $objFeedController = new UserController();
                              $strMethodName = $uri[4] . 'Action';
                              $objFeedController->{$strMethodName}();
                           }
?>