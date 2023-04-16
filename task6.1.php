<?php

class JobSeeker
{
    private $name;
    private $email;
    private $experience;

    public function __construct($name, $email, $experience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getExperience()
    {
        return $this->experience;
    }
}

class JobMarket
{
    private $jobPostings = array();
    private $observers = array();

    public function addJobPosting($posting)
    {
        $this->jobPostings[] = $posting;
        $this->notifyObservers();
    }

    public function removeJobPosting($posting)
    {
        $key = array_search($posting, $this->jobPostings);
        if ($key !== false) {
            unset($this->jobPostings[$key]);
            $this->notifyObservers();
        }
    }

    public function addObserver($observer)
    {
        $this->observers[] = $observer;
    }

    public function removeObserver($observer)
    {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->jobPostings);
        }
    }
}

class JobMarketObserver
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update($jobPostings)
    {
        // Отправляем уведомление на почту
        echo "Уважаемый(ая) " . $this->name . ", на бирже вакансий появилась новая вакансия для PHP-программиста\n";
    }
}

// Пример использования
$jobMarket = new JobMarket();

$jobSeeker1 = new JobSeeker("Иван Иванов", "ivan@example.com", 3);
$jobSeeker2 = new JobSeeker("Петр Петров", "petr@example.com", 5);
$jobSeeker3 = new JobSeeker("Алексей Алексеев", "alex@example.com", 2);

$jobMarketObserver1 = new JobMarketObserver("Иван Иванов");
$jobMarketObserver2 = new JobMarketObserver("Петр Петров");
$jobMarketObserver3 = new JobMarketObserver("Алексей Алексеев");

$jobMarket->addObserver($jobMarketObserver1);
$jobMarket->addObserver($jobMarketObserver2);
$jobMarket->addObserver($jobMarketObserver3);

$jobMarket->addJobPosting("PHP-программист с опытом работы более 3 лет");
$jobMarket->addJobPosting("PHP-программист с опытом работы более 5 лет");
$jobMarket->addJobPosting("PHP-программист с опытом работы от 1 до 3 лет");

