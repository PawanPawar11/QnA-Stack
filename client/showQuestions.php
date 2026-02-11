<div class="container mt-5">
    <div class="row">

        <!-- LEFT SIDE : QUESTIONS -->
        <div class="col-md-9">

            <?php if (isset($_GET["search"]) && !empty($_GET["search"])): ?>
                <h5 class="mb-4 text-primary">
                    🔎 Showing results for:
                    <span class="fw-bold"><?= htmlspecialchars($_GET["search"]) ?></span>
                </h5>
            <?php endif; ?>

            <div class="row">

                <?php
                include("./config/db.php");

                if (isset($_GET["search"]) && !empty(trim($_GET["search"]))) {

                    $search = "%" . trim($_GET["search"]) . "%";

                    $stmt = $conn->prepare(
                        "SELECT 
                                q.id,
                                q.title,
                                q.description,
                                c.name AS category_name,
                                u.username,
                                COUNT(a.id) AS answer_count

                                FROM questions q
                                JOIN category c ON q.category_id = c.id
                                JOIN users u ON q.user_id = u.id
                                LEFT JOIN answers a ON q.id = a.question_id

                                WHERE q.title LIKE ? OR q.description LIKE ?
                                GROUP BY q.id
                                ORDER BY q.id DESC"
                    );

                    $stmt->bind_param("ss", $search, $search);

                } else if (isset($_GET["u-id"]) && isset($_SESSION["user"])) {

                    $user_id = (int) $_SESSION["user"]["id"];

                    $stmt = $conn->prepare(
                        "SELECT 
                                q.id,
                                q.title,
                                q.description,
                                c.name AS category_name,
                                u.username,
                                COUNT(a.id) AS answer_count

                                FROM questions q
                                JOIN category c ON q.category_id = c.id
                                JOIN users u ON q.user_id = u.id
                                LEFT JOIN answers a ON q.id = a.question_id

                                WHERE q.user_id = ?
                                GROUP BY q.id
                                ORDER BY q.id DESC"
                    );

                    $stmt->bind_param("i", $user_id);

                } else if (isset($_GET["latestQuestions"])) {

                    $stmt = $conn->prepare(
                        "SELECT 
                                q.id,
                                q.title,
                                q.description,
                                c.name AS category_name,
                                u.username,
                                COUNT(a.id) AS answer_count

                                FROM questions q
                                JOIN category c ON q.category_id = c.id
                                JOIN users u ON q.user_id = u.id
                                LEFT JOIN answers a ON q.id = a.question_id

                                GROUP BY q.id
                                ORDER BY q.id DESC"
                    );

                } else if (isset($_GET["c-id"])) {

                    $category_id = (int) $_GET["c-id"];

                    $stmt = $conn->prepare(
                        "SELECT 
                                q.id,
                                q.title,
                                q.description,
                                c.name AS category_name,
                                u.username,
                                COUNT(a.id) AS answer_count

                                FROM questions q
                                JOIN category c ON q.category_id = c.id
                                JOIN users u ON q.user_id = u.id
                                LEFT JOIN answers a ON q.id = a.question_id

                                WHERE q.category_id = ?
                                GROUP BY q.id
                                ORDER BY q.id DESC"
                    );

                    $stmt->bind_param("i", $category_id);

                } else {

                    $stmt = $conn->prepare(
                        "SELECT 
                                q.id,
                                q.title,
                                q.description,
                                c.name AS category_name,
                                u.username,
                                COUNT(a.id) AS answer_count

                                FROM questions q
                                JOIN category c ON q.category_id = c.id
                                JOIN users u ON q.user_id = u.id
                                LEFT JOIN answers a ON q.id = a.question_id

                                GROUP BY q.id
                                ORDER BY q.id DESC"
                    );
                }

                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {

                    $q_id = $row["id"];
                    $title = htmlspecialchars(ucfirst($row["title"]));
                    $description = htmlspecialchars(substr($row["description"], 0, 120));
                    $category = htmlspecialchars(string: ucfirst($row["category_name"]));
                    $username = htmlspecialchars($row["username"]);
                    $answer_count = (int) $row["answer_count"];
                    ?>

                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">

                                <h5 class="card-title fw-bold"><?= $title ?></h5>

                                <p class="card-text text-muted mb-2">
                                    <?= $description ?>...
                                </p>

                                <div class="d-flex justify-content-between align-items-center mb-2">

                                    <small class="text-secondary">
                                        <?= $category ?> • by <?= $username ?>
                                    </small>

                                    <span class="badge bg-primary">
                                        <?= $answer_count ?> Answers
                                    </span>

                                </div>

                                <a href="?q-id=<?= $q_id ?>" class="btn btn-outline-primary btn-sm">
                                    View Question
                                </a>

                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

        <!-- RIGHT SIDE : CATEGORY SIDEBAR -->
        <div class="col-md-3">
            <?php include("./client/showCategoryList.php"); ?>
        </div>

    </div>
</div>