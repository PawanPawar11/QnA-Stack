<select id="category" name="category" class="form-select" required>
    <option value="">Select Category</option>
    <?php
    include("./config/db.php");
    $query = "SELECT * FROM category";
    $stmt = $conn->prepare(query: $query);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = ucfirst(string: $row["name"]);
        echo "<option value='$id'>$name</option>";
    }
    ?>
</select>