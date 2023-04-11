<?php

interface Message
{
    public function send(string $message);
}

class BaseFun implements Message {
    public function send(string $message)
    {
        // TODO: Implement send() method.
    }
}

abstract class MessageDecorator implements Message {
    protected Message $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }
}

class SendSmsMessage extends MessageDecorator {

    private string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function send(string $message)
    {
        // sms code here
    }
}

class SendEmailMessage extends MessageDecorator {

    private string $send_to;
    private string $title;

    public function __construct(string $send_to, string $title)
    {
        $this->send_to = $send_to;
        $this->title = $title;
    }

    public function send(string $message)
    {
        return mail($this->send_to, $this->title, $message);
    }
}

class ChromeNotification extends MessageDecorator {
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function send(string $message)
    {
        // ChromeNotification code here
    }
}

$sendMessage = new SendEmailMessage(
    new SendSmsMessage(
        new ChromeNotification(
            new BaseFun()
        )
    )
);

$sendMessage->send("Some message");



