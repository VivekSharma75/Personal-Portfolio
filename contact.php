<?php
require_once 'includes/db.php';

$success = '';
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($conn->real_escape_string($_POST['name']    ?? ''));
    $email   = trim($conn->real_escape_string($_POST['email']   ?? ''));
    $message = trim($conn->real_escape_string($_POST['message'] ?? ''));
    $ip      = $conn->real_escape_string($_SERVER['REMOTE_ADDR'] ?? '');

    if ($name && $email && $message) {
        $sql = "INSERT INTO contact_messages (name, email, message, ip_address)
                VALUES ('$name', '$email', '$message', '$ip')";
        if ($conn->query($sql)) {
            $success = "Thank you, <strong>$name</strong>! Your message has been received. I'll get back to you soon.";
        } else {
            $error = "Something went wrong. Please try again later.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>
<?php include 'includes/header.php'; ?>

<section class="section">
    <div class="container contact-wrapper">
        <div class="section-title reveal">
            <span class="section-tag">Contact</span>
            <h2>Get In Touch</h2>
            <p>Feel free to reach out for collaborations, opportunities, or just to say hi!</p>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success reveal">
                <i class="fas fa-check-circle"></i> <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-error reveal">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="contact.php" method="post" style="margin-bottom: 40px;" class="reveal">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name"
                       value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="your.email@example.com"
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control" rows="6" placeholder="Write your message here..." required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">
                Send Message &nbsp;<i class="fas fa-paper-plane"></i>
            </button>
        </form>

        <div class="social-connect reveal">
            <a href="https://www.linkedin.com/in/vivek-sharma-266834158" target="_blank" rel="noopener" class="social-card linkedin">
                <i class="fab fa-linkedin"></i> LinkedIn
            </a>
            <a href="https://github.com/VivekSharma75" target="_blank" rel="noopener" class="social-card github">
                <i class="fab fa-github"></i> GitHub
            </a>
            <a href="mailto:vsharma.vivek.in@gmail.com" class="social-card email">
                <i class="fas fa-envelope"></i> Email Me
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
