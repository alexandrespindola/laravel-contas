<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailContaPagar extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $contas)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Obter a data atual
        $dataAtual = Carbon::now()->format('d/m/Y');

        // Criar o título do e-mail
        return new Envelope(
            subject: 'Conta do dia ' . $dataAtual,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Carregar o layout do e-mail HTML e texto
        return new Content(
            view: 'emails.sendEmailContaPagar',
            text: 'emails.sendEmailTextContaPagar',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
