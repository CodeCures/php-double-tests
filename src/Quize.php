<?php

namespace App;

use App\Questions;

/**
 * [Description Quize]
 */
class Quize
{
    use Questions;

    /**
     * @param Question $question
     * 
     * @return void
     */
    public function addQuestion(Question $question): void
    {
        $this->add($question);
    }

    /**
     * @return Question|bool
     */
    public function nextQuestion(): Question|bool
    {
        return $this->next();
    }

    /**
     * @return Question
     */
    public function begin(): Question|bool
    {
        return $this->nextQuestion();
    }

    /**
     * @return Array
     */
    public function questions(): Array
    {
        return $this->all();
    }

    /**
     * @return Array
     */
    public function answeredQuestions(): Array
    {
        return $this->answered();
    }

    /**
     * @return int
     */
    public function grade(): int
    {
        if(! $this->isCompleted()) 
            throw new \Exception("Quize has not been completed");
        
        return (count($this->solved()) / count($this->all())) * 100;
        
    }

    /**
     * @return bool
     */
    private function isCompleted(): bool
    {
        return count($this->all()) === count($this->answered());
    }
}