<?php
/*
 * A demo of the adapter pattern.
 * An adapter helps two objects with incompatible interfaces to interoperate.
 * A typical example is using a socket adapter to use a US plug in Indian Sockets.
 */

 // A client uses only this interface.
interface Share{
  public function shareData();
}

// Adaptee/Service Class
class WhatsappShare{
  // This is the API provided by Whatsapp
  public function wShare(String $data){
     echo "Sharing data - $data - via Whatsapp\n";
  }
}

class WhatsappShareAdapter implements Share{
  private $whatsapp;
  private $data;

  public function __construct(WhatsappShare $whatsappShare, String $data)
  {
    $this->whatsapp=$whatsappShare;
    $this->data=$data;
  }

  public function shareData() {
    $this->whatsapp->wShare($this->data);
  }
  
}

// Client is note interested in the technicalities, he just wishes to share the message somehow.
function shareInWhatsapp(Share $share){
  $share->shareData();
}

/*
 * The  below driver logic is similar to sending a message to Whatsapp using the SMS app.
 */
$wshare = new WhatsappShare(); // Analogous to having Whatsapp installed in the mobile.
$share = new WhatsappShareAdapter($wshare,"Hello everyone"); // installing a plugin to share the message from SMS app to Whatsapp.
shareInWhatsapp($share); // Sharing the message.

/*
 * What is the advantages of this?
 * Imagine at some point Whatsapp CEO feels that the function name is wShare is 
 * didn't convey a meaning and change its name to watsupShare,
 * there is only one place to change that in our entire code.
 */ 

