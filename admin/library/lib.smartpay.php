<?php
/**
 * Smart Payment Class
 * All paymodes: 0908172=>MTN, 0908173=>Airtel, 0908174=>Vodafone, 0908175=>TiGo
 * Suported Networks: MTN, Airtel, Vodafone, Tigo
 * BY: Reggie Gyan @ Orcons Systems - powered by Orcons Systems.
 */

define('SMART_API_URL',"https://smartpaygh.com/api/index.php?");
define('SMART_API_KEY','GET IT FROM ACCOUNT ON SMARTPAY WEBSITE');
define('SMART_SECRET_KEY','GET IT FROM ACCOUNT ON SMARTPAY WEBSITE');

class smartpay{

  public function momo_payment($paymode,$phonenumber,$payamount,$network,$description=null,$voucher_code=null){
    $payload = [
        'apiKey' => SMART_API_KEY,
        'secretKey' => SMART_SECRET_KEY,
        'action' => 'makepayment',
        'payaccountno' => $phonenumber, // Phone number to deduct
        'payamount' => $payamount, // amount to deduct
        'currency' => 'GHS',
        'voucher_code' => $voucher_code,
        'description' => $description, // Required
        'paymode' => $paymode, // All paymodes: 0908172=>MTN, 0908173=>Airtel, 0908174=>Vodafone, 0908175=>TiGo
        'nw' => $network // all: MTN, Airtel, Vodafone, Tigo
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => SMART_API_URL.http_build_query($payload),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_SSL_VERIFYPEER=> false,
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
      ),
    ));
  
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function card_payments($cardnumber,
  $cardholder,$cardexpirydate,$cardccc,$payamount,$description=null){
    $payload = [
        'apiKey' => SMART_API_KEY,
        'secretKey' => SMART_SECRET_KEY,
        'action' => 'makepayment',
        'cardnumber' => $cardnumber, // Card number to deduct
        'cardholder' => $cardholder, // Full Name on card
        'payamount' => $payamount, // amount to deduct
        'currency' => 'GHS',
        'description' => $description, // Required
        'cardcc' => $cardccc, // Three Digit Number behind the card
        'cardexpirydate' => $cardexpirydate // When is the card invalid date
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => SMART_API_URL.http_build_query($payload),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_SSL_VERIFYPEER=> false,
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
      ),
    ));
  
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
  
}

