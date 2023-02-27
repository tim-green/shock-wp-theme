<div class="shock-hero-wrapper min-h-screen flex items-center py-28">
    <div class="md-container shock-hero flex flex-wrap justify-between">
        <div class="shock-hero-content text-primary w-2/5">
        <h1 class="shock-bigshoulders text-8xl lg:text-9xl nobg"></h1>
        <div class="text-3xl">
            <?php the_field("content"); ?>
        </div>
        <a href="#" class="shock-button shock-more-button shock-button-more text-secondary block text-5xl w-fit mt-8" onclick=" let e = window.event || event;
                    e.preventDefault();
                    let a = e.target.closest('a');
                    let hero = a.closest('.shock-hero-wrapper');
                    hero.nextElementSibling.scrollIntoView({behavior: 'smooth'});">about me
        </a>
    </div>

    <div class="shock-hero-image w-1/2 pl-12">
        <div class="shock-hero-image-container h-full relative">
            <img src="<?php wp_get_attachement_url(get_field("hero_image")["ID"])?>" alt="" class="absloute top-0 left-0 w-full h-full object-cover">
        </div>
    </div>
</div>
