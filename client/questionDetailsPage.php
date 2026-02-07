<div class="container mt-5">

    <?php
    include("./config/db.php");

    $stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
    $stmt->bind_param("i", $q_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row):

        $title = htmlspecialchars(ucfirst($row["title"]));
        $description = nl2br(htmlspecialchars($row["description"]));
        $category_id = (int) $row["category_id"];
        ?>

        <div class="row">

            <!-- LEFT SIDE : QUESTION CONTENT -->
            <div class="col-md-9">

                <!-- Question Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">

                        <h3 class="fw-bold mb-3"><?= $title ?></h3>

                        <p class="text-muted">
                            <?= $description ?>
                        </p>

                    </div>
                </div>

                <?php include("./client/showAnswers.php"); ?>

                <!-- Answer Form -->
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="mb-3">Your Answer</h5>

                        <form method="POST" action="./server/requestHandler.php">
                            <input type="hidden" name="q_id" value="<?= (int) $q_id ?>">

                            <textarea name="answer" class="form-control mb-3" rows="4"
                                placeholder="Enter your answer here..." <?= !isset($_SESSION["user"]) ? "disabled" : "" ?>
                                required></textarea>

                            <button type="submit" name="answerQuestion" class="btn btn-primary w-100"
                                <?= !isset($_SESSION["user"]) ? "disabled" : "" ?>>
                                Submit Answer
                            </button>
                        </form>

                    </div>
                </div>

            </div>

            <!-- RIGHT SIDE : RELATED QUESTIONS -->
            <div class="col-md-3">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="fw-bold mb-3">Related Questions</h5>

                        <?php
                        $relatedStmt = $conn->prepare(
                            "SELECT id, title 
                         FROM questions 
                         WHERE category_id = ? AND id != ?
                         ORDER BY id DESC
                         LIMIT 6"
                        );

                        $relatedStmt->bind_param("ii", $category_id, $q_id);
                        $relatedStmt->execute();

                        $relatedResult = $relatedStmt->get_result();

                        if ($relatedResult->num_rows > 0):
                            while ($rel = $relatedResult->fetch_assoc()):

                                $rel_id = $rel["id"];
                                $rel_title = htmlspecialchars(ucfirst($rel["title"]));
                                ?>

                                <div class="mb-2">
                                    <a href="?q-id=<?= $rel_id ?>" class="text-decoration-none small fw-semibold d-block">
                                        <?= $rel_title ?>
                                    </a>
                                </div>

                                <?php
                            endwhile;
                        else:
                            ?>

                            <small class="text-muted">
                                No related questions found.
                            </small>

                        <?php endif; ?>

                    </div>
                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="alert alert-danger">
            Question not found.
        </div>

    <?php endif; ?>

</div>