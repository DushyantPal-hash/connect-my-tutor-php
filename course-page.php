<?php
require __DIR__ . '/data/courses.php';

$courseSlug = isset($courseSlug) ? $courseSlug : '';
$course = null;
foreach ($courseTracks as $courseTrack) {
    if ($courseTrack['slug'] === $courseSlug) {
        $course = $courseTrack;
        break;
    }
}

if ($course === null) {
    http_response_code(404);
    $pageTitle = 'Course not found — Connect My Tutor';
    $pageDescription = 'We could not find this course. Browse all available academic tracks.';
} else {
    $pageTitle = $course['title'] . ' Tutoring & Course Support — Connect My Tutor';
    $pageDescription = $course['summary'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php echo e($pageDescription); ?>" />
  <title><?php echo e($pageTitle); ?></title>
  <link rel="icon" href="images/logo/favicon.png" type="image/png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@v11/font/simple-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/main.css" />
</head>
<body class="application-page">
<?php require __DIR__ . '/includes/header.php'; ?>
<main>
<?php if ($course === null): ?>
  <div class="container course-not-found">
    <h1>Course not found</h1>
    <p>We could not find this course. Browse all available academic tracks instead.</p>
    <a class="btn btn-primary" href="courses.php">Browse courses</a>
  </div>
<?php else: ?>
  <section class="application-hero course-hero">
    <div class="container">
      <span class="eyebrow"><?php echo e($course['category']); ?></span>
      <h1><?php echo e($course['title']); ?> tutoring, tailored to you.</h1>
      <p><?php echo e($course['description']); ?></p>
      <div class="page-actions">
        <a href="for-parents.php" class="btn btn-primary">Find <?php echo e($course['title']); ?> support</a>
        <a href="courses.php" class="btn btn-outline-black">All courses</a>
      </div>
    </div>
  </section>
  <section class="page-section course-detail-section">
    <div class="container course-detail-layout">
      <div class="course-detail-copy">
        <span class="eyebrow">A personal learning plan</span>
        <h2 class="section-title">Make progress with the right support.</h2>
        <p><?php echo e($course['focus']); ?> Your tutor can adapt lessons to your current level, learning style and goals.</p>
        <h3>Subjects we can help with</h3>
        <ul class="course-subject-list">
          <?php foreach ($course['subjects'] as $subject): ?>
            <li><?php echo e($subject); ?></li>
          <?php endforeach; ?>
        </ul>
        <a href="for-parents.php" class="btn btn-primary">Ask about this course</a>
      </div>
      <figure class="course-detail-art">
        <img src="images<?php echo e($course['art']); ?>" alt="Illustration representing <?php echo e($course['title']); ?> learning">
        <figcaption>One-to-one learning, focused on your goals.</figcaption>
      </figure>
    </div>
  </section>
  <section class="page-section course-related-section">
    <div class="container">
      <div class="section-head">
        <div><span class="eyebrow">Meet your learning partners</span><h2 class="section-title">Tutors for <?php echo e($course['title']); ?></h2></div>
        <a href="tutors.php" class="btn btn-outline">View all tutors</a>
      </div>
      <div class="related-tutor-grid">
        <?php
        $relatedTutorCount = 0;
        foreach ($tutors as $tutor):
            if (!in_array($course['slug'], $tutor['courses'], true)) {
                continue;
            }
            $relatedTutorCount++;
        ?>
          <a class="related-tutor-card" href="tutor.php?slug=<?php echo e($tutor['slug']); ?>">
            <img src="<?php echo e($tutor['image']); ?>" alt="">
            <span><strong><?php echo e($tutor['name']); ?></strong><small><?php echo e($tutor['subject']); ?> · <?php echo e($tutor['experience']); ?> years' experience</small></span>
            <span aria-hidden="true">→</span>
          </a>
        <?php endforeach; ?>
        <?php if ($relatedTutorCount === 0): ?>
          <p>There are no featured tutors for this course yet. <a href="contact.php">Contact us</a> and we’ll help find a match.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <section class="page-section course-feedback-section">
    <div class="container">
      <div class="section-head">
        <div><span class="eyebrow">Learner experiences</span><h2 class="section-title">Course feedback</h2></div>
      </div>
      <p class="sample-content-note">Related tutor profiles and feedback are illustrative sample content. Replace with verified details and feedback shared with permission.</p>
      <div class="feedback-grid">
        <?php foreach ($course['feedback'] as $review): ?>
          <article class="feedback-card">
            <blockquote>“<?php echo e($review['quote']); ?>”</blockquote>
            <p><strong><?php echo e($review['name']); ?></strong><span><?php echo e($review['relationship']); ?> · Example</span></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section class="page-section course-related-section">
    <div class="container">
      <div class="section-head">
        <div><span class="eyebrow">Keep exploring</span><h2 class="section-title">Related courses</h2></div>
        <a href="courses.php" class="btn btn-outline">View all courses</a>
      </div>
      <div class="related-course-links">
        <?php foreach ($course['related'] as $relatedSlug): ?>
          <?php foreach ($courseTracks as $relatedCourse): ?>
            <?php if ($relatedCourse['slug'] === $relatedSlug): ?>
              <a href="<?php echo course_url($relatedCourse['slug']); ?>"><?php echo e($relatedCourse['title']); ?><span aria-hidden="true">▶</span></a>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
<script type="module" src="js/main.js"></script>
</body>
</html>
