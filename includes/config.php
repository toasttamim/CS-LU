<?php
define('SITE_NAME', 'StudyArch');
define('SITE_VERSION', '1.0.0');
define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '');

$COURSES = [
    'i2206' => [
        'id'          => 'i2206',
        'code'        => 'I2206',
        'title'       => 'Data Structures',
        'description' => 'Master stacks, queues, linked lists, trees, and graphs with hands-on C implementations.',
        'icon'        => '🧱',
        'color'       => '#5b8fff',
        'chapters'    => [
            'ch01' => [
                'id'    => 'ch01',
                'title' => 'Linear Data Structures — Introduction',
                'desc'  => 'What they are and why they matter.',
                'modules' => [
                    'm01' => ['id' => 'm01', 'title' => 'Introduction to Linear Data Structures', 'file' => 'courses/i2206/modules/m01.php'],
                ],
            ],
            'ch02' => [
                'id'    => 'ch02',
                'title' => 'Stacks',
                'desc'  => 'Concept, theory, implementations, and applications.',
                'modules' => [
                    'm02' => ['id' => 'm02', 'title' => 'Stacks — Concept and Theory',        'file' => 'courses/i2206/modules/m02.php'],
                    'm03' => ['id' => 'm03', 'title' => 'Stack Implementation — Array-Based', 'file' => 'courses/i2206/modules/m03.php'],
                    'm04' => ['id' => 'm04', 'title' => 'Stack Implementation — Linked List', 'file' => 'courses/i2206/modules/m04.php'],
                    'm05' => ['id' => 'm05', 'title' => 'Stack Applications',                 'file' => 'courses/i2206/modules/m05.php'],
                ],
            ],
            'ch03' => [
                'id'    => 'ch03',
                'title' => 'Queues',
                'desc'  => 'FIFO, circular queues, deques, and real-world simulations.',
                'modules' => [
                    'm06' => ['id' => 'm06', 'title' => 'Queues — Concept and Theory',        'file' => 'courses/i2206/modules/m06.php'],
                    'm07' => ['id' => 'm07', 'title' => 'Queue Implementation — Array-Based', 'file' => 'courses/i2206/modules/m07.php'],
                    'm08' => ['id' => 'm08', 'title' => 'Queue Implementation — Linked List', 'file' => 'courses/i2206/modules/m08.php'],
                    'm09' => ['id' => 'm09', 'title' => 'Circular Queue',                     'file' => 'courses/i2206/modules/m09.php'],
                    'm10' => ['id' => 'm10', 'title' => 'Double-Ended Queue (Deque)',         'file' => 'courses/i2206/modules/m10.php'],
                    'm11' => ['id' => 'm11', 'title' => 'Queue Applications',                 'file' => 'courses/i2206/modules/m11.php'],
                ],
            ],
            'ch04' => [
                'id'    => 'ch04',
                'title' => 'Exercises & Challenges',
                'desc'  => 'Practice problems from beginner to advanced.',
                'modules' => [
                    'm12' => ['id' => 'm12', 'title' => 'Exercises and Challenges', 'file' => 'courses/i2206/modules/m12.php'],
                ],
            ],
        ],
    ],
];

function find_module(string $course_id, string $module_id): ?array {
    global $COURSES;
    if (!isset($COURSES[$course_id])) return null;
    foreach ($COURSES[$course_id]['chapters'] as $ch) {
        if (isset($ch['modules'][$module_id])) return $ch['modules'][$module_id];
    }
    return null;
}

function course_modules_flat(string $course_id): array {
    global $COURSES;
    $flat = [];
    if (!isset($COURSES[$course_id])) return $flat;
    foreach ($COURSES[$course_id]['chapters'] as $ch)
        foreach ($ch['modules'] as $mod)
            $flat[] = $mod;
    return $flat;
}

function prev_next_modules(string $course_id, string $module_id): array {
    $flat = course_modules_flat($course_id);
    $ids  = array_column($flat, 'id');
    $pos  = array_search($module_id, $ids);
    return [
        'prev'  => ($pos > 0)              ? $flat[$pos - 1] : null,
        'next'  => ($pos < count($flat)-1) ? $flat[$pos + 1] : null,
        'index' => $pos,
        'total' => count($flat),
    ];
}
