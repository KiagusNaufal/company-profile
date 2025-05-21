<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SerialNumberCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $serialNumber;
    public $plainPassword;
    public $productName;
    public $productImage;
    public $imagebg_produk;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($serialNumber, $plainPassword, $productName, $productImage, $imagebg_produk)
    {
        $this->serialNumber = $serialNumber;
        $this->plainPassword = $plainPassword;
        $this->productName = $productName;
        $this->productImage = $productImage;
        $this->imagebg_produk = $imagebg_produk;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $imagePath = public_path('storage/' . $this->productImage);

        return $this->subject('Your Serial Number and Access Details')
            ->view('emails.serial_created')
            ->attach($imagePath, [
                'as' => 'logo.png',
                'mime' => 'image/png'
            ])->attach(public_path('storage/' . $this->imagebg_produk), [
                'as' => 'background.png',
                'mime' => 'image/png'
            ])->with([
                'serialNumber' => $this->serialNumber,
                'plainPassword' => $this->plainPassword,
                'productName' => $this->productName,
            ])
            ;
    }
}
