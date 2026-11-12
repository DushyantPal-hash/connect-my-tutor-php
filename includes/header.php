<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>
<header id="header">
  <div class="container nav">
    <a href="index.php" class="logo">
      <img src="images/logo/logo.webp" alt="Connect My Tutor Logo" class="logo-image">
      Connect My Tutor
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="about.php" <?php echo $currentPage === 'about.php' ? 'aria-current="page"' : ''; ?>>About</a></li>
      <li><a href="courses.php" <?php echo $currentPage === 'courses.php' ? 'aria-current="page"' : ''; ?>>Courses</a></li>
      <li><a href="for-parents.php" <?php echo $currentPage === 'for-parents.php' ? 'aria-current="page"' : ''; ?>>For parents</a></li>
      <li><a href="become-a-tutor.php" <?php echo $currentPage === 'become-a-tutor.php' ? 'aria-current="page"' : ''; ?>>Become a tutor</a></li>
      <li><a href="tutors.php" <?php echo $currentPage === 'tutors.php' || $currentPage === 'tutor.php' ? 'aria-current="page"' : ''; ?>>Find tutors</a></li>
      <li><a href="contact.php" <?php echo $currentPage === 'contact.php' ? 'aria-current="page"' : ''; ?>>Contact</a></li>
    </ul>
    <div class="nav-cta">
      <a href="how-it-works.php" class="btn btn-outline">How it works</a>
      <a href="tutors.php" class="btn btn-primary">Find a tutor</a>
      <button class="hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false" aria-controls="navLinks">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>
