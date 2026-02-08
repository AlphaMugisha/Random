<?php
// 1. SETUP
// require 'includes/db_connect.php'; // COMMENTED OUT: So you can view UI without DB
// require 'includes/header.php';

// 2. FORM HANDLING (Simulation Only)
$msg = "";
$msgClass = "";
$subjectVal = "";

// Check URL for book parameter (Simulation)
if (isset($_GET['book'])) {
    $subjectVal = htmlspecialchars($_GET['book']);
}

if (isset($_POST['send_message'])) {
    $name = htmlspecialchars($_POST['name']);
    // Since we have no DB, we just show the success message directly
    $msg = "Message sent! We'll get back to you soon, $name.";
    $msgClass = "active";
}
?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


<main>
    
    <div class="split-container">
        
        <div class="info-panel" data-aos="fade-right">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>

            <div class="panel-content">
                <h1 class="big-title">Let's Create<br>Something.</h1>
                <p class="panel-desc">
                    Whether you are a student, an artist, or a patron of the arts, Inkingi is your creative home. Reach out to us.
                </p>

                <ul class="contact-list">
                    <li class="contact-item">
                        <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <span style="display:block; font-size:0.8rem; opacity:0.6; text-transform:uppercase;">Visit the Studio</span>
                            <a href="#" class="contact-link">Kigali, Kacyiru, 24 KG 550 St</a>
                        </div>
                    </li>
                    <li class="contact-item">
                        <div class="icon-box"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <span style="display:block; font-size:0.8rem; opacity:0.6; text-transform:uppercase;">Talk to Us</span>
                            <a href="tel:+250787177805" class="contact-link">+250 787 177 805</a>
                        </div>
                    </li>
                    <li class="contact-item">
                        <div class="icon-box"><i class="fas fa-envelope-open-text"></i></div>
                        <div>
                            <span style="display:block; font-size:0.8rem; opacity:0.6; text-transform:uppercase;">Email Inquiries</span>
                            <a href="mailto:yamwamba01@gmail.com" class="contact-link">yamwamba01@gmail.com</a>
                        </div>
                    </li>
                </ul>

                <div style="margin-top: 40px; display:flex; gap:20px;">
                    <a href="#" style="color:white; font-size:1.5rem; transition:0.3s;" onmouseover="this.style.color='#FDB913'" onmouseout="this.style.color='white'"><i class="fab fa-instagram"></i></a>
                    <a href="#" style="color:white; font-size:1.5rem; transition:0.3s;" onmouseover="this.style.color='#FDB913'" onmouseout="this.style.color='white'"><i class="fab fa-twitter"></i></a>
                    <a href="#" style="color:white; font-size:1.5rem; transition:0.3s;" onmouseover="this.style.color='#FDB913'" onmouseout="this.style.color='white'"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>

        <div class="form-panel" data-aos="fade-left">
            <div class="watermark">Art</div>
            
            <div class="form-header">
                <h2>Drop a Line</h2>
                <p>Fill out the form below. We usually reply within 24 hours.</p>
            </div>

            <div class="msg-box <?= $msgClass ?>"><?= $msg ?></div>

            <form method="POST">
                <div class="input-group">
                    <input type="text" name="name" class="clean-input" required>
                    <span class="input-highlight"></span>
                    <label class="clean-label">Your Name</label>
                </div>

                <div class="input-group">
                    <input type="email" name="email" class="clean-input" required>
                    <span class="input-highlight"></span>
                    <label class="clean-label">Email Address</label>
                </div>

                <div class="input-group">
                    <input type="text" name="subject" class="clean-input" value="<?= $subjectVal ?>" required>
                    <span class="input-highlight"></span>
                    <label class="clean-label">Subject / Program Interest</label>
                </div>

                <div class="input-group">
                    <textarea name="message" class="clean-input" rows="1" style="resize:none; height:auto; min-height:40px;" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'" required></textarea>
                    <span class="input-highlight"></span>
                    <label class="clean-label">Your Message</label>
                </div>

                <button type="submit" name="send_message" class="btn-submit">
                    Send Message
                </button>
            </form>

        </div>

    </div>

    <div class="map-container">
        <div class="paper-edge"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.532726322982!2d30.0881!3d-1.9351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwNTYnMDYuNCJTIDMwwrAwNScxNy4yIkU!5e0!3m2!1sen!2srw!4v1635000000000!5m2!1sen!2srw" class="map-frame" allowfullscreen="" loading="lazy"></iframe>
    </div>

</main>

<?php include 'includes/footer.php'; ?>
<script src="script.js"></script>