<?php
namespace bitm;
use PDO;
class Banner
{
    public $id = null;
    public $title = null;
    public $conn = null;

    //Construct
    public function __construct()
    {
        session_start();
        //Connect to database
        $this->conn = new PDO("mysql:host=localhost;dbname=ecommerce",
        'root', '');
        //set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    }
    //index function
    public function Index()
    {
        $query = "SELECT * FROM `banner`";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $banners = $stmt->fetchAll();
        return $banners;

    }
    //Show function
    public function Show()
    {
       
        $_id = $_GET['id'];

        $query = "SELECT * FROM `banner` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();
        return $banner;
    }
    //Delete function
    public function Delete()
    {       
        $_id = $_GET['id'];
        $query = "DELETE FROM `banner` WHERE `banner`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        if ($result)
        {
            $_SESSION['message'] = "Banner is deleted successfully";
        }
        else
        {
            $_SESSION['message'] = "Banner is not deleted";
        }
        header("location:index.php");
    }
    // Edit function
    public function Edit()
    {
            
        $_id = $_GET['id'];

        $query = "SELECT * FROM `banner` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();
        return $banner;
    }


    //Store function
    public function Store()
    {
        $_picture = $this->upload();
    
        $_title = $_POST['title'];
    
        if (array_key_exists('is_active', $_POST)) 
        {
            $_is_active = $_POST['is_active'];
        } 
        else 
        {
            $_is_active = 0;
        }
    
        if (array_key_exists('is_draft', $_POST)) {
            $_is_draft = $_POST['is_draft'];
        } else {
            $_is_draft = 0;
        }
    
        $_created_at = date('Y-m-d h:i:s',time());
    
        $_link = $_POST['link'];
        $_promotional_message = $_POST['promotional_message'];

        $query = "INSERT INTO `banner` (`title`, `is_active`,`is_draft`,`link`,`promotional_message`,`picture`,`created_at`) 
                VALUES (:title, :is_active,:is_draft,:link, :promotional_message, :picture, :created_at);";
    
        $stmt = $this-> conn->prepare($query);
    
        $result = $stmt->execute(array(
            ':title' => $_title,
            ':is_active' => $_is_active,
            ':is_draft' => $_is_draft,
            ':link' => $_link,
            ':promotional_message' => $_promotional_message,
            ':picture' => $_picture,
            ':created_at' => $_created_at
        ));
 
        if ($result)
        {
            $_SESSION['message'] = "Banner is added successfully";
        }
        else
        {
            $_SESSION['message'] = "Banner is not added";
        }
    
        // this is for the location set to store.php to main home page index.php
        header("location:index.php");
        return $result;
    }
    public function Update()
    {
        $_picture = $this->upload();

            $_id = $_POST['id'];
            $_title = $_POST['title'];

        if (array_key_exists('is_active', $_POST)) 
        {
            $_is_active = $_POST['is_active'];
        }
        else 
        {
            $_is_active = 0;
        }

        if(array_key_exists('is_draft',$_POST))
        {
            $_is_draft = $_POST ['is_draft'];
        }
        else
        {
            $_is_draft = 0;
        }
        $_link = $_POST['link'];
        $_promotional_message = $_POST['promotional_message'];
    //echo $_title;
        $_modified_at = date('Y-m-d h:i:s',time());

        $query = "UPDATE `banner` SET `title` = :title, 
                        `is_active` = :is_active, 
                        `is_draft` = :is_draft,
                        `link` = :link, 
                        `promotional_message` = :promotional_message,
                        `picture` = :picture,
                        `modified_at` = :modified_at 
        WHERE `banner`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_draft', $_is_draft);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':promotional_message', $_promotional_message);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();
        if ($result){
             $_SESSION['message'] = "Banner is updated successfully";
        }
        else
        {
             $_SESSION['message'] = "Banner is not updated";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");
        }
        

//funtion for upload  which is used for store and update

    private function upload()
    {
           
            $approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";
            $_picture = null;

            if($_FILES['picture']['name'] != "")
            {   
                // Working with image
                $filename = "IMG_".time().' '.$_FILES['picture']['name'];
                $target = $_FILES['picture']['tmp_name'];
                $destination = $approot.'uploads/' .$filename;

                $isFileMoved = move_uploaded_file($target, $destination);
                if ($isFileMoved)
                {
                    $_picture = $filename;
                }
            }
                else
                {
                    if($_POST['old_picture'])
                    {
                        $_picture = $_POST['old_picture'];
                    }
                }
        return $_picture;
    }

}
?>