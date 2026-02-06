<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3 class="text-center mb-4">Ask a Question</h3>

            <form method="POST" action="./server/requestHandler.php">

                <!-- Question Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Question Title</label>
                    <input type="text" id="title" name="title" class="form-control"
                        placeholder="Enter your question title" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="5"
                        placeholder="Explain your question in detail..." required></textarea>
                </div>

                <!-- Category Selector -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <?php include("categoryOfQuestion.php") ?>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="askQuestion" class="btn btn-primary w-100">
                    Submit Question
                </button>

            </form>

        </div>
    </div>
</div>