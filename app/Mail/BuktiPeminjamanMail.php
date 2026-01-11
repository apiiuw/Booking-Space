<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class BuktiPeminjamanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $peminjaman;
    public $pdf;

    public function __construct($peminjaman, $pdf)
    {
        $this->peminjaman = $peminjaman;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Bukti Peminjaman Ruangan')
                    ->markdown('emails.bukti-peminjaman')
                    ->attachData($this->pdf->output(), 'bukti_peminjaman.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
