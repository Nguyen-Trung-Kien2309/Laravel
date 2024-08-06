<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        // Tạo PDF từ view
        $pdf = Pdf::loadView('pdf.invoice', ['order' => $this->order]);

        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Hóa đơn mua hàng từ ' . config('app.name'))
                    ->markdown('emails.invoice')
                    ->with([
                        'order' => $this->order,
                    ])
                    ->attachData($pdf->output(), 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
