<?php require __DIR__ . '/data/courses.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="Explore featured Connect My Tutor educators and find support across a range of subjects." />
  <title>Find a Tutor — Connect My Tutor</title>
  <link rel="icon" href="images/logo/favicon.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Manrope:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@v11/font/simple-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/main.css" />
</head>

<body class="application-page">
  <?php require __DIR__ . '/includes/header.php'; ?>
  <main>
    <section class="application-hero">
      <div class="container">
        <span class="eyebrow">Find your learning partner</span>
        <h1>Meet tutors who make learning click.</h1>
        <p>Explore a few of our featured educators. Search by subject or name, then get in touch to discuss the right
          fit.</p>
      </div>
    </section>
    <section class="page-content">
      <div class="container">
        <div class="tutor-search">
          <label for="tutorSearch">Search by tutor or subject</label>
          <input id="tutorSearch" type="search" placeholder="Try Mathematics, English, or a tutor's name" />
        </div>
        <p class="sample-content-note">Tutor profiles, qualifications, ratings and feedback shown here are sample
          content. Verify details and use feedback only with permission.</p>
        <div class="tutors-grid">
          <?php foreach ($tutors as $tutor): ?>
            <article class="tutor">
              <a class="tutor-profile-link" href="tutor.php?slug=<?php echo e($tutor['slug']); ?>">
                <div class="tutor-photo <?php echo e($tutor['cardClass']); ?>">
                  <img src="<?php echo e($tutor['image']); ?>"
                    alt="<?php echo e($tutor['name']); ?>, <?php echo e($tutor['subject']); ?> tutor" />
                  <small><?php echo e($tutor['subject']); ?></small>
                </div>
                <div class="tutor-body">
                  <h2><?php echo e($tutor['name']); ?></h2>
                  <div class="tutor-meta">
                    <span><?php echo e($tutor['experience']); ?> yrs experience</span>
                    <span class="rating" aria-label="Sample rating">★ <?php echo e($tutor['rating']); ?></span>
                  </div>
                  <span class="course-link ">View tutor profile <span aria-hidden="true">▶</span></span>
                </div>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
        <p id="noTutors" role="status" hidden>
          No featured tutors match that search. Try another subject or <a href="contact.php">contact us</a> for help.
        </p>
        <div class="page-actions">
          <a href="contact.php" class="btn btn-primary">Ask us to find a match</a>
        </div>
      </div>
    </section>
  </main>
  <?php require __DIR__ . '/includes/footer.php'; ?>
  <script type="module" src="js/main.js"></script>
</body>

</html>