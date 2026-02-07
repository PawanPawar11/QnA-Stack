<div class="card shadow-sm">
    <div class="card-body">

        <h5 class="fw-bold mb-3">Categories</h5>

        <?php
        include("./config/db.php");

        $query = "SELECT * FROM category";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $name = htmlspecialchars(ucfirst($row["name"]));
            ?>
            <div class="mb-2">
                <a href="?category-id=<?= $id ?>" class="text-decoration-none fw-semibold">
                    <?= $name ?>
                </a>
            </div>
        <?php } ?>

    </div>
</div>