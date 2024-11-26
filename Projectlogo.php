<?php
// Define a mapping of project names to their respective logo folders or images
$project_folders = [
    'the_vintage_lab'           => 'img/logo/The Vintage Lab.jpg',  // Direct image for "The Vintage Lab"
    'paraluman_leasing_corp'    => 'img/logo/Paraluman Leasing Corp.jpg',
    'nosuya_habit'              => 'img/logo/Nosuya Habit.jpg',
    'mk'                        => 'img/logo/MK.png',
    'kenzo_athena'              => 'img/logo/KABG.jpg',
    'eva_beauty'                => 'img/logo/Eva Bueaty Products.jpg',
    'blessed_AD'                => 'img/logo/Blessed A.D Glass And Aluminum Services.jpg'
];

// Get the selected project, default to 'the_vintage_lab' if not set
$selected_project = isset($_POST['project_type']) ? $_POST['project_type'] : 'the_vintage_lab';

// Set the folder path or image path based on the selected project
$logo_folder = isset($project_folders[$selected_project]) ? $project_folders[$selected_project] : $project_folders['the_vintage_lab'];

// Check if the path is a directory (for projects with a folder)
if (is_dir($logo_folder)) {
    // Scan the folder for images
    $logos = scandir($logo_folder);
    // Remove "." and ".." from the directory listing
    $logos = array_diff($logos, array('.', '..'));

    // If no logos are found, set an empty array
    if (empty($logos)) {
        $logos = [];
    }
} else {
    // If not a directory, assume it's a direct image file (like "The Vintage Lab")
    $logos = [$logo_folder];  // This will contain the fallback image
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo Design Project</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom-style.css">
</head>
<body>
    <header class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1>Logo Design Project</h1>
            <p>Select to view logos for a specific project:</p>

            <!-- Form to toggle between projects -->
            <div class="button-container">
                <a href="homepage.php" class="btn btn-secondary">Back to Homepage</a>
                <form method="POST" action="" class="mt-3">
                    <button type="submit" name="project_type" value="the_vintage_lab" class="btn btn-primary mx-2">The Vintage Lab</button>
                    <button type="submit" name="project_type" value="paraluman_leasing_corp" class="btn btn-primary mx-2">Paraluman Leasing Corp</button>
                    <button type="submit" name="project_type" value="nosuya_habit" class="btn btn-primary mx-2">Nosuya Habit</button>
                    <button type="submit" name="project_type" value="mk" class="btn btn-primary mx-2">MK</button>
                    <button type="submit" name="project_type" value="kenzo_athena" class="btn btn-primary mx-2">Kenzo & Athena's Baked Goodies</button>
                    <button type="submit" name="project_type" value="eva_beauty" class="btn btn-primary mx-2">Eva Beauty Products</button>
                    <button type="submit" name="project_type" value="blessed_AD" class="btn btn-primary mx-2">Blessed A.D Glass And Aluminum Services</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container my-5">
            <h2 class="text-center"><?php echo ucfirst(str_replace('_', ' ', $selected_project)); ?> Logos</h2>

            <!-- Display logos for the selected project -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Check if the logos array has any logos
                if (!empty($logos)) {
                    foreach ($logos as $logo) {
                        // Construct the correct image path
                        if (is_dir($logo_folder)) {
                            $logo_path = $logo_folder . '/' . $logo; // For folder-based logos
                        } else {
                            $logo_path = $logo_folder; // For direct image
                        }

                        echo "<div class='col'>";
                        echo "<div class='card'>";
                        echo "<img src='$logo_path' alt='$logo' class='card-img-top'>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No logos available in this category.</p>";
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
