<div class="shock-hero-container pt-36 pb-12 mb12 bg-primary<?php ($args['featured_image']) ?'has-thumbnail': ''?>">

    <div class="shock-hero-inner md-container">
        <h1 class="bg-secondary">
            <span class="text-primary">
                <?php
                    $args["title"]
                ?>
            </span>
        </h1>
    </div>

    <?php if ($args["featured_image"]): ?>
    <div class="shock-pageheader-thumbnail">
        <img src="<?php $args["featured_image"]?>" alt="<?php $args["title"]?>">
    </div>
    <?php 
        endif;
    ?>
</div>