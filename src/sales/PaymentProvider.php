<?php declare(strict_types = 1);
namespace IPC\Sales;

interface PaymentProvider {

    public function authorizeBookSale(BookId $bookId, Price $grossPrice, TaxInfo $taxInfo, Reader $reader): PaymentReference;

}
