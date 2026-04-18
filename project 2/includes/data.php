<?php
$questionBank = [

    // ================= EASY =================
    'easy' => [
        [
            'question' => 'What color is the sky on a clear day?',
            'choices' => ['A'=>'Blue','B'=>'Green','C'=>'Red','D'=>'Yellow'],
            'answer' => 'A',
            'hint' => 'It matches the ocean in cartoons.'
        ],
        [
            'question' => 'How many days are in a week?',
            'choices' => ['A'=>'5','B'=>'6','C'=>'7','D'=>'8'],
            'answer' => 'C',
            'hint' => 'More than 6, less than 8.'
        ],
        [
            'question' => 'Which animal says "meow"?',
            'choices' => ['A'=>'Dog','B'=>'Cat','C'=>'Cow','D'=>'Bird'],
            'answer' => 'B',
            'hint' => 'A common house pet.'
        ],
        [
            'question' => 'What is 2 + 2?',
            'choices' => ['A'=>'3','B'=>'4','C'=>'5','D'=>'6'],
            'answer' => 'B',
            'hint' => 'Same as number of wheels on a car.'
        ],
        [
            'question' => 'What is the opposite of hot?',
            'choices' => ['A'=>'Warm','B'=>'Cold','C'=>'Dry','D'=>'Soft'],
            'answer' => 'B',
            'hint' => 'Think ice.'
        ],
        [
            'question' => 'Which shape has 3 sides?',
            'choices' => ['A'=>'Square','B'=>'Triangle','C'=>'Circle','D'=>'Rectangle'],
            'answer' => 'B',
            'hint' => 'Tri means 3.'
        ],
        [
            'question' => 'What do bees make?',
            'choices' => ['A'=>'Milk','B'=>'Honey','C'=>'Bread','D'=>'Juice'],
            'answer' => 'B',
            'hint' => 'Sweet and sticky.'
        ],
        [
            'question' => 'What color is grass?',
            'choices' => ['A'=>'Green','B'=>'Blue','C'=>'Red','D'=>'Black'],
            'answer' => 'A',
            'hint' => 'Same as leaves.'
        ],
        [
            'question' => 'Which number comes after 9?',
            'choices' => ['A'=>'8','B'=>'10','C'=>'11','D'=>'7'],
            'answer' => 'B',
            'hint' => 'Double digits start here.'
        ],
        [
            'question' => 'Which animal barks?',
            'choices' => ['A'=>'Cat','B'=>'Dog','C'=>'Fish','D'=>'Bird'],
            'answer' => 'B',
            'hint' => 'Man’s best friend.'
        ]
    ],

    // ================= MEDIUM =================
    'medium' => [
        [
            'question' => 'Which planet is known as the Red Planet?',
            'choices' => ['A'=>'Venus','B'=>'Mars','C'=>'Jupiter','D'=>'Mercury'],
            'answer' => 'B',
            'hint' => '4th planet from sun.'
        ],
        [
            'question' => 'Which language is primarily used with Laravel?',
            'choices' => ['A'=>'Java','B'=>'Python','C'=>'PHP','D'=>'C#'],
            'answer' => 'C',
            'hint' => 'Same language as your project.'
        ],
        [
            'question' => 'What does CSS stand for?',
            'choices' => ['A'=>'Computer Style Sheets','B'=>'Creative Style Syntax','C'=>'Cascading Style Sheets','D'=>'Colorful Style System'],
            'answer' => 'C',
            'hint' => 'Controls design of webpages.'
        ],
        [
            'question' => 'Which ocean is the largest?',
            'choices' => ['A'=>'Atlantic','B'=>'Indian','C'=>'Arctic','D'=>'Pacific'],
            'answer' => 'D',
            'hint' => 'Name suggests peace.'
        ],
        [
            'question' => 'Who was the first US President?',
            'choices' => ['A'=>'Lincoln','B'=>'Washington','C'=>'Jefferson','D'=>'Adams'],
            'answer' => 'B',
            'hint' => 'On the $1 bill.'
        ],
        [
            'question' => 'Which country has the Eiffel Tower?',
            'choices' => ['A'=>'Italy','B'=>'France','C'=>'Spain','D'=>'Germany'],
            'answer' => 'B',
            'hint' => 'Paris.'
        ],
        [
            'question' => 'What does CPU stand for?',
            'choices' => ['A'=>'Central Process Unit','B'=>'Central Processing Unit','C'=>'Computer Power Unit','D'=>'Core Processing Unit'],
            'answer' => 'B',
            'hint' => 'The brain of a computer.'
        ],
        [
            'question' => 'Which gas do humans breathe in?',
            'choices' => ['A'=>'Oxygen','B'=>'Carbon Dioxide','C'=>'Nitrogen','D'=>'Helium'],
            'answer' => 'A',
            'hint' => 'Needed to live.'
        ],
        [
            'question' => 'Which sport uses a bat?',
            'choices' => ['A'=>'Soccer','B'=>'Basketball','C'=>'Baseball','D'=>'Tennis'],
            'answer' => 'C',
            'hint' => 'Home run.'
        ],
        [
            'question' => 'Which continent is Egypt in?',
            'choices' => ['A'=>'Asia','B'=>'Europe','C'=>'Africa','D'=>'Australia'],
            'answer' => 'C',
            'hint' => 'Same as Nigeria.'
        ]
    ],

    // ================= HARD =================
    'hard' => [
        [
            'question' => 'Which HTML tag is used for the largest heading?',
            'choices' => ['A'=>'<h6>','B'=>'<head>','C'=>'<h1>','D'=>'<title>'],
            'answer' => 'C',
            'hint' => 'Smallest number.'
        ],
        [
            'question' => 'Which superglobal stores user session data?',
            'choices' => ['A'=>'$_POST','B'=>'$_COOKIE','C'=>'$_SESSION','D'=>'$_GET'],
            'answer' => 'C',
            'hint' => 'Used after session_start().'
        ],
        [
            'question' => 'Which function allows custom sorting?',
            'choices' => ['A'=>'sort()','B'=>'usort()','C'=>'count()','D'=>'explode()'],
            'answer' => 'B',
            'hint' => 'Starts with u.'
        ],
        [
            'question' => 'Which function escapes HTML output?',
            'choices' => ['A'=>'trim()','B'=>'htmlspecialchars()','C'=>'intval()','D'=>'strtolower()'],
            'answer' => 'B',
            'hint' => 'Prevents XSS.'
        ],
        [
            'question' => 'Which SQL command retrieves data?',
            'choices' => ['A'=>'INSERT','B'=>'DELETE','C'=>'SELECT','D'=>'UPDATE'],
            'answer' => 'C',
            'hint' => 'Starts with S.'
        ],
        [
            'question' => 'Which protocol loads web pages?',
            'choices' => ['A'=>'FTP','B'=>'SMTP','C'=>'HTTP','D'=>'SSH'],
            'answer' => 'C',
            'hint' => 'Seen in URLs.'
        ],
        [
            'question' => 'Which JavaScript function delays execution?',
            'choices' => ['A'=>'delay()','B'=>'wait()','C'=>'setTimeout()','D'=>'pause()'],
            'answer' => 'C',
            'hint' => 'Starts with set.'
        ],
        [
            'question' => 'Which HTTP status means Not Found?',
            'choices' => ['A'=>'200','B'=>'301','C'=>'404','D'=>'500'],
            'answer' => 'C',
            'hint' => 'Common error page.'
        ],
        [
            'question' => 'Which data structure uses LIFO?',
            'choices' => ['A'=>'Queue','B'=>'Stack','C'=>'Array','D'=>'Tree'],
            'answer' => 'B',
            'hint' => 'Last in, first out.'
        ],
        [
            'question' => 'Which keyword defines a constant in JavaScript?',
            'choices' => ['A'=>'let','B'=>'var','C'=>'const','D'=>'static'],
            'answer' => 'C',
            'hint' => 'Cannot be reassigned.'
        ]
    ]
];

$moneyLadder = [
    1 => 100, 2 => 200, 3 => 300, 4 => 500, 5 => 1000,
    6 => 2000, 7 => 4000, 8 => 8000, 9 => 16000, 10 => 32000,
    11 => 64000, 12 => 125000, 13 => 250000, 14 => 500000, 15 => 1000000
];
?>
