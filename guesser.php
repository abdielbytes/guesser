<?php

function printWelcomeMessage()
{
    echo "Welcome to the Number Guessing Game!\n";
    echo "I'm thinking of a number between 1 and 100.\n";
    echo "You have a limited number of chances to guess the correct number based on the difficulty level.\n\n";
}

function selectDifficulty()
{
    echo "Please select the difficulty level:\n";
    echo "1. Easy (10 chances)\n";
    echo "2. Medium (5 chances)\n";
    echo "3. Hard (3 chances)\n";

    while (true) {
        $choice = readline("Enter your choice (1/2/3): ");
        if (in_array($choice, ['1', '2', '3'])) {
            return (int)$choice;
        } else {
            echo "Invalid choice. Please enter 1, 2, or 3.\n";
        }
    }
}

function getChances($difficulty)
{
    switch ($difficulty) {
        case 1:
            return 10;
        case 2:
            return 5;
        case 3:
            return 3;
        default:
            return 5;
    }
}

function playGame()
{
    $difficulty = selectDifficulty();
    $chances = getChances($difficulty);
    $numberToGuess = rand(1, 100);
    $attempts = 0;

    echo "\nGreat! Let's start the game!\n";
    $startTime = microtime(true);

    while ($chances > 0) {
        $guess = readline("\nEnter your guess (You have $chances chances left): ");
        
        if (!is_numeric($guess)) {
            echo "Invalid input. Please enter a valid number.\n";
            continue;
        }

        $guess = (int)$guess;
        $attempts++;

        if ($guess < $numberToGuess) {
            echo "Incorrect! The number is greater than your guess.\n";
        } elseif ($guess > $numberToGuess) {
            echo "Incorrect! The number is less than your guess.\n";
        } else {
            $endTime = microtime(true);
            $timeTaken = round($endTime - $startTime, 2);
            echo "Congratulations! You guessed the correct number in $attempts attempts.\n";
            echo "Time taken: $timeTaken seconds.\n";
            return;
        }

        $chances--;
    }

    echo "Sorry, you're out of chances. The correct number was $numberToGuess.\n";
}

function main()
{
    printWelcomeMessage();

    do {
        playGame();
        $playAgain = strtolower(readline("\nDo you want to play again? (yes/no): "));
    } while (in_array($playAgain, ['yes', 'y']));

    echo "Thank you for playing! Goodbye!\n";
}

main();

?>
