<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/3/2018
 * Time: 3:02 PM
 */

include('../connect.php');
global $db;

class UploadClass{
    // Declaring class variables
    public $categoryName, $categoryID;
    public $custDetails;
    public $custId;
    public $custFName;
    public $custLName;
    public $shootName, $shootID;
    public $date;
    public $hours;
    public $camera;
    public $lens;
    public $details;
    public $currDateTime;
    public $temp, $fileName, $ext;
    public $path;

    function __construct(){
        // Intitializing variables
        $this->categoryName = $_POST["category"];
        $this->custDetails = $_POST["custDetails"];
        $this->shootName = $_POST["shootName"];
        $this->date = $_POST["date"];
        $this->hours = $_POST["hours"];
        $this->camera = $_POST["camera"];
        $this->lens = $_POST["lensType"];
        $this->details = $_POST["details"];
        $this->temp = $_FILES['file']['tmp_name'];
        $this->path=$_FILES['file']['name'];
    }

    function getCustID(){
        $array = explode(' ', $this->custDetails);
        $this->custId = $array[0];
        $this->custFName = $array[1];
        $this->custLName = $array[2];
    }

    function getCategoryID(){
        global $db;

        $sql = "SELECT `cat_ID` FROM categories WHERE cat_name = '$this->categoryName'";
        $res = $db->query($sql) or trigger_error($db->error . "[$sql]");
        $row = $res->fetch_assoc();
        $this->categoryID = $row['cat_ID'];
    }

    function getCurrentDateTime(){
        date_default_timezone_set('Africa/Nairobi');
        $this->currDateTime = date('m/d/Y h:i:s a', time());
    }

    function uploadToShootTable(){
        global $db;

        $this->getCategoryID();

        /*Insert folder details into shoot table*/
        $sq = "INSERT INTO `shoot`(`shoot_id`, `cat_ID`, `cust_id`, `shootName`, `hours`, `details`, `created_on`)
            VALUES(NULL, '$this->categoryID', '$this->custId','$this->shootName', '$this->hours','$this->details', '$this->currDateTime')";
        $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");
    }

    function getShootID(){
        global $db;

        $sql = "SELECT `shoot_id` FROM shoot WHERE shootName = '$this->shootName'";
        $res = $db->query($sql) or trigger_error($db->error . "[$sql]");
        $row = $res->fetch_assoc();
        $this->shootID = $row['shoot_id'];
    }

    private function uploadToPhoto(){
        global $db;

        $this->getShootID();
        $this->getCurrentDateTime();

        /*Insert file picture details into photo table*/
        $sq = "INSERT INTO `photo_upload`(`photo_id`, `shoot_id`, `photoName`, `extension`, `dateTimePosted`)
            VALUES(NULL, '$this->shootID', '$this->fileName','$this->ext', '$this->currDateTime')";
        $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");
    }

    function uploadFiles()
    {
        $this->getCustID();
        $this->getCurrentDateTime();
        $this->uploadToShootTable();


            $this->fileName = pathinfo($this->path, PATHINFO_FILENAME);
            $this->ext = pathinfo($this->path, PATHINFO_EXTENSION);

            //Insert file details into db
            $this->uploadToPhoto();

            $dir_separator = DIRECTORY_SEPARATOR;
            $folder = "../images";
            $id_separator = "-";
            $userFolder = $dir_separator . $folder . $dir_separator . $this->custFName . $id_separator . $this->custId . $dir_separator . $this->categoryName . $dir_separator;
            $picFolder = $dir_separator . $folder . $dir_separator . $this->custFName . $id_separator . $this->custId . $dir_separator . $this->categoryName . $dir_separator . $this->shootName . $dir_separator;

            $destination_path = dirname(__FILE__) . $userFolder;
            $folder_path = dirname(__FILE__) . $picFolder;

            $target_path = $folder_path . $_FILES['file']['name'];

            if ($_FILES["fileToUpload"]["size"] > 10000000) {
                echo "Sorry, your file is too large.";
            } else if (!is_dir($destination_path)){
                // Make User directory
                mkdir($destination_path, 0777, true);
                chmod($userFolder, 0777);
            } else if (!is_dir($folder_path)) {
                mkdir($folder_path, 0777, true);
                move_uploaded_file($this->temp, $target_path);
                chmod($picFolder, 0777);
            } else{
                move_uploaded_file($this->temp, $target_path);
                chmod($target_path, 0777, true);
            }
        }


}

$upload = new UploadClass();
if($upload->uploadFiles() == true){?>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
        <script src="../dist/sweetalert.min.js"></script>
    </head>
    <body>
                    <script>
                        swal({
                            title: "Success",
                            text: "Upload successful!",
                            type: "success",
                            timer: 3000,
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            location.href = "uploadPhotos.php"
                        }, 1000);
                    </script>
    </body>
    </html>
<?php
} else{ ?>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
        <script src="../dist/sweetalert.min.js"></script>
    </head>
    <body>
                <script>
                    swal({
                        title: "Aw Snap",
                        text: "An error ocurred! Please retry",
                        type: "error",
                        timer: 30000,
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        location.href = "uploadPhotos.php#"
                    }, 1000);
                </script>
    </body>
    </html>
<?php }