<?php
/**
 * Home v2 — YouTube Subscribe block (reusable)
 */

$et_home_youtube_channel = 'https://www.youtube.com/@EggsTime';
$wrapper_class           = get_query_var( 'et_youtube_subscribe_wrapper', 'et-home__youtube-subscribe' );
?>
<aside class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="et-home__youtube-subscribe-icon" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31.3 31.3 0 0 0 0 12a31.3 31.3 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31.3 31.3 0 0 0 24 12a31.3 31.3 0 0 0-.5-5.8zM9.6 15.6V8.4L15.8 12 9.6 15.6z"/>
        </svg>
    </div>
    <h3 class="et-home__youtube-subscribe-title">Join Our Channel!</h3>
    <p class="et-home__youtube-subscribe-text">Subscribe for new videos, songs, and stories from the Eggs Time world!</p>
    <a
        href="<?php echo esc_url( $et_home_youtube_channel ); ?>"
        class="et-home__youtube-subscribe-btn"
        target="_blank"
        rel="noopener noreferrer"
    >
        Subscribe
    </a>
</aside>
