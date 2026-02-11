<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./public/logo.png" alt="logo"></a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>

        <?php if (isset($_SESSION["user"])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="./server/requestHandler.php?logout=true">Logout</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?askQuestion=true">Ask A Question</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?u-id=<?= $_SESSION['user']['id'] ?>">My Questions</a>
          </li>
        <?php } ?>

        <?php if (!isset($_SESSION["user"])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?latestQuestions=true">Latest Questions</a>
        </li>

      </ul>

      <form class="d-flex ms-auto" method="GET" action="">
        <input class="form-control me-2" type="search" name="search" placeholder="Search questions..."
          value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

        <button class="btn btn-outline-success" type="submit">
          Search
        </button>
      </form>

    </div>
  </div>
</nav>