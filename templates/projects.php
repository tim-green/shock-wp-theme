<?php
/*
* Template Name: Project Layout
* Template Post Type: page
*/

get_header();

$the_query = new WP_Query(array(
    "post_type" => "projects",
    "post_per_page" => 6,
    "status" => "publish",
    "order" => "DESC",
    "paged" => get_query_var("paged") ?  get_query_var("paged") : 1
    ));

    $projects = $the_query->posts;
    get_template_part( "template/parts/elements/page-header", "", array(
        "titles" => get_the_title(),
        "subtitle" => get_field("subtitle"),
        "featured_image" => get_the_post_thumbnail_url()
    ));
?>

<main class="md-container" id="shock-main-page-content">
    <div class="shock-content-container">
        <?php the_content(); ?>
    </div>

    <!-- project gallery -->
    <div class="shock-projects-gallery flex flex-wrap mt-12">
    <?php
        foreach($projects as $project) :
            get_template_part("template-parts/elements/project-card", "", array("project"=> $project)
        );
        endforeach;
    ?>
    </div>
    <div class="shock-projects-pagination mt-8">
    </div>
</main>
<?php     get_footer();?>