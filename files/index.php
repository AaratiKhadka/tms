<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>'; " aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage file</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="create_file.php" role="button">Add file</a>
        <div class="row mt-3">
            <div class="col-lg-12">
                <?php

                // Fetch all tasks from the database
                $query = "SELECT * FROM files ORDER BY created_at DESC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Title</th>";
                    echo "<th>Description</th>";
                    echo "<th>Status</th>";
                    echo "<th>Created At</th>";
                    echo "<th>Updated At</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['file_link']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>" . $row['updated_at'] . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-warning btn-sm' href='edit_file.php?id=" . $row['id'] . "'>Edit</a> ";
                        echo "<a class='btn btn-danger btn-sm' href='delete_file.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<div class='alert alert-warning'>No files found.</div>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</section>

<?php require('../includes/footer.php'); ?>
