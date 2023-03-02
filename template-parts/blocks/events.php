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
</div>
