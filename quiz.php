<?php

//to evaluate the quiz
function evaluateQuiz(array $questions, array $answers): int {
    $score = 0;

    foreach ($questions as $index => $question) {
        if (isset($answers[$index]) && strtolower(trim($answers[$index])) === strtolower(trim($question['correct']))) {
            $score++;
        }
    }

    return $score;
}

//set the quiz questions
$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],
];

//input answers from the user
$answers = [];
foreach ($questions as $index => $question) {
    echo ($index + 1) . ". " . $question['question'] . "\n";
    $answers[$index] = readline("Your answer: ");
}

//user's score
$score = evaluateQuiz($questions, $answers);
$totalQuestions = count($questions);

// Display score
echo "You scored $score out of $totalQuestions.\n";

// Feedback on performance
if ($score === $totalQuestions) {
    echo "Excellent job!\n";
} elseif ($score > $totalQuestions / 2) {
    echo "Good effort!\n";
} else {
    echo "Better luck next time!\n";
}
?>