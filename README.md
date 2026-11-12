# Connect My Tutor

A responsive tutoring website built with PHP, CSS, and JavaScript. PHP renders the pages and reads course and tutor profiles from a shared local data file; no database or build step is required.

## Project structure

```text
.
├── index.php
├── course-*.php
├── courses.php
├── tutors.php
├── tutor.php
├── includes/
│   ├── header.php
│   └── footer.php
├── data/
│   └── courses.php
├── css/
└── js/
    └── main.js
```

The shared header and footer are PHP includes. Course and tutor information is maintained in `data/courses.php`; course detail pages show subjects, related courses, matching tutors, and sample feedback. Tutor profiles include qualifications, teaching experience, lesson formats, related courses, and sample parent/student feedback.

The profile details and feedback are illustrative sample content and must be replaced with accurate information and verified feedback shared with permission. The contact, tutor application, and parent enquiry forms are frontend demos only. Connect them to a form service or backend before collecting real submissions.

## Run locally

Install PHP, open a terminal in this folder, and run `php -S localhost:8000`. Then open `http://localhost:8000`. Do not use a static file server; PHP pages must be served by a PHP runtime.
