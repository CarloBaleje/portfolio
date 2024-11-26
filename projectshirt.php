<?php
// Define a mapping of project names to their respective logo folders or images
$project_folders = [
    'nosuya shirt'            => 'img/tshirt/FRONT BACK white s.jpg',
    'Make Some Money'          => 'img/tshirt/FRONT BACK BLACK MSM.jpg',
    'Ambel'                    => 'img/tshirt/Ambel.jpg',
    'MYRAS KEYBOARD SQUAD'     => 'img/tshirt/MYRAS KEYBOARD SQUAD.jpg',
    'Blessed AD'               => 'img/tshirt/Blessed Ad Glass and Aluminum Services.jpg',
];

// Get the selected project, default to 'nosuya shirt' if not set
$selected_project = isset($_POST['project_type']) ? $_POST['project_type'] : 'nosuya shirt';

// Set the folder path or image path based on the selected project
$logo_folder = isset($project_folders[$selected_project]) ? $project_folders[$selected_project] : $project_folders['nosuya shirt'];

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
    // If not a directory, assume it's a direct image file (like "Nosuya Shirt")
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
            <div class="button-container mb-3">
                <a href="homepage.php" class="btn btn-secondary">Back to Homepage</a>
                <form method="POST" action="" class="mt-3">
                    <button type="submit" name="project_type" value="nosuya shirt" class="btn btn-primary mx-2">Nosuya Shirt</button>
                    <button type="submit" name="project_type" value="Make Some Money" class="btn btn-primary mx-2">Make Some Money</button>
                    <button type="submit" name="project_type" value="Ambel" class="btn btn-primary mx-2">Ambel</button>
                    <button type="submit" name="project_type" value="MYRAS KEYBOARD SQUAD" class="btn btn-primary mx-2">MYRA'S KEYBOARD SQUAD</button>
                    <button type="submit" name="project_type" value="Blessed AD" class="btn btn-primary mx-2">Blessed Ad Glass and Aluminum Services</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container my-5">
            <h2 class="text-center">Logos for: <?php echo ucfirst(str_replace('_', ' ', $selected_project)); ?></h2>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
