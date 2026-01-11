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
    public $filePath;

    public function __construct($peminjaman, $filePath)
    {
        $this->peminjaman = $peminjaman;
        $this->filePath = $filePath;
    }

    public function build()
    {
        return $this->subject('Bukti Pengajuan Peminjaman Ruangan')
            ->markdown('emails.bukti-peminjaman')
            ->attach($this->filePath, [
                'as' => basename($this->filePath),
                'mime' => 'application/pdf',
            ]);
    }

}
