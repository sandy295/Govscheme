<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Schemes</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">
            Available Schemes
        </h1>
        <?php
        include 'connnect.php';
        $sql = "SELECT * FROM users WHERE user_id = 'your_user_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "<div class='grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3'>";
            echo "<div class='bg-white p-6 rounded-md shadow-md'>";
            echo "<h2 class='text-lg font-semibold mb-2'>Scheme Name</h2>";
            echo "<p class='text-gray-600 mb-4'>Scheme Description</p>";
            echo "<a href='#' class='text-blue-500 hover:underline'>More Details</a>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "No user found.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>