<?php
/**
 * Home v2 — Learn and Joy + Eggs Time Games (footer-adjacent stack)
 */

if ( ! function_exists( 'et_home_get_games_extra_cards' ) ) {
    require_once get_template_directory() . '/inc/home-games.php';
}

$theme_uri                  = get_template_directory_uri();
$games_url                  = function_exists( 'get_permalink' ) ? get_permalink( 617 ) : home_url( '/games/' );
$et_home_games_cards        = et_home_get_games_extra_cards( $theme_uri );
$et_home_game_store_badges  = et_home_get_game_app_store_badges( $theme_uri );
$et_home_game_rating_badges = et_home_get_game_rating_badge_images( $theme_uri );

if ( empty( $games_url ) || '#' === $games_url ) {
    $games_url = home_url( '/games/' );
}
?>
<section class="et-home__games-extra" aria-label="<?php esc_attr_e( 'Eggs Time Games', 'eggs-shop' ); ?>">
    <div class="et-home__games-extra-inside">
        <div class="center et-home__games-extra-inside-inner">
            <h2 class="et-home__games-extra-inside-title">
                Learn and Joy!<br>
                <span>Find the game inside the eggs!</span>
            </h2>
            <img
                src="<?php echo esc_url( $theme_uri . '/images/inside_image.jpg' ); ?>"
                alt=""
                class="et-home__games-extra-inside-img"
                loading="lazy"
                decoding="async"
            />
        </div>
    </div>

    <div class="et-home__games-extra-main">
        <div class="center et-home__games-extra-main-inner">
            <div class="et-home__games-extra-layout">
                <div class="et-home__games-extra-intro">
                    <h2 class="et-home__games-extra-title">
                        <a href="<?php echo esc_url( $games_url ); ?>">Eggs time Games</a>
                    </h2>
                    <p class="et-home__games-extra-subtitle">
                        Start exploring this fun and<br>educational world
                    </p>

                    <div class="et-home__games-extra-market">
                        <a
                            href="<?php echo esc_url( $et_home_game_store_badges['play']['url'] ); ?>"
                            class="et-home__games-extra-market-link et-home__games-extra-market-link--play"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img
                                src="<?php echo esc_url( $et_home_game_store_badges['play']['image'] ); ?>"
                                alt="<?php echo esc_attr( $et_home_game_store_badges['play']['label'] ); ?>"
                                loading="lazy"
                                decoding="async"
                            />
                        </a>
                        <a
                            href="<?php echo esc_url( $et_home_game_store_badges['app']['url'] ); ?>"
                            class="et-home__games-extra-market-link et-home__games-extra-market-link--app"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img
                                src="<?php echo esc_url( $et_home_game_store_badges['app']['image'] ); ?>"
                                alt="<?php echo esc_attr( $et_home_game_store_badges['app']['label'] ); ?>"
                                loading="lazy"
                                decoding="async"
                            />
                        </a>
                    </div>

                    <div class="et-home__games-extra-ratings" aria-hidden="true">
                        <?php foreach ( $et_home_game_rating_badges as $badge_image ) : ?>
                            <span class="et-home__games-extra-ratings-badge">
                                <img
                                    src="<?php echo esc_url( $badge_image ); ?>"
                                    alt=""
                                    loading="lazy"
                                    decoding="async"
                                />
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="et-home__games-extra-slider-wrap">
                    <ul class="et-home__games-extra-slider">
                        <?php foreach ( $et_home_games_cards as $game ) : ?>
                            <li class="et-home__games-extra-slide">
                                <a href="<?php echo esc_url( $game['url'] ); ?>" target="_blank" rel="noopener noreferrer">
                                    <img
                                        src="<?php echo esc_url( $game['image'] ); ?>"
                                        alt="<?php echo esc_attr( $game['title'] ); ?>"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
