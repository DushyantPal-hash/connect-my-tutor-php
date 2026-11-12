<?php require __DIR__ . '/data/courses.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="Explore personalized tutoring for IB, IGCSE, SAT, ACT, AP, AQA, Pearson Edexcel, JEE, NEET and board preparation." />
  <title>Courses &amp; Academic Tracks — Connect My Tutor</title>
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
        <span class="eyebrow">Courses &amp; academic tracks</span>
        <h1>Find the path that fits your goals.</h1>
        <p>
          Explore school curricula, international qualifications and competitive exam preparation. Every learning
          plan is shaped around the student.
        </p>
        <div class="page-actions">
          <a href="for-parents.php" class="btn btn-primary">Find student support</a>
        </div>
      </div>
    </section>
    <section class="page-section course-directory">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="eyebrow">Explore learning options</span>
            <h2 class="section-title">Choose your academic track.</h2>
            <p class="section-sub">Select a course to see subjects, learning focus and ways to get started.</p>
          </div>
        </div>
        <div class="course-grid course-directory-grid">
          <?php foreach ($courseTracks as $course): ?>
            <a class="course-card course-directory-card" href="<?php echo course_url($course['slug']); ?>">
              <img class="course-card-image" src="images<?php echo e($course['art']); ?>" alt="" loading="lazy">
              <span class="course-type"><?php echo e($course['category']); ?></span>
              <h2><?php echo e($course['title']); ?></h2>
              <p><?php echo e($course['summary']); ?></p>
              <span class="course-link">Explore course <span aria-hidden="true">▶</span></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </main>
  <?php require __DIR__ . '/includes/footer.php'; ?>
  <script type="module" src="js/main.js"></script>
</body>

</html>