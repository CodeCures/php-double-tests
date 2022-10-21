<?php

use App\Question;
use App\Quize;
use PHPUnit\Framework\TestCase;

/**
 * QuizeTest
 * @group group
 */
class QuizeTest extends TestCase
{
    protected Quize $quiz;

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->quiz = new Quize();
    }
    
    /** @test */
    public function it_contains_quiz_list()
    {
        $this->quiz->addQuestion(new Question("What is the age in Nigeria", 18));

        $this->assertCount(1, $this->quiz->questions());
    }

    /** @test */
    public function it_contains_empty_Quize()
    {
        $this->assertCount(0, $this->quiz->questions());
    }
    

    /** @test */
    public function it_grades_a_perfect_quiz()
    {
        $this->quiz->addQuestion(new Question("this is the question we need", 4));
       
        $this->quiz->begin()->answer(4);
        
        $this->assertEquals(100, $this->quiz->grade());
    }

    /** @test */
    public function it_grades_a_failed_quiz()
    {
        $this->quiz->addQuestion(new Question("this is the question we need", 3));
        
        $this->quiz->begin()->answer(1);
        
        $this->assertEquals(0, $this->quiz->grade());
    }

    /** @test */
    public function it_correctly_tracks_the_next_question_in_the_queue()
    {
        $this->quiz->addQuestion($question1 = new Question("this is another question", 2));
        $this->quiz->addQuestion($question2 = new Question("this is the last question", 4));

        $this->assertEquals($question1, $this->quiz->begin());
        $this->assertEquals($question2, $this->quiz->nextQuestion());
        
    }

    /** @test */
    public function it_returns_false_if_there_are_no_remaining_questions()
    {
        $this->quiz->addQuestion(new Question("this is the question we need", 3));
        
        $this->quiz->begin();

        $this->assertFalse($this->quiz->nextQuestion());
    }
    

    /** @test */
    public function it_cannot_be_graded_until_all_questions_are_answered()
    {
        $this->quiz->addQuestion(new Question("this is another question", 2));
        
        $this->expectException(Exception::class);

        $this->quiz->grade();
    }
    
    
}

