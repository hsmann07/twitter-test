
<?php

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

if (!empty($_GET['q'])) {

    $query = htmlspecialchars($_GET['q']);

    $conn = new TwitterOAuth(
        '4sIL44h4kXV0OwZE6X2ts549G',
		'6yZ7hlbXOBBmgZTjhVd0CUGzOiElODsxrH1w7wZAuWD0OR47wk',
        '943023864962887680-mzbA8bogvzpXPAeSTt4YJ1uxsNsGzdK',
        'v7MiYghPAGiEExloB0juaCEYJwqCJetS73e84SHdLU2B9'
    );

    $tweets = $conn->get("search/tweets", ['q' => $query, 'count' => '10', 'include_entities'=> false, 'lang' => 'en']);

    foreach ($tweets->statuses as $tweet) {
        print_r($tweet->text);
        echo '<br/>';
    }

} else {
    echo 'Empty query';
}

?>
