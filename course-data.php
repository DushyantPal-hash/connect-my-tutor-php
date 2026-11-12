<?php

require __DIR__ . '/data/courses.php';

header('Content-Type: application/json; charset=utf-8');

$publicCourses = array_map(function ($course) {
    return [
        'slug' => $course['slug'],
        'title' => $course['title'],
        'category' => $course['category'],
        'summary' => $course['summary'],
        'subjects' => $course['subjects'],
        'art' => ltrim($course['art'], '/'),
    ];
}, $courseTracks);

echo json_encode($publicCourses, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
