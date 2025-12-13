<?php

namespace App\Mail;

use App\Models\Donor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // ✅ مهم
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewDonationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Donor $donor;

    public function __construct(Donor $donor)
    {
        $this->donor = $donor;
    }

    public function build()
    {
        return $this->subject('📩 إشعار تبرع جديد بانتظار الموافقة')
            ->view('emails.new_donation')
            ->with([
                'donor' => $this->donor,
            ]);
    }
}
