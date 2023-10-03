<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

function incorrect(string $name, string $guess, string $answer) {
    echo "'$guess' is incorrect wrong answer ;(. Correct answer was '$answer'\n";
    echo "Let's try again, $name!\n";
}

function play(string $name) {
    $correctAnswers = 0;

    echo "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";

    while ($correctAnswers < 3) {
        $number = rand(0, 100);
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

        echo "Question: $number\n";

        $guess = prompt("Your answer");

        if ($guess !== "yes" && $guess !== "no") {
            incorrect($name, $guess, $correctAnswer);
            return;
        }

        if ($guess === $correctAnswer) {
            echo "Correct!\n";
            $correctAnswers += 1;
        } else {
            incorrect($name, $guess, $correctAnswer);
            return;
        }
    }

    echo "Congratulations, $name!";
}