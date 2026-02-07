<div class="container mt-5">
    <div class="row">

        <!-- LEFT SIDE : QUESTIONS (80%) -->
        <div class="col-md-9">
            <div class="row">

                <?php
                include("./config/db.php");

                $query = "SELECT * FROM questions";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {

                    $q_id = $row["id"];
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

                                <a href="?q-id=<?= $q_id ?>" class="btn btn-outline-primary btn-sm">
                                    View Question
                                </a>

                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

        <!-- RIGHT SIDE : CATEGORY (20%) -->
        <div class="col-md-3">
            <?php include("./client/showCategoryList.php"); ?>
        </div>

    </div>
</div>