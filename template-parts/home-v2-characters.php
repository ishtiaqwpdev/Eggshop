<?php
/**
 * Home v2 — Choose Your Egg World (character carousel)
 */

if ( ! function_exists( 'et_home_get_carousel_characters' ) ) {
    $et_home_characters_file = get_template_directory() . '/inc/home-characters.php';

    if ( file_exists( $et_home_characters_file ) ) {
        require_once $et_home_characters_file;
    }
}

$et_home_characters = function_exists( 'et_home_get_characters' )
    ? et_home_get_characters()
    : array();
?>
<section id="et-home-characters" class="et-home__characters" aria-labelledby="et-home-characters-title">
    <div class="et-home__section-inner center">
        <div class="et-home__characters-intro">
            <h2 class="et-home__section-title et-home__characters-title" id="et-home-characters-title">
                Choose Your Egg World
            </h2>
            <p class="et-home__characters-lead">Meet each egg world&rsquo;s personality and story.</p>
        </div>

        <div class="et-home__characters-slider-wrap">
            <ul class="et-home__characters-slider">
                <?php foreach ( $et_home_characters as $item ) :
                    $et_character_visual = ( isset( $item['visual'] ) && 'egg' === $item['visual'] ) ? 'egg' : 'character';
                    ?>
                    <li class="et-home__character-item">
                        <article
                            class="et-home__character-card"
                            style="--et-character-panel: <?php echo esc_attr( $item['panel'] ); ?>; --et-character-accent: <?php echo esc_attr( $item['accent'] ); ?>;"
                        >
                            <div class="et-home__character-media">
                                <div class="et-home__character-figure et-home__character-figure--<?php echo esc_attr( $et_character_visual ); ?>">
                                    <img
                                        src="<?php echo esc_url( $item['image'] ); ?>"
                                        alt="<?php echo esc_attr( $item['name'] ); ?>"
                                        class="et-home__character-image"
                                        loading="lazy"
                                        decoding="async"
                                        draggable="false"
                                    />
                                </div>
                            </div>

                            <div class="et-home__character-body">
                                <h3 class="et-home__character-name"><?php echo esc_html( $item['name'] ); ?></h3>
                                <a href="<?php echo esc_url( $item['url'] ); ?>" class="et-home__card-btn et-home__character-btn">
                                    <span class="et-home__card-btn-label">Learn More</span>
                                    <span class="et-home__card-btn-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h12M13 7l5 5-5 5"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
