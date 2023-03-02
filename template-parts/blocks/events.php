<?php
//get the current date
$now = date('Y-m-d H:i', time());

//events attr
$events = tribe_get_events( array(
        "start_date" => date('Y-m-d', time()),
        'orderby'        => 'date',
        'order'          => 'ASC',
        'featured'       => true,
        'posts_per_page' => 3));

//get events
if (count($events) < 3) {
    $events_bydate = tribe_get_events(
        array(
        "start_date" => date('Y-m-d', time()),
        'orderby'        => 'date',
        'order'          => 'ASC',
        'featured'       => false,
        'posts_per_page' => 3 - count($events)
    ));
    $events = array_merge($events, $events_bydate);
}
?>
<div class="shock-events-wrapper">
    <div class="shock-events-outer container flex flex-col gap-5">
        <?php 
           foreach($events as $event) :
            if (get_field("external", $event->ID) != "" && in_array("external", get_field("external", $event->ID))) {
                $event_link = get_field("external_link", $event->ID);
            } else {
                $event_link = get_permalink($event->ID);
            }
            ?>

            <div class="shock-event-wrapper text-center p-4 pb-1 bg-primary rounded-sm shadow-md border-b-2 border-b-secondary text-secondary">
                <p class="shock-event-details">
                    <?php 
                    echo tribe_get_start_date($event->ID,$display_time = false, $date_format = "d.m");

                    echo (tribe_get_venue($event->ID) != "" && tribe_get_venue($event->ID) != NULL) ? " | " . tribe_get_venue( $event->ID) : "";
                    ?>
                </p>

                <h3 class="shock-event-title text-6xl nobg mb-0">
                </h3>
                <div class="shock-event-description-wrapper max-h-0 overflow-hiddent transition-all duration-500 ease-in-out">
                    <p class="shock-event-description max-w-lg mx-auto pt-4">
                    </p>
                </div>
                <div class="shock-event-more-button flex w-fit mx-auto transition-transform duration-500 ease-in-out">
                </div>
            </div>
    </div>
</div>
