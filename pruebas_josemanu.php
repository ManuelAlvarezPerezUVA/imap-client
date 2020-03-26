<?PHP

require_once "Imap.php";

$mailbox = 'mail.gdpempresa.com';
$username = 'automaticos@gdpempresa.com';
$password = '5Sm3k7?t';
$encryption = 'tls'; // or ssl or ''

// open connection
$imap = new Imap($mailbox, $username, $password, $encryption);

// stop on error
if($imap->isConnected()===false)
    die($imap->getError());

// get all folders as array of strings
$folders = $imap->getFolders();
foreach($folders as $folder)
    echo $folder.'<br/>';

// select folder Inbox
$imap->selectFolder('INBOX');

// count messages in current folder
$overallMessages = $imap->countMessages();
$unreadMessages = $imap->countUnreadMessages();

echo "mensajes".$overallMessages.'<br/>';
echo "mensajes no leidos".$unreadMessages.'<br/>';

// fetch all messages in the current folder
$emails = $imap->getMessages();
//var_dump($emails);
 //var_dump($imap->getAttachment($emails[2]['uid'],0));
 //var_dump($emails[0]);




 $servidor = $mailbox;
 $usuario = $username;
 $pass = $password;
 $puerto = '25';
 $remitente = 'Manu';
 $cuerpo = 'Bla bla bla';

 // Envio de Mail
 include_once 'phpMailer/PHPMailerAutoload.php';
 date_default_timezone_set ( 'Etc/UTC' );

 $mail = new PHPMailer ();
 $mail->isSMTP ();
 $mail->SMTPDebug = 0;
 $mail->Debugoutput = 'html';

 $mail->Host = $servidor;
 $mail->Port = $puerto;
 $mail->SMTPAuth = true;
 $mail->Username = $usuario;
 $mail->Password = $pass;
 //$mail->SMTPSecure = "tls";


 $email = 'jisanz73@gmail.com';
 $mail->addAddress($email);
 $email = 'manuel@gdpsoft.com';
 $mail->addAddress($email);
 $mail->setFrom ( $email,  $remitente);

$cuerpo_mail = $cuerpo;

 $mail->Subject = 'Asunto phpmailer';

 $mail->msgHTML ( $cuerpo_mail );
 $mail->isHTML(true);
 $mail->CharSet = 'UTF-8';

 if (! $mail->send ()) {
   echo "Cagada";
   exit;
 }

$mail_string = $mail->getSentMIMEMessage();

echo "Sent".$imap->sent($mail_string);



// add new folder for archive
// $boLCreate = $imap->addFolder('INBOX.JoseManu3', true);
// echo "Creacion".$boLCreate.'<br/>';
// echo "Imap=".$mailbox.'<br/>';
// move the first email to archive
// $imap->moveMessage($emails[0]['uid'], 'INBOX.JoseManu');

// delete second message
// $imap->deleteMessage($emails[1]['uid']);
