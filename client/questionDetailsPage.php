<div class="container mt-5">

    <?php
    include("./config/db.php");

    $stmt = $conn->prepare("SELECT title, description FROM questions WHERE id = ?");
    $stmt->bind_param("i", $q_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row):

        $title = htmlspecialchars(ucfirst($row["title"]));
        $description = nl2br(htmlspecialchars($row["description"]));
        ?>

        <!-- Question Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <h3 class="fw-bold mb-3"><?= $title ?></h3>

                <p class="text-muted">
                    <?= $description ?>
                </p>

            </div>
        </div>

        <!-- Answer Form -->
        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="mb-3">Your Answer</h5>

                <form method="POST" action="./server/requestHandler.php">
                    <input type="hidden" name="q_id" value="<?= (int) $q_id ?>">

                    <textarea name="answer" class="form-control mb-3" rows="4" placeholder="Enter your answer here..."
                        required></textarea>

                    <button type="submit" name="answerQuestion" class="btn btn-primary">
                        Submit Answer
                    </button>
                </form>

            </div>
        </div>

    <?php else: ?>

        <div class="alert alert-danger">
            Question not found.
        </div>

    <?php endif; ?>

</div>