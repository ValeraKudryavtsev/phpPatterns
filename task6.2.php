<?php

interface PaymentStrategy
{
    public function processPayment(float $amount, string $phoneNumber): bool;
    public function getPaymentResponse(): string;
}

class QiwiPaymentStrategy implements PaymentStrategy
{
    public function processPayment(float $amount, string $phoneNumber): bool
    {
        // Логика обработки запроса на оплату через Qiwi
        return true; // Возврат true в случае успешной оплаты, иначе - false
    }

    public function getPaymentResponse(): string
    {
        // Логика получения ответа от платежной системы Qiwi
        return 'Оплата через Qiwi прошла успешно!';
    }
}

class YandexPaymentStrategy implements PaymentStrategy
{
    public function processPayment(float $amount, string $phoneNumber): bool
    {
        // Логика обработки запроса на оплату через Яндекс
        return true; // Возврат true в случае успешной оплаты, иначе - false
    }

    public function getPaymentResponse(): string
    {
        // Логика получения ответа от платежной системы Яндекс
        return 'Оплата через Яндекс прошла успешно!';
    }
}

class WebMoneyPaymentStrategy implements PaymentStrategy
{
    public function processPayment(float $amount, string $phoneNumber): bool
    {
        // Логика обработки запроса на оплату через WebMoney
        return true; // Возврат true в случае успешной оплаты, иначе - false
    }

    public function getPaymentResponse(): string
    {
        // Логика получения ответа от платежной системы WebMoney
        return 'Оплата через WebMoney прошла успешно!';
    }
}

class Payment
{
    private $paymentStrategy;

    public function __construct(PaymentStrategy $paymentStrategy)
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function process(float $amount, string $phoneNumber): bool
    {
        return $this->paymentStrategy->processPayment($amount, $phoneNumber);
    }

    public function getResponse(): string
    {
        return $this->paymentStrategy->getPaymentResponse();
    }
}

// Создаем объект оплаты через Qiwi
$qiwiPayment = new Payment(new QiwiPaymentStrategy());
$qiwiPayment->process(200.0, "88005553535");
$qiwiPayment->getResponse();

// Создаем объект оплаты через Яндекс
$yaPayment = new Payment(new YandexPaymentStrategy());
$yaPayment->process(200.0, "88005553535");
$yaPayment->getResponse();

// Создаем объект оплаты через WebMoney
$webMoneyPayment = new Payment(new WebMoneyPaymentStrategy());
$webMoneyPayment->process(200.0, "88005553535");
$webMoneyPayment->getResponse();