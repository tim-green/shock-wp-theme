<?php
    $project = get_posts(array(
        'post_type' => 'projects',
        'posts_per_page' => 3
    ));
?>

<div class="container shock-projects-wrapper">
    <div class="shock-projects-gallery flex flex-wrap">
        <?php 
            foreach($projects as $project) : get_template_part("template-parts/elements/project-card", "", array("project" => $project));
            endforeach;
        ?>
    </div>
</div>