<?php
// Kod przetwarzania formularza...

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sprawdź weryfikację CAPTCHA
  $recaptcha_secret = "6LfALSUmAAAAADC8lRDky73i1OwU2n_WNGGxSNKy";
  $response = $_POST['g-recaptcha-response'];

  $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$response}");
  $captcha_success = json_decode($verify);

  if ($captcha_success->success) {
    // Kod do wykonania, jeśli CAPTCHA została zweryfikowana poprawnie
    // Przetwarzanie danych formularza...
    echo "CAPTCHA zweryfikowana. Formularz może być przetworzony.";
  } else {
    // Kod do wykonania, jeśli CAPTCHA nie została zweryfikowana poprawnie
    echo "Błąd weryfikacji CAPTCHA. Spróbuj ponownie.";
  }
}
?>
