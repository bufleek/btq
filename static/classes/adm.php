<?php


class db{
    private $servername;
    private $serverusername;
    private $serverpassword;
    private $dbname;

    protected function connect(){

        $this->servername = "localhost";
        $this->serverusername = "root";
        $this->serverpassword = "";
        $this->dbname = "btq";

        $conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, $this->dbname);
        return $conn;
    }
}

class User extends db
{
    private $db;

    // Register new users
    public function register($usernm, $passwd, $passwd2)
    {
        $conn = new db;
        $sql = "SELECT * FROM adms WHERE $usernm='usernm'";
        $result = $conn->connect()->query($sql);
        $resultCheck = mysqli_num_rows($result);
        
        if ($resultCheck > 1) {
            //header("location: ../add-user.php?error=usertaken");
            exit("usertaken");
        } else {
            if ($passwd !== $passwd2) {
                //header("location: ../add-user.php?error=password_mismatch");
                exit("password mismatch");
            } else {
                $hashedpasswd = password_hash($passwd, PASSWORD_DEFAULT);
                $sql = "INSERT INTO adms (usernm, passwd) VALUES ('$usernm', '$hashedpasswd');";
                if ($conn->connect()->query($sql)) {
                    //header("location: ../add-user.php?signup=success");
                    exit("successful");
                } else {
                    exit("db");
                } 
            }
        }
        
    }

    // Log in registered users with either their username or email and their password
    public function login($user_name, $user_email, $user_password)
    {
        try {
            // Define query to insert values into the users table
            $sql = "SELECT * FROM users WHERE user_name=:user_name OR user_email=:user_email LIMIT 1";

            // Prepare the statement
            $query = $this->db->prepare($sql);

            // Bind parameters
            $query->bindParam(":user_name", $user_name);
            $query->bindParam(":user_email", $user_email);

            // Execute the query
            $query->execute();

            // Return row as an array indexed by both column name
            $returned_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check if row is actually returned
            if ($query->rowCount() > 0) {
                // Verify hashed password against entered password
                if (password_verify($user_password, $returned_row['user_password'])) {
                    // Define session on successful login
                    $_SESSION['user_session'] = $returned_row['user_id'];
                    return true;
                } else {
                    // Define failure
                    return false;
                }
            }
        } catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }

    // Check if the user is already logged in
    public function is_logged_in() {
        // Check if user session has been set
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    // Redirect user
    public function redirect($url) {
        header("Location: $url");
    }

    // Log out user
    public function log_out() {
        // Destroy and unset active session
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}