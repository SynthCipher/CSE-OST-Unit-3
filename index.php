<?php
// Database Configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Create Database if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Create Table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    roll_no VARCHAR(20) NOT NULL,
    course VARCHAR(50) DEFAULT 'BCA',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($tableSql);

// Handle Form Submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_student'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $roll = $conn->real_escape_string($_POST['roll_no']);
    
    $insertSql = "INSERT INTO students (name, roll_no) VALUES ('$name', '$roll')";
    if ($conn->query($insertSql) === TRUE) {
        $message = "Student added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit 3: Open-Source Web Technologies | Polytechnic College Leh</title>
    <meta name="description" content="Master Unit 3: Open-Source Web Technologies. Learn Introduction to Web Dev, PHP, MySQLi, and Application Deployment.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-section {
            background: var(--surface-color);
            border: 1px solid var(--surface-border);
            border-radius: 24px;
            padding: 3rem;
            max-width: 600px;
            margin: 4rem auto;
            backdrop-filter: blur(12px);
        }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: var(--text-secondary); }
        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border-radius: 12px;
            border: 1px solid var(--surface-border);
            background: rgba(0,0,0,0.2);
            color: white;
            font-size: 1rem;
        }
        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
            background: var(--surface-color);
            border-radius: 16px;
            overflow: hidden;
        }
        .student-table th, .student-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--surface-border);
        }
        .student-table th { background: rgba(255,255,255,0.05); color: var(--accent); }
        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            background: rgba(34, 211, 238, 0.1);
            border: 1px solid var(--accent);
            color: var(--accent);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="progress-container">
        <div class="progress-bar" id="scrollBar"></div>
    </div>
    <div class="bg-blobs">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <nav>
        <div class="logo">Unit 3: Web Tech</div>
        <div class="nav-links">
            <a href="#curriculum">Curriculum</a>
            <a href="#students">Student List</a>
            <a href="#viva">Viva Questions</a>
        </div>
        <a href="#add-student" class="btn btn-primary">Enroll Now</a>
    </nav>

    <header class="hero">
        <div style="margin-bottom: 2rem; opacity: 0.8; font-weight: 500; letter-spacing: 2px; text-transform: uppercase;">
            Polytechnic College Leh <br>
            <span style="color: var(--accent); font-size: 0.9rem;">3rd Year | 2nd Semester</span>
        </div>
        <h1>Mastering <br><span style="background: var(--gradient-2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Open-Source</span> Web</h1>
        <p>A comprehensive guide to Unit 3: Building modern, dynamic web applications using PHP, MySQLi, and open-source technologies.</p>
        <div style="margin-top: 1rem; font-style: italic; color: var(--text-secondary);">
            Lecturer: <span style="color: var(--text-primary); font-weight: 600;">Jigmat Dorjey</span>
        </div>
        <div class="hero-btns" style="margin-top: 2rem;">
            <a href="#curriculum" class="btn btn-primary">Explore Curriculum</a>
        </div>
    </header>

    <main id="curriculum">
        <div style="text-align: center; margin-bottom: 3rem; max-width: 800px; margin-left: auto; margin-right: auto;">
            <h2 style="margin-bottom: 1rem;">Course Curriculum</h2>
            <p style="color: var(--text-secondary);">Welcome students! I am <strong>Jigmat Dorjey</strong>, your lecturer for the 2nd Semester of your 3rd Year. This platform is designed to provide you with all the resources needed to master open-source web technologies.</p>
        </div>
        <div class="grid">
            <div class="card" onclick="location.href='sections/intro.html'">
                <i data-lucide="layers"></i>
                <h3>3.1 Introduction</h3>
                <p>Explore the world of open-source technologies and the foundations of modern web development.</p>
            </div>
            <div class="card" onclick="location.href='sections/frontend.html'">
                <i data-lucide="code-2"></i>
                <h3>3.2 Dynamic Webpages</h3>
                <p>Building responsive and interactive pages using HTML5, CSS3, and modern JavaScript basics.</p>
            </div>
            <div class="card" onclick="location.href='sections/php-mysqli.html'">
                <i data-lucide="database"></i>
                <h3>3.3 PHP & MySQLi</h3>
                <p>Master server-side scripting with PHP and learn to interact with databases using MySQLi.</p>
            </div>
            <div class="card" onclick="location.href='sections/deployment.html'">
                <i data-lucide="rocket"></i>
                <h3>3.4 Deployment</h3>
                <p>Learn how to take your applications live. From version control to cloud hosting.</p>
            </div>
        </div>
    </main>

    <!-- Add Student Section -->
    <section id="add-student" class="form-section">
        <h2 style="text-align: center; margin-bottom: 2rem;">Student Registration</h2>
        
        <?php if ($message): ?>
            <div class="alert"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Student Name</label>
                <input type="text" name="name" placeholder="Enter Full Name" required>
            </div>
            <div class="form-group">
                <label>Roll Number</label>
                <input type="text" name="roll_no" placeholder="e.g. PL-2024-001" required>
            </div>
            <button type="submit" name="add_student" class="btn btn-primary" style="width: 100%;">Add Student to Database</button>
        </form>
    </section>

    <!-- Student List Section -->
    <section id="students" style="padding: 4rem 5%; max-width: 1000px; margin: 0 auto;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Registered Students</h2>
        <table class="student-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Enrollment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['roll_no'] . "</td>
                                <td>" . date('d M Y', strtotime($row['created_at'])) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' style='text-align:center;'>No students registered yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section id="viva" style="padding: 4rem 5%; max-width: 1400px; margin: 0 auto;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Viva Questions</h2>
        <div class="grid">
            <div class="card">1. What is web development?</div>
            <div class="card">2. What are open-source technologies?</div>
            <div class="card">3. Difference between HTML, CSS, & JS?</div>
            <div class="card">4. What is PHP?</div>
            <div class="card">5. What is server-side scripting?</div>
            <div class="card">6. What is MySQLi?</div>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 | Polytechnic College Leh | 3rd Year, 2nd Semester</p>
        <p style="margin-top: 0.5rem; font-size: 0.9rem; color: var(--text-secondary);">Course Material by <strong>Lecturer Jigmat Dorjey</strong></p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
<?php $conn->close(); ?>
