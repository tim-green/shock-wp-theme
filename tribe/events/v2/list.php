<?php
/**
 * View: List View
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.2.1
 *
 * @var array    $events               The array containing the events.
 * @var string   $rest_url             The REST URL.
 * @var string   $rest_method          The HTTP method, either `POST` or `GET`, the View will use to make requests.
 * @var string   $rest_nonce           The REST nonce.
 * @var int      $should_manage_url    int containing if it should manage the URL.
 * @var bool     $disable_event_search Boolean on whether to disable the event search.
 * @var string[] $container_classes    Classes used for the container of the view.
 * @var array    $container_data       An additional set of container `data` attributes.
 * @var string   $breakpoint_pointer   String we use as pointer to the current view we are setting up with breakpoints.
 */

if (count($events) == 0) {
    echo(<<<EOD
    <script>window.location.href="{$prev_url}&forcedPast"</script>
    EOD
    );
}

if (!isset($_GET["eventDisplay"]) || $_GET["eventDisplay"] != "past") {
    $title = "Current Events";
} else {
    $title = "Past Events";
}
?>

<div class="shock-hero-container pt-36 pb-12 mb-12 bg-primary">
    <div class="shock-hero-inner md-container">
        <h1 class="bg-seconday"><span class="text-primary"><?php echo $title;?> </span>
        </h1>
    </div>
</div>

<div class="shock-events-list md-container">
    <div class="shock-events-wrapper">
        <div class="shock-events-outer flex flex-col gap-5">
        <?php
            foreach($events as $event) :
                if (get_field("external", $event->ID) != "" && in_array("external", get_field("external", $event->ID))) {
                    $event_link = get_field("external_link", $event->ID);
                } else {
                    $event_link = get_permalink($event->ID);
                }
            ?>

            <div class="shock-fp-event-wrapper text-center p-4 pb-1 bg-primary rounded-sm shadow-md border-b-2 border-b-secondary text-secondary">
                <p class="shock-event-details">
                <?php echo tribe_get_start_date($event->ID, $display_time = false, $date_format = "d.m.") ?><?= (tribe_get_venue($event->ID) != "" && tribe_get_venue($event->ID) != NULL) ? " | " . tribe_get_venue( $event->ID) : "" ?>
                </p>

                <h3 class="shock-event-title text-6xl nobg mb-0">
                    <a href="<?php echo $event_link ?>" class="shock-noline">
                        <?php echo $event->post_title ?>
                    </a>
                </h3>
                <div class="shock-event-description-wrapper max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <p class="shock-event-description max-w-lg mx-auto pt-4">
                        <?php echo get_the_excerpt($event->ID) ?>
                    </p>
                    <a href="<?php echo $event_link ?>" class="block mt-2 w-fit mx-auto">Learn more</a>
                </div>
                <div class="shock-event-more-button flex w-fit mx-auto transition-transform duration-500 ease-in-out">
                    <i class="inline w-14 h-14 cursor-pointer" data-feather="chevrons-down"></i>
                </div>
            </div>
                <?php endforeach; ?>
        </div>
        <div class="flex-justify-between w-full mt-12">
        <?php if (!empty($prev_url)) : ?>
            <a href="<?= $prev_url ?>"><< Past Events</a>
            <?php endif; ?>
            <?php if (!isset($_GET["forcedPast"])) :?>
            <a href="<?= $today_url ?>"<?= (!$prev_url) ? "class='m-auto'" : "" ?>> Today</a>
            <?php  endif; ?>
        </div>
    </div>
</div>