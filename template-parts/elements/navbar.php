<div class="shock-navbar-wrapper fixed z-50 top-0 left-0 flex w-full<?= ($args["isFrontpage"]) ? "" : " bg-ocean" ?>">
    <div class="md-container shock-navbar-inner flex justify-between w-full py-2 items-center">
        <div class="shock-navbar-logo flex justify-center">
            <a class="shock-logo shock-noline shock-bigshoulders py-3 px-4 bg-primary text-secondary leading-none text-4xl text-center border-2 border-secondary" href="/">Shock</a>
        </div>
        <div class="shock-navbar-menu flex justify-end">
            <div class="shock-navbar-menubutton border-2 border-secondary bg-secondary">
                <button class="shock-navbar-tofuburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="shock-main-menu-container fixed top-0 right-0 z-30 w-full sm:w-fit sm:max-w-full text-white bg-secondary px-6 sm:px-16 py-24 h-full flex flex-col overflow-y-auto" style="transform: translateX(100%)">
    <div class="shock-main-nav-content my-auto">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'shock-main-nav',
            'container' => false,
            'menu_class' => 'shock-main-menu flex flex-col gap-12',
            'menu_id' => 'shock-main-menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s text-4xl font-bold">%3$s</ul>'
        ) );
        ?>
    </div>
</div>