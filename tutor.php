<?php
require __DIR__ . '/data/courses.php';

$tutorSlug = isset($_GET['slug']) && is_string($_GET['slug']) ? $_GET['slug'] : '';
$tutor = null;
foreach ($tutors as $tutorProfile) {
    if ($tutorProfile['slug'] === $tutorSlug) {
        $tutor = $tutorProfile;
        break;
    }
}

if ($tutor === null) {
    http_response_code(404);
    $pageTitle = 'Tutor not found — Connect My Tutor';
    $pageDescription = 'We could not find this tutor profile. Browse all featured tutors.';
} else {
    $pageTitle = $tutor['name'] . ' — Tutor Profile — Connect My Tutor';
    $pageDescription = $tutor['bio'];
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
<?php if ($tutor === null): ?>
  <div class="container course-not-found">
    <h1>Tutor not found</h1>
    <p>We could not find this tutor profile. Browse all featured tutors instead.</p>
    <a class="btn btn-primary" href="tutors.php">Browse tutors</a>
  </div>
<?php else: ?>
  <section class="application-hero tutor-profile-hero">
    <div class="container tutor-profile-heading">
      <img src="<?php echo e($tutor['image']); ?>" alt="">
      <div>
        <span class="eyebrow"><?php echo e($tutor['subject']); ?> tutor</span>
        <h1><?php echo e($tutor['name']); ?></h1>
        <p><?php echo e($tutor['experience']); ?> years of teaching experience · <?php echo e(implode(' · ', $tutor['lessonTypes'])); ?></p>
        <div class="page-actions">
          <a href="for-parents.php" class="btn btn-primary">Ask about lessons</a>
          <a href="tutors.php" class="btn btn-outline-black">All tutors</a>
        </div>
      </div>
    </div>
  </section>
  <section class="page-section tutor-profile-section">
    <div class="container tutor-profile-layout">
      <div>
        <p class="sample-content-note">This tutor profile, including qualifications and experience, is illustrative sample content and must be verified before publication.</p>
        <span class="eyebrow">About the tutor</span>
        <h2 class="section-title">A learning plan shaped around you.</h2>
        <p><?php echo e($tutor['bio']); ?></p>
        <h3>Subjects and courses</h3>
        <div class="tutor-course-chips">
          <?php foreach ($tutor['courses'] as $courseSlug): ?>
            <?php foreach ($courseTracks as $course): ?>
              <?php if ($course['slug'] === $courseSlug): ?>
                <a href="<?php echo course_url($course['slug']); ?>"><?php echo e($course['title']); ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <aside class="tutor-facts">
        <h2>Qualifications &amp; experience</h2>
        <dl>
          <div><dt>Qualification</dt><dd><?php echo e($tutor['qualification']); ?></dd></div>
          <div><dt>Teaching experience</dt><dd><?php echo e($tutor['teachingExperience']); ?></dd></div>
          <div><dt>Subjects</dt><dd><?php echo e($tutor['subject']); ?></dd></div>
          <div><dt>Languages</dt><dd><?php echo e(implode(', ', $tutor['languages'])); ?></dd></div>
          <div><dt>Lesson format</dt><dd><?php echo e(implode(', ', $tutor['lessonTypes'])); ?></dd></div>
        </dl>
      </aside>
    </div>
  </section>
  <section class="page-section tutor-feedback-section">
    <div class="container">
      <div class="section-head">
        <div><span class="eyebrow">Parent &amp; student feedback</span><h2 class="section-title">What learners say about <?php echo e($tutor['name']); ?></h2></div>
      </div>
      <p class="sample-content-note">Sample feedback for demonstration only. Replace with verified feedback shared with permission.</p>
      <div class="feedback-grid">
        <?php foreach ($tutor['feedback'] as $review): ?>
          <article class="feedback-card">
            <blockquote>“<?php echo e($review['quote']); ?>”</blockquote>
            <p><strong><?php echo e($review['name']); ?></strong><span><?php echo e($review['relationship']); ?> · Example</span></p>
          </article>
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
