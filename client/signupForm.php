<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h3 class="text-center mb-4">Signup</h3>

            <form method="POST" action="./server/requestHandler.php">
                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter username">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"></textarea>
                </div>

                <button type="submit" name="signup" class="btn btn-primary w-100">
                    Sign Up
                </button>
            </form>

        </div>
    </div>
</div>
