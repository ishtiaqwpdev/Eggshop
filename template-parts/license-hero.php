<?php
/**
 * License page — hero / banner section (home v2 split layout, static image media)
 */

$et_license_hero_image          = 'http://eggstime.com/wp-content/uploads/2026/07/Gemini_Generated_Image_wmpwnnwmpwnnwmpw.png';
$et_license_hero_image_width    = 1920;
$et_license_hero_image_height   = 1080;
$et_license_hero_btn_arrow      = '<svg class="et-home__hero-btn-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path fill="none" d="M8 5l8 7-8 7" stroke="#098BE5" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<div class="et-home et-license__hero-wrap">
<section
    class="et-home__hero et-home__hero--split-video et-home__playful-section"
    aria-label="<?php esc_attr_e( 'License Eggs Time Brands', 'eggs-shop' ); ?>"
>
    <div class="et-home__hero-inner center">
        <div class="et-home__hero-grid">
            <div class="et-home__hero-content">
                <p class="et-home__hero-badge">
                    <span class="et-home__hero-badge-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l2.9 6.9 7.5.6-5.7 4.9 1.7 7.3L12 18.8 5.6 21.7l1.7-7.3L1.6 9.5l7.5-.6L12 2z"/>
                        </svg>
                    </span>
                    Partner with the Eggs Universe
                </p>

                <h1 class="et-home__hero-title">
                    <span class="et-home__hero-title-line">License</span>
                    <span class="et-home__hero-title-line">
                        <span class="et-home__hero-title-accent">Eggs Time Brands</span>
                    </span>
                </h1>

                <p class="et-home__hero-text">
                    Partner with Eggs Time to bring our beloved characters, surprise eggs, toys, and educational products to more families around the world. Great brands. Happy kids. Strong business.
                </p>

                <div class="et-home__hero-actions">
                    <a href="#et-license-contact" class="et-home__hero-btn et-home__hero-btn--primary">
                        <span class="et-home__hero-btn-label">Request Licensing Information</span>
                        <span class="et-home__hero-btn-icon" aria-hidden="true">
                            <?php echo $et_license_hero_btn_arrow; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </span>
                    </a>
                </div>
            </div>

            <div class="et-home__hero-media">
                <div class="et-home__hero-video-stack">
                    <div class="et-home__hero-video-frame">
                        <div
                            class="et-home__hero-video-wrap et-license__hero-media-static"
                            style="--et-home-hero-poster-aspect-ratio: <?php echo (int) $et_license_hero_image_width; ?> / <?php echo (int) $et_license_hero_image_height; ?>; --et-home-hero-video-aspect-ratio: <?php echo (int) $et_license_hero_image_width; ?> / <?php echo (int) $et_license_hero_image_height; ?>;"
                        >
                            <img
                                class="et-home__hero-video-fallback et-license__hero-image"
                                src="<?php echo esc_url( $et_license_hero_image ); ?>"
                                alt="<?php esc_attr_e( 'Eggs Time licensing banner', 'eggs-shop' ); ?>"
                                width="<?php echo (int) $et_license_hero_image_width; ?>"
                                height="<?php echo (int) $et_license_hero_image_height; ?>"
                                loading="eager"
                                decoding="async"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
