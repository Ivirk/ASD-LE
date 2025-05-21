<?php
session_start();
include 'shjpdb.php';
if (!isset($_SESSION['username'])) {
    header("Location: admin_loginpage.php");
    exit();
}

// Handle search
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM ConfirmationRecords WHERE full_name LIKE '%$search%' ORDER BY date_confirmation DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sacred Heart of Jesus Parish - Confirmation Records</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .sidebar {
            width: 240px;
            background-color: #d4af37;
            background-image: linear-gradient(to bottom, #d4af37, #b8860b);
            padding: 20px;
            text-align: center;
            height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            position: fixed;
        }

        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid white;
            background-color: white;
        }

        .sidebar .username {
            margin: 5px 0;
            font-size: 18px;
            color: white;
            font-weight: bold;
        }

        .sidebar .email {
            font-size: 14px;
            color: #fff8dc;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            margin: 8px 0;
            padding: 10px;
            text-decoration: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 4px;
            transition: all 0.3s;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Active menu item */
        .sidebar a.active {
            background-color: white;
            color: #8b6914;
            font-weight: bold;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: calc(100% - 40px);
            background-color: rgba(0,0,0,0.1) !important;
        }
        
        .logout:hover {
            background-color: rgba(0,0,0,0.2) !important;
        }

        .main {
            flex: 1;
            padding: 30px;
            margin-left: 280px;
            background-color: white;
        }

        .header {
            padding: 15px 0;
            font-weight: bold;
            font-size: 22px;
            color: #8b6914;
            border-bottom: 1px solid #d4af37;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .header {
            font-size: 30px;
            margin-right: 10px;
            color: #d4af37;
        }
        .logo {
           width: 100px;
        }

        h1 {
            color: #8b6914;
            font-size: 24px;
            margin-top: 30px;
        }

        p {
            color: #555;
            line-height: 1.6;
        }
        
        .top-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .search-bar {
            display: flex;
            gap: 10px;
            min-width: 300px;
            margin: 0;
        }
        
        .search-bar input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #d4af37;
            border-radius: 4px;
            font-family: 'Times New Roman', serif;
        }
        
        .submit-btn, .add-btn {
            background-color: #d4af37;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }
        
        .submit-btn:hover, .add-btn:hover {
            background-color: #b8860b;
        }
        
        .add-btn {
            margin-left: auto;
        }

        .record {
            background-color: #fffdf7;
            margin-bottom: 18px;
            padding: 22px;
            border-left: 5px solid #d4af37;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border-radius: 6px;
            transition: transform 0.3s;
        }
        
        .record:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.14);
        }
        
        .record h4 {
            margin: 0 0 12px 0;
            color: #8b6914;
            font-size: 20px;
            padding-bottom: 6px;
            border-bottom: 1px dotted #e6d7ab;
        }
        
        .record p {
            margin: 7px 0;
            color: #555;
            line-height: 1.5;
            font-size: 16px;
        }
        
        .records-section {
            margin-top: 20px;
        }
        
        .records-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid #e6d7ab;
            padding-bottom: 8px;
        }
        
        .records-title {
            color: #8b6914;
            margin: 0;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="default-avatar.png" alt="Profile">
        <div class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
        <div class="email">admin@gmail.com</div>

        <a href="admin_dashboard.php">Dashboard</a>
        <a href="requests_page.php">Requests</a>
        <a href="records.php" class="active">Records</a>
        <a href="logout.php" class="logout">Log out</a>
    </div>

    <!-- Main content -->
    <div class="main">
        <div class="header">
            <img src="images/logo2.png" alt="Logo" class="logo"> Sacred Heart of Jesus Parish - Confirmation Records
        </div>

        <div class="top-container">
            <form method="GET" class="search-bar">
                <input type="text" name="search" placeholder="Search by name..." value="<?= htmlspecialchars($search) ?>">
                <input type="submit" value="Search" class="submit-btn">
            </form>
            
            <a href="addconfirmation_record.php" class="add-btn">Add New Record</a>
        </div>

        <div class="records-section">
            <div class="records-header">
                <h3 class="records-title">Confirmation Records</h3>
            </div>

            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='record'>
                            <h4>" . htmlspecialchars($row['full_name']) . " – " . htmlspecialchars($row['date_confirmation']) . "</h4>
                            <p>Place: " . htmlspecialchars($row['place_confirmation']) . "</p>
                            <p>Father: " . htmlspecialchars($row['father_name']) . " | Mother: " . htmlspecialchars($row['mother_name']) . "</p>
                            <p>Sponsors: " . htmlspecialchars($row['sponsors']) . "</p>
                            <p>Priest: " . htmlspecialchars($row['priest_name']) . "</p>
                          </div>";
                }
            } else {
                echo "<p>No confirmation records found.</p>";
            }
            ?>
        </div>
    </div>

</body>
</html>