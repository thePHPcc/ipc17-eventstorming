<?php declare(strict_types = 1);
namespace IPC\Sales;

class BuyBookCommand {

    /** @var BookId */
    private $bookId;

    /** @var Reader */
    private $reader;

    /** @var Price */
    private $price;

    /** @var TaxInfo */
    private $taxInfo;

    /**
     * @param BookId  $bookId
     * @param Reader  $reader
     * @param Price   $price
     * @param TaxInfo $taxInfo
     */
    public function __construct(BookId $bookId, Reader $reader, Price $price, TaxInfo $taxInfo) {
        $this->bookId = $bookId;
        $this->reader = $reader;
        $this->price = $price;
        $this->taxInfo = $taxInfo;
    }

    /**
     * @return BookId
     */
    public function getBookId(): BookId {
        return $this->bookId;
    }

    /**
     * @return Reader
     */
    public function getReader(): Reader {
        return $this->reader;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price {
        return $this->price;
    }

    /**
     * @return TaxInfo
     */
    public function getTaxInfo(): TaxInfo {
        return $this->taxInfo;
    }

}
