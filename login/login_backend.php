<?php
error_reporting(0); 
ini_set('display_errors', 0);


require_once '../assets/script.php';

session_start();
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(404);
    die();
}else{
    
    
if(isset($_POST['email']) && isset($_POST['password'])) {
    if($connection) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT id, `role`, password_hash FROM users WHERE email=?";
        $query_result = mysqli_prepare($connection, $query);

        if($query_result) {
            mysqli_stmt_bind_param($query_result, "s", $email);
            mysqli_stmt_execute($query_result);

            $result = mysqli_stmt_get_result($query_result);
            if($result) {
                $row = mysqli_fetch_assoc($result);

                if($row) {
                    if (password_verify($password, $row['password_hash'])) {
                        $_SESSION['uid'] = $row['id'];
                        $response['status'] = 'success';
                        $response['role'] = $row['role'];
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = 'Invalid email or password!';
                    }
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Invalid email or password!';
                }

                mysqli_stmt_close($query_result);
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error fetching result';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error preparing statement';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database connection error';
    }

    
} else {
    $response['status'] = 'error';
    $response['message'] = 'Both fields are required';
}

// Return the response
echo json_encode($response);
    
}

?>
