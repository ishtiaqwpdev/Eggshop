<?php
/**
 * License page — hero / banner section
 * Home-v2 split video layout; left column keeps only title, text, and CTA.
 */

$et_license_hero_video_url     = 'https://eggstime.com/wp-content/uploads/2026/07/51be273fce2746bcbecc5fda78856c43.mp4';
$et_license_hero_video_poster  = 'https://eggstime.com/wp-content/uploads/2026/07/Gemini_Generated_Image_wmpwnnwmpwnnwmpw.png';
$et_license_hero_poster_width  = 1920;
$et_license_hero_poster_height = 1080;
$et_license_hero_video_width   = 1920;
$et_license_hero_video_height  = 1080;
?>
<div class="et-home et-license-home-hero">
    <section
        class="et-home__hero et-home__hero--split-video et-home__playful-section et-license__hero"
        aria-label="<?php esc_attr_e( 'License Eggs Time Brands', 'eggs-shop' ); ?>"
        data-hero-video="<?php echo esc_url( $et_license_hero_video_url ); ?>"
    >
        <div class="et-home__hero-inner center">
            <div class="et-home__hero-grid">
                <div class="et-home__hero-content et-license-home-hero__content">
                    <h1 class="et-home__hero-title et-license-home-hero__title">
                        <span class="et-license-home-hero__title-kicker">License</span>
                        <span class="et-license-home-hero__title-brand">Eggs Time Brands</span>
                    </h1>

                    <p class="et-home__hero-text et-license-home-hero__text">
                        Partner with Eggs Time to bring our beloved characters, surprise eggs, toys, and educational products to more families around the world. Great brands. Happy kids. Strong business.
                    </p>

                    <div class="et-home__hero-actions et-license-home-hero__actions">
                        <a href="#et-license-contact" class="et-license-home-hero__btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2 5 5h-5V4zM8 13h8v2H8v-2zm0 4h5v2H8v-2z"/>
                            </svg>
                            Request Licensing Information
                        </a>
                    </div>
                </div>

                <div class="et-home__hero-media">
                    <div class="et-home__hero-video-stack">
                        <div class="et-home__hero-video-frame">
                            <div
                                class="et-home__hero-video-wrap"
                                style="--et-home-hero-poster-aspect-ratio: <?php echo (int) $et_license_hero_poster_width; ?> / <?php echo (int) $et_license_hero_poster_height; ?>; --et-home-hero-video-aspect-ratio: <?php echo (int) $et_license_hero_video_width; ?> / <?php echo (int) $et_license_hero_video_height; ?>;"
                            >
                                <video
                                    class="et-home__hero-video"
                                    src="<?php echo esc_url( $et_license_hero_video_url ); ?>"
                                    width="<?php echo (int) $et_license_hero_video_width; ?>"
                                    height="<?php echo (int) $et_license_hero_video_height; ?>"
                                    data-video-width="<?php echo (int) $et_license_hero_video_width; ?>"
                                    data-video-height="<?php echo (int) $et_license_hero_video_height; ?>"
                                    muted
                                    loop
                                    playsinline
                                    preload="metadata"
                                    poster="<?php echo esc_url( $et_license_hero_video_poster ); ?>"
                                ></video>
                                <img
                                    class="et-home__hero-video-fallback"
                                    src="<?php echo esc_url( $et_license_hero_video_poster ); ?>"
                                    alt=""
                                    width="<?php echo (int) $et_license_hero_poster_width; ?>"
                                    height="<?php echo (int) $et_license_hero_poster_height; ?>"
                                    loading="eager"
                                    decoding="async"
                                />
                                <button
                                    type="button"
                                    class="et-home__hero-video-play"
                                    aria-label="<?php esc_attr_e( 'Play video', 'eggs-shop' ); ?>"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </button>
                                <button
                                    type="button"
                                    class="et-home__hero-video-sound"
                                    aria-label="Turn sound on"
                                    aria-pressed="false"
                                >
                                    <span class="et-home__hero-video-sound-icon et-home__hero-video-sound-icon--off" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 5 6 9H3v6h3l5 4V5z"/>
                                            <line x1="23" y1="9" x2="17" y2="15"/>
                                            <line x1="17" y1="9" x2="23" y2="15"/>
                                        </svg>
                                    </span>
                                    <span class="et-home__hero-video-sound-icon et-home__hero-video-sound-icon--on" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 5 6 9H3v6h3l5 4V5z"/>
                                            <path d="M15.54 8.46a5 5 0 010 7.07"/>
                                            <path d="M19.07 4.93a10 10 0 010 14.14"/>
                                        </svg>
                                    </span>
                                    <span class="et-home__hero-video-sound-label">Sound On</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
