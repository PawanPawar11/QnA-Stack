<div class="container mt-4">

    <?php
    $countStmt = $conn->prepare(
        "SELECT COUNT(*) AS total FROM answers WHERE question_id = ?"
    );
    $countStmt->bind_param("i", $q_id);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
    $countRow = $countResult->fetch_assoc();

    $totalAnswers = $countRow["total"];
    ?>

    <h4 class="mb-3 fw-bold">
        Answers
        <span class="badge bg-primary"><?= $totalAnswers ?>
        </span>
    </h4>

    <?php
    $stmt = $conn->prepare(
        "SELECT a.answer, u.username 
         FROM answers a
         JOIN users u ON a.user_id = u.id
         WHERE a.question_id = ?
         ORDER BY a.id DESC"
    );

    $stmt->bind_param("i", $q_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
            $answer = nl2br(htmlspecialchars($row["answer"]));
            $username = htmlspecialchars($row["username"]);
            ?>
            <div class="card shadow-sm mb-3">
                <div class="card-body">

                    <p class="mb-2"><?= $answer ?></p>

                    <small class="text-muted">
                        Answered by <?= $username ?>
                    </small>

                </div>
            </div>

            <?php
        endwhile;
    else:
        ?>

        <div class="alert alert-light border">
            No answers yet. Be the first to answer 🙂
        </div>

    <?php endif; ?>

</div>