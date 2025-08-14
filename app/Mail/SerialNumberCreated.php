<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Log;

class SerialNumberCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $serialNumber;
    public $plainPassword;
    public $productName;
    public $productImage;
    public $imagebg_produk;
    public $link_tutorial;
    public $link_aplikasi;

    public function __construct($serialNumber, $plainPassword, $productName, $productImage, $imagebg_produk, $link_tutorial, $link_aplikasi)
    {
        $this->serialNumber = $serialNumber;
        $this->plainPassword = $plainPassword;
        $this->productName = $productName;
        $this->productImage = $productImage;
        $this->imagebg_produk = $imagebg_produk;
        $this->link_tutorial = $link_tutorial;
        $this->link_aplikasi = $link_aplikasi;
    }


    private function generateSerialImage()
    {
        try {
            $manager = new ImageManager(new Driver());
            
            // Load background image
            $imagePath = public_path('storage/' . $this->imagebg_produk);
            
            if (!file_exists($imagePath)) {
                throw new \Exception("Background image not found: " . $imagePath);
            }
            
            $image = $manager->read($imagePath);
            
            // Calculate dynamic font size based on image width
            $fontSize = min(120, $image->width() / 15);
            
            // Add serial number with shadow effect
            $centerX = $image->width() / 2;
            $centerY = $image->height() / 2;

            // Geser ke bawah (misal +60px dari tengah)
            $image->text($this->serialNumber, $centerX + 55, $centerY + 85, function($font) use ($fontSize) {
                $font->filename(public_path('fonts/Poppins-Regular.ttf'));
                $font->size($fontSize * 0.5);
                $font->color('#000000');
                $font->align('center');
                $font->valign('center');
            });

            // Add subtle watermark
            $watermarkX = $image->width() - 20;
            $watermarkY = $image->height() - 20;

            $image->text($this->productName, $watermarkX, $watermarkY, function($font) {
                $font->filename(public_path('fonts/Poppins-Regular.ttf'));
                $font->size(24);
                $font->color('rgba(255,255,255,0.2)');
                $font->angle(30);
                $font->align('right');
                $font->valign('bottom');
            });
            
            // Simpan ke temporary file
            $tempPath = tempnam(sys_get_temp_dir(), 'serial_') . '.png';
            $image->save($tempPath);
            
            return $tempPath;
            
        } catch (\Exception $e) {
            Log::error('Image generation failed: '.$e->getMessage());
            return null;
        }
    }

    public function build()
    {
        $viewData = [
            'serialNumber' => $this->serialNumber,
            'plainPassword' => $this->plainPassword,
            'productName' => $this->productName,
            'link_tutorial' => $this->link_tutorial,
            'link_aplikasi' => $this->link_aplikasi,
            'hasSerialImage' => false,
            'hasLogoImage' => false
        ];

        // Generate and attach serial image
        if (!empty($this->imagebg_produk)) {
            $serialImagePath = $this->generateSerialImage();
            if ($serialImagePath) {
                $viewData['hasSerialImage'] = true;
                $this->attach($serialImagePath, [
                    'as' => 'serial_image.png',
                    'mime' => 'image/png',
                ]);
                
                // Hapus file temporary setelah dilampirkan
                register_shutdown_function(function() use ($serialImagePath) {
                    if (file_exists($serialImagePath)) {
                        unlink($serialImagePath);
                    }
                });
            }
        }
        
        // Attach product logo if exists
        if (!empty($this->productImage) && file_exists(public_path('storage/' . $this->productImage))) {
            $viewData['hasLogoImage'] = true;
            $this->attach(public_path('storage/' . $this->productImage), [
                'as' => 'logo.png',
                'mime' => 'image/png',
            ]);
        }

        return $this->view('emails.serial_created')
            ->with($viewData)
            ->subject('Your OMSETin Serial Number - ' . $this->serialNumber);
    }
}