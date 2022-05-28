<?php $title="-contact";
require 'form.php';
// print_r($_POST);
// @$nom=$_POST["name"];
// @$email=$_POST["e-mail"];
// @$subject=$_POST["subject"];
// @$message=$_POST["text"];
// @$valider=$_POST["valider"];
$erreur="";
if (isset($valider)) {
  if (empty($nom)) $erreur= "<li>Nom laissé vide!</li>";
  if (empty($email)) $erreur= "<li>email laissé vide!</li>";
  if (empty($subject)) $erreur= "<li>Sujet laissé vide!</li>";
  if (empty($text)) $erreur= "<li>Votre message laissé vide!</li>";
}

require 'header_first.php'; ?>
<!-- <form class="needs-validation" novalidate>
    <form action="https://formspree.io/f/xayaklwa" method="post" id="my-form">
    <h3>- Nom :</h3><input type="text" id="your-name" name="your-name" size="40" aria-required="true" aria-invalid="false" placeholder="Votre Nom" required>
    <h3>-Email :</h3><input type="email" id="your-email" name="your-email" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Votre e-mail" required>
    <h3>- Sujet :</h3><input type="text" id="your-subject" name="your-subject" size="40" aria-invalid="false" placeholder="Votre sujet" required>
    <h3>- Message :</h3><textarea id="your-message" name="your-message" cols="40" rows="5" aria-invalid="false" placeholder="Message" required></textarea><br>
    <label >Vous pouvez deposez une photo pour une meilleur description de probleme:</label><br>
    <input type="file">
    <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
    <button type="submit" id="Envoyer">Envoyer</button>
    <div id="status"></div>
    </form> -->
<!-- <div class="contact_container">
    <div class="contactez-nous">
        <h1>Contactez-nous</h1>
        <p>Un problème, une question, envie de nous envoyer un message d’amour ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec nous !</p>
        <form action="/page-traitement-donnees" method="post">
            <div>
            <label for="nom">Votre nom</label>
            <input type="text" id="nom" name="nom" placeholder="Martin" required>
            </div>
            <div>
            <label for="email">Votre e-mail</label>
            <input type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
            </div>
            <div>
            <label for="sujet">Quel est le sujet de votre message ?</label>
            <select name="sujet" id="sujet" required>
            <option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
            <option value="probleme-compte">Problème avec mon compte</option>
            <option value="question-produit">Question à propos d’un produit</option>
            <option value="suivi-commande">Suivi de ma commande</option>
            <option value="autre">Autre...</option>
            </select>
            </div>
            <div>
            <label for="message">Votre message</label>
            <textarea id="message" name="message" placeholder="Bonjour, je vous contacte car...." required></textarea>
            </div>
            <div>
            <button type="submit">Envoyer mon message</button>
            </div>
        </form>
    </div>
</div> -->
<div class="bodycont">
  <br>
  <div class="form_container">
    <div class="map">
      <iframe src="https://maps.google.com/maps?q=Carlcare-Mohamed%20phone%20IOS,%20Residence%20Marjana%20RDC,%20IMM%20293APT%206,%20Bd%20Abdelmoumen,%20Casablanca%2020000&t=&z=19&ie=UTF8&iwloc=&output=embed" width="100%" height="800px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="contact-form">
      <h1 class="title">Contactez-Nous</h1>
      <h2 class="subtitle">Cher client, Nous somme a votre service.</h2>
      <form name="fo" action="" method="post">
        <input type="text" name="nom" placeholder="Votre Nom" value="<?php echo @$nom?>" />
        <input type="email" name="email" placeholder="Votre adresse Email" value="<?php echo @$email?>" />
        <input type="text" name="subject" placeholder="sujet" />
        <textarea name="text" id="" rows="8" placeholder="Votre Message" value="<?php echo @$message?>"></textarea>
        <button name="valider" value="Valider" class="btn-send">Soumettre</button>
      </form>
      <?php if(!empty($erreur)):?>
      <div class="errorcontainer">
        <?php echo $erreur;?>
      </div>
      <?php endif?>
    </div>
  
  </div>
  <br><br>
</div>
<div class="footeremp">
  <?php require 'footer_first.php';?>
</div>