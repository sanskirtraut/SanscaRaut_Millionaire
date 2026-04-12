<?php
$questionBank = [
    'easy' => [
        [
            'question' => 'What color is the sky on a clear day?',
            'choices' => [
                'A' => 'Blue',
                'B' => 'Green',
                'C' => 'Red',
                'D' => 'Yellow'
            ],
            'answer' => 'A',
            'hint' => 'It matches the color of the ocean in cartoons.'
        ],
        [
            'question' => 'How many days are in a week?',
            'choices' => [
                'A' => '5',
                'B' => '6',
                'C' => '7',
                'D' => '8'
            ],
            'answer' => 'C',
            'hint' => 'It is more than 6 and less than 8.'
        ],
        [
            'question' => 'Which animal says "meow"?',
            'choices' => [
                'A' => 'Dog',
                'B' => 'Cat',
                'C' => 'Cow',
                'D' => 'Bird'
            ],
            'answer' => 'B',
            'hint' => 'It is a common house pet.'
        ],
        [
            'question' => 'What is 2 + 2?',
            'choices' => [
                'A' => '3',
                'B' => '4',
                'C' => '5',
                'D' => '6'
            ],
            'answer' => 'B',
            'hint' => 'It equals the number of table legs on a square table.'
        ]
    ],
    'medium' => [
        [
            'question' => 'Which planet is known as the Red Planet?',
            'choices' => [
                'A' => 'Venus',
                'B' => 'Mars',
                'C' => 'Jupiter',
                'D' => 'Mercury'
            ],
            'answer' => 'B',
            'hint' => 'It is the fourth planet from the sun.'
        ],
        [
            'question' => 'Which language is primarily used with Laravel?',
            'choices' => [
                'A' => 'Java',
                'B' => 'Python',
                'C' => 'PHP',
                'D' => 'C#'
            ],
            'answer' => 'C',
            'hint' => 'It is the same language used in this project.'
        ],
        [
            'question' => 'What does CSS stand for?',
            'choices' => [
                'A' => 'Computer Style Sheets',
                'B' => 'Creative Style Syntax',
                'C' => 'Cascading Style Sheets',
                'D' => 'Colorful Style System'
            ],
            'answer' => 'C',
            'hint' => 'It controls the visual style of webpages.'
        ],
        [
            'question' => 'Which ocean is the largest?',
            'choices' => [
                'A' => 'Atlantic',
                'B' => 'Indian',
                'C' => 'Arctic',
                'D' => 'Pacific'
            ],
            'answer' => 'D',
            'hint' => 'Its name suggests peace.'
        ]
    ],
    'hard' => [
        [
            'question' => 'Which HTML tag is used for the largest heading?',
            'choices' => [
                'A' => '<h6>',
                'B' => '<head>',
                'C' => '<h1>',
                'D' => '<title>'
            ],
            'answer' => 'C',
            'hint' => 'It starts with h and uses the smallest number.'
        ],
        [
            'question' => 'Which superglobal is commonly used to store logged-in user data?',
            'choices' => [
                'A' => '$_POST',
                'B' => '$_COOKIE',
                'C' => '$_SESSION',
                'D' => '$_GET'
            ],
            'answer' => 'C',
            'hint' => 'It starts after session_start().'
        ],
        [
            'question' => 'Which sorting function can sort an array using a custom comparison?',
            'choices' => [
                'A' => 'sort()',
                'B' => 'usort()',
                'C' => 'count()',
                'D' => 'explode()'
            ],
            'answer' => 'B',
            'hint' => 'The name begins with a "u".'
        ],
        [
            'question' => 'Which function safely escapes HTML output?',
            'choices' => [
                'A' => 'trim()',
                'B' => 'htmlspecialchars()',
                'C' => 'intval()',
                'D' => 'strtolower()'
            ],
            'answer' => 'B',
            'hint' => 'It prevents raw HTML from being rendered.'
        ]
    ]
];

$moneyLadder = [
    1 => 100,
    2 => 200,
    3 => 300,
    4 => 500,
    5 => 1000,
    6 => 2000,
    7 => 4000,
    8 => 8000,
    9 => 16000,
    10 => 32000,
    11 => 64000,
    12 => 125000,
    13 => 250000,
    14 => 500000,
    15 => 1000000
];
?>