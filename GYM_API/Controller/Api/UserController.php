<?php
class UserController extends BaseController
{
    /** 
     * "/user/list" Endpoint - Get list of users 
     */
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                $intLimit = 100;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
                $arrUsers = $userModel->getUsers($intLimit);
                // $responseData = json_encode($arrUsers);
                $responseData = '{"status":200,"message":"List Of Users","data":' . json_encode($arrUsers) . '}';

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function getUsersForClientsAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                $intLimit = 100;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
                $arrUsers = $userModel->getUsersForClients($intLimit);
                // $responseData = json_encode($arrUsers);
                $responseData = '{"status":200,"message":"List Of Users","data":' . json_encode($arrUsers) . '}';

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function getSubscriptionAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                $intLimit = 100;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
                $arrUsers = $userModel->getSubscription($intLimit);
                // $responseData = json_encode($arrUsers);
                $responseData = '{"status":200,"message":"List Of subscriptions","data":' . json_encode($arrUsers) . '}';

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function getSubscriptionDetailAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                $intLimit = 100;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
                $arrUsers = $userModel->getSubscriptionDetail($intLimit);
                // $responseData = json_encode($arrUsers);
                $responseData = '{"status":200,"message":"List Of subscriptions","data":' . json_encode($arrUsers) . '}';

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function signinAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // echo print_r($_SERVER);
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $password;
                $username;
                if ((isset($_POST['username']) && $_POST['username']) && (isset($_POST['password']) && $_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];


                    if ($username && $password) {
                        $arrUsers = $userModel->checkCredentials($username, $password);
                        if ($arrUsers) {
                            $responseData = '{"status":200,"message":"User Login Successfully","data":' . json_encode($arrUsers) . '}';
                        } else {
                            $strErrorDesc = 'User Credentials Wrong';
                            $strErrorHeader = 'HTTP/1.1 401 Authentication Failure';
                        }
                    }
                } else {
                    $strErrorDesc = 'Please enter credentials';
                    $strErrorHeader = 'HTTP/1.1 200 OK';
                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function addStaffAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $requestMethod = 'POST';
        // echo print_r($_SERVER);
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $name;
                $email;
                $mobileNumber;
                $salary;
                $position;
                $address;
                $info;

                if ((isset($_POST['name']) && $_POST['name']) && (isset($_POST['email']) && $_POST['email']) && (isset($_POST['mobileNumber']) && $_POST['mobileNumber']) && (isset($_POST['salary']) && $_POST['salary']) && (isset($_POST['position']) && $_POST['position']) && (isset($_POST['address']) && $_POST['address']) && (isset($_POST['info']) && $_POST['info'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobileNumber = $_POST['mobileNumber'];
                    $salary = $_POST['salary'];
                    $position = $_POST['position'];
                    $address = $_POST['address'];
                    $info = $_POST['info'];
                    $folder = "C://xampp//htdocs//GYM_API//uploads/";
                    $path = $folder . basename($_FILES['file']['name']);
                    $imagePath = basename($_FILES['file']['name']);

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {

                        if ($name && $email && $mobileNumber && $salary && $position && $address && $info) {
                            $arrUsers = $userModel->addStaff($name, $email, $mobileNumber, $salary, $position, $address, $imagePath, $info);
                            if ($arrUsers) {
                                $responseData = '{"status":200,"message":"Staff Added Successfully","data":' . json_encode($arrUsers) . '}';
                            } else {
                                $strErrorDesc = 'User Credentials Wrong';
                                $strErrorHeader = 'HTTP/1.1 401 Authentication Failure';
                            }
                        }
                    } else {
                        echo "There was an error uploading the file, please try again!";
                    }


                } else {
                    $strErrorDesc = 'Please enter credentials';
                    $strErrorHeader = 'HTTP/1.1 200 OK';
                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function addCustomerAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // echo print_r($_SERVER);
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $name;
                $email;
                $mobileNumber;
                $amount;
                $duration;
                $subscriptionName;
                $startingDate;

                if ((isset($_POST['name']) && $_POST['name']) && (isset($_POST['email']) && $_POST['email']) && (isset($_POST['mobileNumber']) && $_POST['mobileNumber']) && (isset($_POST['amount']) && $_POST['amount']) && (isset($_POST['duration']) && $_POST['duration']) && (isset($_POST['subscriptionName']) && $_POST['subscriptionName']) && (isset($_POST['startingDate']) && $_POST['startingDate'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobileNumber = $_POST['mobileNumber'];
                    $amount = $_POST['amount'];
                    $duration = $_POST['duration'];
                    $subscriptionName = $_POST['subscriptionName'];
                    $startingDate = $_POST['startingDate'];

                    if ($name && $email && $mobileNumber && $amount && $duration && $subscriptionName && $startingDate) {
                        $arrUsers = $userModel->addCustomer($name, $email, $mobileNumber, $amount, $duration, $subscriptionName, $startingDate);
                        if ($arrUsers) {
                            $responseData = '{"status":200,"message":"Customer Added Successfully","data":' . json_encode($arrUsers) . '}';
                        } else {
                            $strErrorDesc = 'User Credentials Wrong';
                            $strErrorHeader = 'HTTP/1.1 401 Authentication Failure';
                        }
                    }
                } else {
                    $strErrorDesc = 'Please enter credentials';
                    $strErrorHeader = 'HTTP/1.1 200 OK';
                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function addSubscriptionAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // echo print_r($_SERVER);
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $name;
                $desc1;
                $desc2;
                $desc3;
                $desc4;
                $desc5;
                $desc6;
                $desc7;
                $desc8;
                $fees;

                if ((isset($_POST['name1']) && $_POST['name1']) && (isset($_POST['desc1']) && $_POST['desc1']) && (isset($_POST['desc2']) && $_POST['desc2']) && (isset($_POST['desc3']) && $_POST['desc3']) && (isset($_POST['desc4']) && $_POST['desc4']) && (isset($_POST['desc5']) && $_POST['desc5']) && (isset($_POST['desc6']) && $_POST['desc6']) && (isset($_POST['desc7']) && $_POST['desc7']) && (isset($_POST['desc8']) && $_POST['desc8']) && (isset($_POST['fees']) && $_POST['fees'])) {
                    $name = $_POST['name1'];
                    $desc1 = $_POST['desc1'];
                    $desc2 = $_POST['desc2'];
                    $desc3 = $_POST['desc3'];
                    $desc4 = $_POST['desc4'];
                    $desc5 = $_POST['desc5'];
                    $desc6 = $_POST['desc6'];
                    $desc7 = $_POST['desc7'];
                    $desc8 = $_POST['desc8'];
                    $fees = $_POST['fees'];

                    if ($name && $desc1 && $desc2 && $desc3 && $desc4 && $desc5 && $desc6 && $desc7 && $desc8 && $fees) {
                        $arrUsers = $userModel->addSubscription($name, $desc1, $desc2, $desc3, $desc4, $desc5, $desc6, $desc7, $desc8, $fees);
                        if ($arrUsers) {
                            $responseData = '{"status":200,"message":"Subscription Added Successfully","data":' . json_encode($arrUsers) . '}';
                        } else {
                            $strErrorDesc = 'User Credentials Wrong';
                            $strErrorHeader = 'HTTP/1.1 401 Authentication Failure';
                        }
                    }
                } else {
                    $strErrorDesc = 'Please enter credentials';
                    $strErrorHeader = 'HTTP/1.1 200 OK';
                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


    public function removeStudentAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // echo print_r($_SERVER);
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $roll;


                if ((isset($_POST['roll']) && $_POST['roll'])) {
                    $roll = $_POST['roll'];




                    if ($roll) {
                        $arrUsers = $userModel->removeStudent($roll);
                        if ($arrUsers) {
                            $responseData = '{"status":200,"message":"User Login Successfully","data":' . json_encode($arrUsers) . '}';
                        } else {
                            $strErrorDesc = 'User Credentials Wrong';
                            $strErrorHeader = 'HTTP/1.1 401 Authentication Failure';
                        }
                    }
                } else {
                    $strErrorDesc = 'Please enter credentials';
                    $strErrorHeader = 'HTTP/1.1 200 OK';
                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function updatePassAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // echo print_r($_SERVER);
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $newPass;
                if ((isset($_POST['oldPass']) && $_POST['newPass'])) {
                    $newPass = $_POST['newPass'];
                    if ($newPass) {
                        $arrUsers = $userModel->updatePass($newPass);
                        if ($arrUsers) {
                            $responseData = '{"status":200,"message":"Password Successfully Updated","data":' . json_encode($arrUsers) . '}';
                        } else {
                            $strErrorDesc = 'User Credentials Wrong';
                            $strErrorHeader = 'HTTP/1.1 401 Authentication Failure';
                        }
                    }
                } else {
                    $strErrorDesc = 'Please enter credentials';
                    $strErrorHeader = 'HTTP/1.1 200 OK';
                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function updatePricesAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // echo print_r($_SERVER);
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $newFees;
                $newName;
                $name;
                if ((isset($_POST['newFees']) && $_POST['newName'] && $_POST['name'])) {
                    $newFees = $_POST['newFees'];
                    $newName = $_POST['newName'];
                    $name = $_POST['name'];
                    if ($newFees && $newName && $name) {
                        $arrUsers = $userModel->updatePrices($newFees, $newName, $name);
                        if ($arrUsers) {
                            $responseData = '{"status":200,"message":"Prices Successfully Updated","data":' . json_encode($arrUsers) . '}';
                        } else {
                            $strErrorDesc = 'User Credentials Wrong';
                            $strErrorHeader = 'HTTP/1.1 401 Authentication Failure';
                        }
                    }
                } else {
                    $strErrorDesc = 'Please enter credentials';
                    $strErrorHeader = 'HTTP/1.1 200 OK';
                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output 
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


}