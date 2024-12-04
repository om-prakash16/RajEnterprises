<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './includes/header.php'; ?>
</head>
<body>
    <?php include './includes/navbar.php'; ?>
    <div class="container mt-5">
        <h2>Contact Us</h2>
        <form action="contact_form.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <?php include './includes/footer.php'; ?>
</body>
</html>
