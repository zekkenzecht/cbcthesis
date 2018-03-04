<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\Carbon;
class ClassRequestNotification extends Notification
{
    use Queueable;
    public $classRequest;
    public $classUser;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($classRequest,$classUser)
    {
        
        $this->classRequest = $classRequest;
        $this->classUser = $classUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

 public function toDatabase($notifiable)
    {   
        
        return [
            'modifTime' =>  \Carbon\Carbon::now(),
            'user' => $this->classUser,
            'classrequest' => $this->classRequest
        ];
    }
 
  public function toBroadcast($notifiable)
    {   
        
        return new BroadcastMessage([
            'modifTime' =>  \Carbon\Carbon::now(),
            'user' => $this->classUser,
            'classrequest' => $this->classRequest
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
