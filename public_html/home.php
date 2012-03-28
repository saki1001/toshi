<? extend('index.php') ?>

<? startblock('variables') ?>
    <?
        $INDEXPAGE='YES';
        $ACTIVEPAGE='home';
        $PAGETITLE='Home';
    ?>
<? endblock() ?>

<? startblock('content') ?>
<div class="slideshow">
    <div class="slide">
        <img src="images/banner-bar.jpg" alt="The Bar">
    </div>
<section id="events">
    <h3>Upcoming Events</h3>
    <article class="event">
        <img src="http://www.placehold.it/120x80" width="120" height="80" alt="thumbnail" />
        <h2>Event Title</h2>
        <ul>
            <li>Event Date</li>
            <li>Event Summary</li>
        </ul>
    </article>
</section>
<section id="restaurant">
    <h2>Toshi's Restaurant</h2>
</section>
<? endblock() ?>

<? end_extend() ?>