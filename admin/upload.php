<?php
/**
 * Created by PhpStorm.
 * User: githinji
 * Date: 15/06/2018
 * Time: 21:35
 */


    include ('../connect.php');

    // Intitializing variables
    $categoryName = $_POST["category"];
    $custDetails = $_POST["custDetails"];
    $shootName = $_POST["shootName"];
    $date = $_POST["date"];
    $hours = $_POST["hours"];
    $camera = $_POST["camera"];
    $lens = $_POST["lensType"];
    $details = $_POST["details"];

    $temp = $_FILES['file']['tmp_name'];
    $path=$_FILES['file']['name'];


    global $db;


    $array = explode(' ', $custDetails);
    $custId = $array[0];
    $custFName = $array[1];
    $custLName = $array[2];


    date_default_timezone_set('Africa/Nairobi');
    $currDateTime = date('m/d/Y h:i:s a', time());

    $sql = "SELECT `cat_ID` FROM categories WHERE cat_name = '$categoryName'";
    $res = $db->query($sql) or trigger_error($db->error . "[$sql]");
    $row = $res->fetch_assoc();
    $categoryID = $row['cat_ID'];

    /*Insert folder details into shoot table*/
    $sq = "INSERT INTO `shoot`(`shoot_id`, `cat_ID`, `cust_id`, `shootName`, `hours`, `details`, `created_on`)
                VALUES(NULL, '$categoryID', '$custId','$shootName', '$hours','$->details', '$currDateTime')";
    $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");


    $fileName = pathinfo($this->path, PATHINFO_FILENAME);
    $ext = pathinfo($this->path, PATHINFO_EXTENSION);

    //Insert file details into shoot table
    $sql = "SELECT `shoot_id` FROM shoot WHERE shootName = '$shootName'";
    $res = $db->query($sql) or trigger_error($db->error . "[$sql]");
    $row = $res->fetch_assoc();
    $shootID = $row['shoot_id'];

    /*Insert file picture details into photo table*/
    $s = "INSERT INTO `photo_upload`(`photo_id`, `shoot_id`, `photoName`, `extension`, `dateTimePosted`)
                VALUES(NULL, '$this->shootID', '$fileName','$ext', '$currDateTime')";
    $r = $db->query($s) or trigger_error($db->error."[$s]");

    $dir_separator = DIRECTORY_SEPARATOR;
    $folder = "images";
    $id_separator = "-";
    $userFolder = $dir_separator . $folder . $dir_separator . $custFName . $id_separator . $custId . $dir_separator . $categoryName . $dir_separator;
    $picFolder = $dir_separator . $folder . $dir_separator . $custFName . $id_separator . $custId . $dir_separator . $categoryName . $dir_separator . $shootName . $dir_separator;

    $destination_path = dirname(__FILE__) . $userFolder;
    $folder_path = dirname(__FILE__) . $picFolder;

    $target_path = $folder_path . $_FILES['file']['name'];

    if ($_FILES["fileToUpload"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
    } else if (!is_dir($destination_path) || !is_dir($folder_path)) {
        // Upload to directory
        mkdir($destination_path);
        mkdir($folder_path);
        move_uploaded_file($temp, $target_path);
    } else{
        move_uploaded_file($temp, $target_path);
    }

//while ($row = mysqli_fetch_array($res)) {
//        $fname = $row['firstName'];
//        $sname = $row['surname'];
//        $custId = $row['custID'];
//
//        if($_POST["folder"]){
//            $folderName = $_POST["folder"];
//        }else{
//            $folderName = "Uncategorised";
//        }
//
//        if (!empty($_FILES)) {
//
//            $temp = $_FILES['file']['tmp_name'];
//            $path=$_FILES['file']['name'];
//            $fileName = pathinfo($path, PATHINFO_FILENAME);
//            $ext = pathinfo($path, PATHINFO_EXTENSION);
//
//        $dir_separator = DIRECTORY_SEPARATOR;
//        $folder = "images";
//        $id_separator = "-";
//        $userFolder =$dir_separator. $folder . $dir_separator.$fname.$sname.$id_separator.$custId . $dir_separator;
//        $picFolder =$dir_separator. $folder . $dir_separator.$fname.$sname.$id_separator.$custId .$dir_separator.$folderName. $dir_separator;
//
//        $destination_path = dirname(__FILE__) .$userFolder;
//        $folder_path = dirname(__FILE__) .$picFolder;
//
//        $target_path = $folder_path . $_FILES['file']['name'];
//
//        $date = date('Y-m-d');
//        $time = date('H:i:s');
//
//        if ($_FILES["fileToUpload"]["size"] > 10000000) {
//            echo "Sorry, your file is too large.";
//        } else if (!is_dir($destination_path) || !is_dir($folder_path)) {
//            /*Insert file details into db*/
//            $sq = "INSERT INTO `customer_upload`
//                    (`picID`,`datePosted`,`timePosted`,`folderName`, `name`, `extension`, `edit_status`, `custID`)
//                    VALUES('', '$date', '$time','$folderName', '$fileName','$ext', 'Unedited','$custId')";
//            $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");
//
//            mkdir($destination_path);
//            mkdir($folder_path);
//            move_uploaded_file($temp, $target_path);?>
<!--            <script>-->
<!--                swal({-->
<!--                    title: "Success",-->
<!--                    text: "Upload successful!",-->
<!--                    type: "success",-->
<!--                    timer: 1500,-->
<!--                    showConfirmButton: false-->
<!--                });-->
<!--            </script>-->
<!--            --><?php
//        } else {
//            /*Insert file details into db*/
//            $sq = "INSERT INTO `customer_upload`
//                    (`picID`,`datePosted`,`timePosted`,`folderName`, `name`, `extension`, `edit_status`, `custID`)
//                    VALUES('', '$date', '$time','$folderName', '$fileName','$ext', 'Unedited','$custId')";
//            $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");
//
//            move_uploaded_file($temp, $target_path);?>
<!--            <script>-->
<!--                swal({-->
<!--                    title: "Success",-->
<!--                    text: "Upload successful!",-->
<!--                    type: "success",-->
<!--                    timer: 1500,-->
<!--                    showConfirmButton: false-->
<!--                });-->
<!--            </script>-->
<!--            --><?php
//        }
//    }
//}