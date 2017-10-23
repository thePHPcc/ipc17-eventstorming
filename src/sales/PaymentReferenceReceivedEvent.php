<?php declare(strict_types = 1);
namespace IPC\Sales;

class PaymentReferenceReceivedEvent {

    /** @var PaymentReference */
    private $paymentReference;

    /**
     * @param PaymentReference $paymentReference
     */
    public function __construct(PaymentReference $paymentReference) {
        $this->paymentReference = $paymentReference;
    }

    /**
     * @return PaymentReference
     */
    public function getPaymentReference(): PaymentReference {
        return $this->paymentReference;
    }

}

