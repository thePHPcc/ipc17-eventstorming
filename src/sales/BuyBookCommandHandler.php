<?php declare(strict_types = 1);
namespace IPC\Sales;

class BuyBookCommandHandler {

    /** @var PaymentProvider */
    private $paymentProvider;

    /** @var $EventBus */
    private $eventBus;

    /**
     * @param PaymentProvider $paymentProvider
     * @param                 $eventBus
     */
    public function __construct(PaymentProvider $paymentProvider, $eventBus) {
        $this->paymentProvider = $paymentProvider;
        $this->eventBus = $eventBus;
    }

    public function handle(BuyBookCommand $command) {
        try {
            $reference = $this->paymentProvider->authorizeBookSale(
                $command->getBookId(),
                $command->getPrice(),
                $command->getTaxInfo(),
                $command->getReader()
            );

            $this->emit(
                new PaymentReferenceReceivedEvent($reference)
            );
        } catch (\Exception $e) {
            throw new PaymentFailedException(/*....,*/ $e);
        }
    }

    private function emit(PaymentReferenceReceivedEvent $event) {
        $this->eventBus->publish($event);
    }
}
