<?php
// Check if the form was submitted to load new or old images
$selected_project = isset($_POST['project_type']) ? $_POST['project_type'] : 'new';

// Set the folder path based on the selected project type
$image_folder = ($selected_project === 'old') ? 'img/pes/old/' : 'img/pes/new/';

// Check if the directory exists
if (is_dir($image_folder)) {
    // Scan the folder for images
    $images = scandir($image_folder);
    // Remove "." and ".." from the directory listing
    $images = array_diff($images, array('.', '..'));
    
    // Check if images are found
    if (empty($images)) {
        $images = []; // If no images found, set to an empty array
    }
} else {
    $images = []; // Set to empty array if directory doesn't exist
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Enhancing Project</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom-style.css">
</head>
<body>
    <header class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1>Photo Enhancing Project</h1>
            <p>Select to view New or Old images:</p>

            <!-- Form to toggle between New and Old images -->
            <div class="button-container">
                <a href="homepage.php" class="btn btn-secondary">Back to Homepage</a>
                <form method="POST" action="" class="mt-3">
                    <button type="submit" name="project_type" value="new" class="btn btn-primary mx-2">New</button>
                    <button type="submit" name="project_type" value="old" class="btn btn-secondary mx-2">Old</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container my-5">
            <h2 class="text-center"><?php echo ucfirst($selected_project); ?> Photos</h2>

            <!-- Display images -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Check if the images array has any images
                if (!empty($images)) {
                    foreach ($images as $image) {
                        // Outputting the images correctly in <img> tag
                        $image_path = $image_folder . $image;
                        echo "<div class='col'>";
                        echo "<div class='card'>";
                        echo "<img src='$image_path' alt='$image' class='card-img-top'>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No images available in this category.</p>";
                }
                ?>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> My Portfolio. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS (Optional for functionality like dropdowns, modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
