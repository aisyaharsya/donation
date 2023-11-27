<?php
session_start();

//BASEURL
include '../../application/config.php';

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = '338726790120-ba9dgdh6f8noju1gr0ok60399h0vd1ub.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = BASEURL.'/vendors/login-google/google.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>
