<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecapEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Recap Email',
        );
    }

      /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $postCount = Post::count();
        $userCount = User::count();
        return $this->subject('Site Recap')->view('recapemail', ['postCount' => $postCount, 'userCount' => $userCount]);
    }

}
