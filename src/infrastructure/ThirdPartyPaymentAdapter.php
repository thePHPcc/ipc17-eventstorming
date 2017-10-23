<?php declare(strict_types = 1);
namespace IPC\Infrastructure;

use IPC\Sales\BookId;
use IPC\Sales\PaymentProvider;
use IPC\Sales\PaymentReference;
use IPC\Sales\Price;
use IPC\Sales\Reader;
use IPC\Sales\TaxInfo;
use ThirdParty\PaymentProviderClient;

class ThirdPartyPaymentAdapter implements PaymentProvider {

    /** @var PaymentProviderClient */
    private $client;

    /**
     * @param PaymentProviderClient $client
     */
    public function __construct(PaymentProviderClient $client) {
        $this->client = $client;
    }

    public function authorizeBookSale(BookId $bookId, Price $grossPrice, TaxInfo $taxInfo, Reader $reader): PaymentReference {
        $userId = $this->client->createUser($reader->getName());
        $paymentReference = $this->client->requestTransaction(
            [
                'amount' => $grossPrice->asFloat(),
                'user' => $userId
                // ...
            ]
        );

        return new PaymentReference($paymentReference);
    }

}
