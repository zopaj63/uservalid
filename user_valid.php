<?php

/*
Implementirajte klasu UserValidator koja provjerava valjanost podataka korisnika. 
U try bloku, provjerite jesu li zadani podaci valjani, a u catch bloku uhvatite iznimku 
i ispišite odgovarajuću poruku. Traženi podatci su ime, email i godine. Instancirajte objekt i 
tražene podatke proslijedite kroz konstruktor.

Nakon toga, zadatak riješite pomoću HTML forme.
*/

if(isset($_POST['submit']))
{
    $ime=$_POST['ime'];
    $mail=$_POST['mail'];
    $godine=$_POST['godine'];
}


class UserValidator
{
    private $ime;
    private $mail;
    private $godine;

    public function __construct($ime, $mail, $godine)
    {
        $this->ime=$ime;
        $this->mail=$mail;
        $this->godine=$godine;
    }

    public function valid()
    {
        try
        {
            if(!empty($this->ime))
            {
                echo "<p>Ime: ".$this->ime."</p>";
            }

            if(!empty($this->mail))
            {
                echo "<p>e-mail: ".$this->mail."</p>";
            }

            if(!empty($this->godine))
            {
                echo "<p>Godine: ".$this->godine."</p>";
            }
            else
            {
                throw new Exception ("<p>polja nisu ispunjena u cjelosti</p>");
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

        try{
            if(filter_var($this->ime, FILTER_SANITIZE_STRING)==true)
            {
                echo "<p>Ime ".$this->ime." je ispravnog formata</p>";
            }
            else
            {
                throw new Exception ("<p>neispravno ime</p>");
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

        try{
            if(filter_var($this->mail, FILTER_VALIDATE_EMAIL)==true)
            {
                echo "<p>E-mail ".$this->mail." je ispravnog formata</p>";
            }
            else
            {
                throw new Exception ("<p>neispravan mail</p>");
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

        try{
            if(filter_var($this->godine, FILTER_VALIDATE_INT)==true)
            {
                echo "<p>Godine ".$this->godine." je ispravnog formata</p>";
            }
            else
            {
                throw new Exception ("<p>neispravane godine</p>");
            }
        }

        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}


$provjera=new UserValidator($ime, $mail, $godine);
$provjera->valid();

?>

<!-- HTML forma -->
<h1>UserValidator</h1>
<p>Unesite podatke:</p>

<form action="" method="post">
    <input type="text" name="ime" placeholder="ime"><br><br>
    <input type="text" name="mail" placeholder="e-mail"><br><br>
    <input type="number" name="godine" placeholder="broj godina"><br><br>
    
    <input type="submit" name="submit" value="Pošalji">
</form>

<br>
<a href="">GitHub kod</a>