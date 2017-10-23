<?php declare(strict_types = 1);
namespace IPC\Sales;

class PaymentReferenceReceivedEventHandler {

    /** @var PlaceOrderCommandHandler */
    private $placeOrderCommandHandler;

    /**
     * @param PlaceOrderCommandHandler $placeOrderCommandHandler
     */
    public function __construct(PlaceOrderCommandHandler $placeOrderCommandHandler) {
        $this->placeOrderCommandHandler = $placeOrderCommandHandler;
    }

    public function handle(PaymentReferenceReceivedEvent $event) {
        $this->placeOrderCommandHandler->handle(
            new PlaceOrderCommand(/*...*/)
        );
    }
}
