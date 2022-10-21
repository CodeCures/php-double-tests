<?php

namespace App;


/**
 * [Description Questions]
 */
trait Questions 
{
    /**
     * @var array
     */
    protected $questions = [];

    
    /**
     * @param Question $question
     * 
     * @return void
     */
    public function add(Question $question): void
    {
        $this->questions[] = $question;
    }

    /**
     * @return Question
     */
    public function next(): Question|bool
    {
        $question = current($this->questions);
        next($this->questions);

        return $question;
    }

    
    /**
     * @return Question
     */
    public function prev(): Question|bool
    {
        $question = current($this->questions);
        prev($this->questions);

        return $question;
    }

    /**
     * @return Array
     */
    public function answered(): Array
    {
        return array_filter($this->questions, fn ($q) => $q->answered());
    }

    /**
     * @return Array
     */
    public function solved(): Array
    {
        return array_filter($this->questions, fn($q) => $q->solved());
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->questions);
    }

    /**
     * @return Array
     */
    public function all(): Array
    {
        return $this->questions;
    }
}
