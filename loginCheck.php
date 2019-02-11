<?php 
  session_start();
  if(isset($_SESSION['userName']) && isset($_SESSION['name']) ){
    switch ($_SESSION['userType']) {
        case 'masteradmin':
          header("Location: admin/index.php");
          break;
          case 'subadmin':
          header("Location: subadmin/index.php");
          break;
          case 'merchant':
          header("Location: merchant/index.php");
          break;
          default:
          header("location: login.php");
          break;
      }
  }
  $error = "";
  if(isset($_POST['submit'])){
    $userType = $_POST['userType'];
    $userName = $_POST['userName'];
    $password = md5($_POST['password']);
    $sql = "select userName,password,name,status from $userType where userName = '$userName'";
    $query = mysqli_query($con, $sql);
    $adminInfo = mysqli_fetch_array($query);

    if($adminInfo['userName'] != $userName){
      $error = "Wrong User Name";
    }
    else{
      if($adminInfo['password'] != $password){
        $error = "Wrong Password";
      }
      else{
        if($adminInfo['status'] != 1){
          $error = "Your request is pending. Please wait up to approve";
        }
        else{
          $_SESSION['userName'] = $adminInfo['userName'];
          $_SESSION['name'] = $adminInfo['name'];
          $_SESSION['userType'] = $userType;
          $_SESSION['login'] = true;
          switch ($userType) {
            case 'masteradmin':
              header("Location: admin/index.php");
              break;
              case 'subadmin':
              header("Location: subadmin/index.php");
              break;
              case 'merchant':
              header("Location: merchant/index.php");
              break;
            default:
              # code...
              break;
          }
        }
      }
    }
  }
?>