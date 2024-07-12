<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class UserModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM staff ORDER BY Staffid ASC LIMIT ?", ["i", $limit]);
    }
    public function getUsersForClients($limit)
    {
        return $this->select("SELECT * FROM customer ORDER BY CustomerId ASC LIMIT ?", ["i", $limit]);
    }
    public function getSubscription($limit)
    {
        return $this->select("SELECT * FROM subscription ORDER BY Subid ASC LIMIT ?", ["i", $limit]);
    }


    public function checkCredentials($username, $password)
    {
        return $this->select("SELECT * FROM loginadmin where username='$username' and password='$password' limit 1");
    }
    public function addStaff($name, $email, $mobileNumber, $salary, $position, $address, $imagepath, $info)
    {
        return $this->insert("insert into staff (name,email,mobileNumber,salary,position,address,info,imagepath) values ('$name','$email',$mobileNumber,$salary,'$position','$address','$info','$imagepath')");
    }
    public function addCustomer($name, $email, $mobileNumber, $amount, $duration, $subscriptionName, $startingDate)
    {
        return $this->insert("insert into customer (name,email,mobileNumber,amount,duration,subscriptionName,startingDate) values ('$name','$email',$mobileNumber,$amount,'$duration','$subscriptionName','$startingDate')");
    }
    public function addSubscription($name, $desc1, $desc2, $desc3, $desc4, $desc5, $desc6, $desc7, $desc8, $fees)
    {
        return $this->insert("insert into subscription (name,desc1,desc2,desc3,desc4,desc5,desc6,desc7,desc8,fees) values('$name','$desc1','$desc2','$desc3','$desc4','$desc5','$desc6','$desc7','$desc8',$fees)");
    }

    public function removeStudent($roll)
    {
        return $this->delete("delete FROM student where roll='$roll'");
    }
    public function updatePass($newPass)
    {
        return $this->update("update  loginadmin set  password='$newPass'");
    }
    public function updatePrices($newFees, $newName, $name)
    {
        return $this->update("update  subscription set  fees='$newFees' , name='$newName' where name='$name'");
    }
}