<?php
  require("Services/Twilio.php");
  require("database.php");

  $response = new Services_Twilio_Twiml();
  
  if (empty($_POST["Digits"])) {
    $gather = $response->gather(array('numDigits' => 6));
    $gather->say("Please enter your verification code.");
  }
  else {
    // grab db record and check for match
    $result = db(sprintf("select * from numbers where phone_number='%s'", $_POST["Called"]));
    if($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      if ($_POST["Digits"] === $line["verification_code"]) {
        db(sprintf("UPDATE numbers SET verified = 1 WHERE phone_number = '%s'", $_POST["Called"]));
        $response->say("Thank you! Your phone number has been verified.");
      }
      else {
        // if incorrect, prompt again
        $gather = $response->gather(array('numDigits' => 6));
        $gather->say("Verification code incorrect, please try again."); 
      }
    }
    mysql_close();
  }

  print $response;
?>