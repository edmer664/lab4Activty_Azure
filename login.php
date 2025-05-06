<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f0d6e8;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #8e44ad;
            text-align: center;
            margin-bottom: 30px;
        }
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        label {
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #9b59b6;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #8e44ad;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .error {
            background-color: #ffdddd;
            color: #d63031;
        }
        .success {
            background-color: #ddffdd;
            color: #27ae60;
        }
        .student-info {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border-left: 5px solid #9b59b6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Login Portal</h1>
        
        <?php
        // Simple login simulation
        $valid_student_id = "ST2023001";
        $valid_password = "student123";
        $login_error = "";
        $login_success = false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $student_id = htmlspecialchars($_POST['student_id'] ?? '');
            $password = htmlspecialchars($_POST['password'] ?? '');
            
            if (empty($student_id) || empty($password)) {
                $login_error = "Please enter both Student ID and Password!";
            } elseif ($student_id === $valid_student_id && $password === $valid_password) {
                $login_success = true;
            } else {
                $login_error = "Invalid Student ID or Password!";
            }
        }
        
        // Display messages
        if (!empty($login_error)) {
            echo '<div class="message error">' . $login_error . '</div>';
        }
        ?>
        
        <?php if (!$login_success): ?>
            <form class="login-form" method="POST" action="">
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <input type="submit" value="Login">
            </form>
        <?php else: ?>
            <div class="message success">Login successful! Welcome, student.</div>
            
            <div class="student-info">
                <h2>Student Information</h2>
                <?php
                // Simulated student data
                $student_name = "Alex Johnson";
                $student_course = "Computer Science";
                $student_year = "2nd Year";
                $current_time = date("h:i A");
                $last_login = date("F j, Y");
                
                echo "<p><strong>Name:</strong> $student_name</p>";
                echo "<p><strong>Course:</strong> $student_course</p>";
                echo "<p><strong>Year:</strong> $student_year</p>";
                echo "<p><strong>Current Time:</strong> $current_time</p>";
                echo "<p><strong>Last Login:</strong> $last_login</p>";
                ?>
                
                <p><a href="login.php">Logout</a></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>