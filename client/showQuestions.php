<div class="container mt-5">
    <div class="row">

        <?php
        include("./config/db.php");

        $query = "SELECT * FROM questions";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $title = htmlspecialchars(ucfirst($row["title"]));
            $description = htmlspecialchars(substr($row["description"], 0, 120));
            ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">

                        <h5 class="card-title fw-bold">
                            <?= $title ?>
                        </h5>

                        <p class="card-text text-muted">
                            <?= $description ?>...
                        </p>

                        <a href="#" class="btn btn-outline-primary btn-sm">
                            View Question
                        </a>

                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>
