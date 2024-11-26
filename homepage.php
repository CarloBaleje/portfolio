<?php
// Project data (You can add/edit projects here)
$projects = [
    [
        "title" => "Photo Enhancing",
        "image" => "img/pe.jpg",
        "link" => "projectpe.php"
    ],
    [
        "title" => "Logo Design",
        "image" => "img/logo.jpg",
        "link" => "Projectlogo.php"
    ],
    [
        "title" => "T-shirt Designs",
        "image" => "img/td.jpg",
        "link" => "projectshirt.php"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS (optional) -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1>Welcome to My Portfolio</h1>
            <p class="lead">Designing with purpose, passion, and precision.</p>
            <!-- Add your picture here -->
            <img src="img/mypic.jpg" alt="My Photo" class="img-fluid rounded-circle my-3" style="width: 300px; height: auto;">
            <h2>Carlo J. Baleje</h2>
        </div>
    </header>

    <main>
        <div class="container my-5">
            <!-- Skills Section -->
            <section class="mb-5">
                <h2 class="text-center mb-4">Skills</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item mx-3"><span class="badge bg-primary">Photo Editing</span></li>
                            <li class="list-inline-item mx-3"><span class="badge bg-success">HTML</span></li>
                            <li class="list-inline-item mx-3"><span class="badge bg-danger">CSS</span></li>
                            <li class="list-inline-item mx-3"><span class="badge bg-warning text-dark">PHP</span></li>
                            <li class="list-inline-item mx-3"><span class="badge bg-info text-dark">Video Editing</span></li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Projects Section -->
            <h2 class="text-center mb-5">My Projects</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($projects as $project): ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $project['title']; ?></h3>
                                <a href="<?php echo $project['link']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
