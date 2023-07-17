<?php
/*
Implementirajte klasu EmailSender koja šalje email poruku. U try bloku, pokušajte poslati email, 
a u catch bloku uhvatite iznimku i ispišite odgovarajuću poruku.
*/

class EmailSender
{
    private $poruka;
    private $email;
    private $recipient;
    private $subject;


    public function __construct($poruka, $email)
    {
        $this->poruka=$poruka;
        $this->email=$email;
    }

    public function sendMail()
    {
        if(isset($_POST['submit']))
        {
            $poruka=$_POST['poruka'];
            $email=$_POST['email'];

        }

        try 
        {
                // Provjera unosa poruke
                if (empty($_POST['poruka'])) {
                    throw new Exception('Unesite poruku.');
                }

                // Provjera unosa e-mail adrese
                if (empty($_POST['email'])) {
                    throw new Exception('Unesite e-mail adresu.');
                }
                
                // Provjera ispravnosti e-mail adrese
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception('Unesite ispravnu e-mail adresu.');
                }
                
                // echo $poruka, $email, $subject;

                // slanje maila
                $recipient="zoran.pajnic@gmail.com, $this->email";
                $subject="Poruka od frendača iz BackEndDev!";

                $mailBody="Mail od $this->email\n Poruka: $this->poruka\n\n";
                
                // send mail
                mail($recipient, $subject, $emailBody);

                // redirekt na poruku o uspješnom slanju
                header("Location: hvala.html");

        } 
        
        catch (Exception $e) 
        {
            echo 'Greška: ' . $e->getMessage();
        }
    }
}

$posalji=new EmailSender($poruka, $email);
$posalji->sendMail();

?>


<!-- html forma -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmailSender</title>
</head>
<body>
    <h1>EmailSender</h1>
    <p>Unos e-mail adrese i poruke:</p>
    <form action="" method="post">
        <label>email</label>
        <input type="text" name="email"/>
        <br/><br/>
        <label>poruka</label>
        <input type="text" name="poruka"/>
        <br/><br/>
        <input type="reset" name="reset" value="Poništi"/>
        <br/><br/>
        <input type="submit" name="submit" value="Pošalji mail"/>
    </form>
    <br><br>
<a href="https://github.com/zopaj63/uservalid" target="_blank">GitHub kod</a>
</body>
</html>