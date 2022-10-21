<?php

namespace App;

class Question
{
    /**
     * @var int
     */
    protected int $answer;

    /**
     * @param protected $body
     * @param protected $solution
     */
    public function __construct(protected $body, protected $solution)
    {
        $this->body = $body;
        $this->solution = $solution;
    }

    /**
     * @param int $answer
     * 
     * @return bool
     */
    public function answer(int $answer): bool
    {
        $this->answer = $answer;

        return $this->solved();
    }

    /**
     * @return bool
     */
    public function solved(): bool
    {
        return $this->answer === $this->solution;
    }

    /**
     * @return bool
     */
    public function answered(): bool
    {
        return isset($this->answer);
    }
}
