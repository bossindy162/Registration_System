<?php 
    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['errorr'] = 'กรุณาเข้าสู่ระบบ';
        header('location: signin.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <?php 
    
        if (isset($_SESSION['user_login'])) {
            $user_id = $_SESSION['user_login'];
            $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id ");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
    ?>
        <h3 class="mt-4">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname']  ?></h3>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    
    </div>
</body>
</html>