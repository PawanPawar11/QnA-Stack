<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h3 class="text-center mb-4">Login</h3>

            <form method="POST" action="./server/requestHandler.php">
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter password">
                </div>

                <button type="submit" name="login" class="btn btn-success w-100">
                    Login
                </button>
            </form>

        </div>
    </div>
</div>