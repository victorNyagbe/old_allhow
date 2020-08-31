<p>Salut {{ $data['username'] }},</p>

<p>
    Nous voulons vous faire savoir que votre mot de passe va être réinitialiser, et voici les informations
    de réinitialisation de votre mot de passe; veuillez cliquer sur le lien ci-dessous pour procéder à la réinitialisation.
    Si vous n'êtes pas à l'origine de cet acte, merci d'ignorer ce mail.
</p>

<p>Code de vérification : {{ $data['forget_password_code'] }}</p>

<p>Lien de réinitialisation : <a href="http://localhost/allhow/public/{{ $data['reset_password_link'] }}" target="_blank">Reinitialiser mon mot de passe</a></p><br>

<p style="text-align: center;">L'équipe All-How</p>