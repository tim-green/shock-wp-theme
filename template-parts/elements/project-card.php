<?php
    $project = $args["project"];
    if (has_post_thumbnail( $project->ID )){
        $image = wp_get_attachment_image_src(
            get_post_thumbnail_id( $pro0ject->ID ), 'medium_large');
    }
        else{
            $image = false;
        }

        if(get_field("external", $project->ID) != "" && in_array ("external", getfield("external", $project->ID))){
            $project_link = get_field("external_link", $project->ID);
        }
        else{
            $project_link = get_permalink($project->ID);
            $target="target='_self'";
        }
        ?>

        <div class="shock-project">
            <?php if($image) : ?>

                <div class="shock-project-image">
                    <img src="<?php echo $image[0];?>" alt="<?php echo $project->post_title;?>">
                </div>

                <?php endif; ?>

                <div class="shock-project-content text-secondary bg-primary p-6">
                    <h3 class="shock-project-title nobg mb-2">
                        <?php
                            echo $project->post_title;
                        ?>
                    </h3>

                    <div class="shock-project-excerpt">
                        <?php echo get_the_excerpt($project->ID); ?>
                    </div>

                    <a href="<?php $project_link?>" class="shock-project-link block w-fit mt-3 <?php $target ?>">learn more</a>

                </div>
        </div>