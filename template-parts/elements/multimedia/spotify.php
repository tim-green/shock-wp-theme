
<?php
    //for ACF
    $id = $args["ID"];

    // for spotify
    $type = explode(":", $id)[1];
    $uri = explode(":", $id)[2];
?>

<iframe src="//open.spotify.com/embed/<?php $type; ?>/<?php $uri;?>" width="100%" height="355" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>