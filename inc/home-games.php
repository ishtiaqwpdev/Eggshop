<?php
/**
 * Home v2 — official game showcase images from the Games category.
 */

if ( ! function_exists( 'et_home_resolve_game_image_url' ) ) {
    /**
     * Normalize an ACF/image field value to a URL string.
     *
     * @param mixed $image Image field value.
     * @return string
     */
    function et_home_resolve_game_image_url( $image ) {
        if ( empty( $image ) ) {
            return '';
        }

        if ( is_string( $image ) ) {
            return $image;
        }

        if ( is_array( $image ) ) {
            if ( ! empty( $image['url'] ) ) {
                return (string) $image['url'];
            }

            if ( ! empty( $image['ID'] ) ) {
                $attachment = wp_get_attachment_image_url( (int) $image['ID'], 'full' );
                return $attachment ? $attachment : '';
            }
        }

        if ( is_numeric( $image ) ) {
            $attachment = wp_get_attachment_image_url( (int) $image, 'full' );
            return $attachment ? $attachment : '';
        }

        return '';
    }
}

if ( ! function_exists( 'et_home_match_game_showcase_key' ) ) {
    /**
     * Map a Games post slug/title to a showcase card key.
     *
     * @param string $slug  Post slug.
     * @param string $title Post title.
     * @return string
     */
    function et_home_match_game_showcase_key( $slug, $title ) {
        $slug  = strtolower( (string) $slug );
        $title = strtolower( (string) $title );
        $hay   = $slug . ' ' . $title;

        if ( false !== strpos( $hay, 'maze' ) ) {
            return 'maze';
        }

        if ( false !== strpos( $hay, 'color' ) ) {
            return 'coloring';
        }

        if ( false !== strpos( $hay, 'puzzle' ) ) {
            return 'puzzle';
        }

        if ( false !== strpos( $hay, 'diff' ) ) {
            return 'difference';
        }

        return '';
    }
}

if ( ! function_exists( 'et_home_get_games_category_images' ) ) {
    /**
     * Load official game card images from Games category posts.
     *
     * Uses the same ACF background field as the /games/ page, with featured
     * image fallback (same source as the live homepage games slider).
     *
     * @return array<string, string>
     */
    function et_home_get_games_category_images() {
        static $images = null;

        if ( null !== $images ) {
            return $images;
        }

        $images = array();

        if ( ! function_exists( 'get_posts' ) ) {
            return $images;
        }

        $posts = get_posts(
            array(
                'post_type'              => 'post',
                'category_name'          => 'games',
                'posts_per_page'         => 20,
                'post_status'            => 'publish',
                'orderby'                => 'title',
                'order'                  => 'ASC',
                'no_found_rows'          => true,
                'update_post_meta_cache' => false,
                'update_post_term_cache' => false,
            )
        );

        foreach ( $posts as $game_post ) {
            $key = et_home_match_game_showcase_key( $game_post->post_name, $game_post->post_title );

            if ( '' === $key || isset( $images[ $key ] ) ) {
                continue;
            }

            $image = '';

            if ( function_exists( 'get_field' ) ) {
                $image = et_home_resolve_game_image_url( get_field( 'game_images_background', $game_post->ID ) );
            }

            if ( '' === $image && function_exists( 'get_post_featured_image' ) ) {
                $image = (string) get_post_featured_image( $game_post->ID, 'full' );
            }

            if ( '' !== $image ) {
                $images[ $key ] = $image;
            }
        }

        return $images;
    }
}

if ( ! function_exists( 'et_home_get_fun_egg_app_games' ) ) {
    /**
     * App promo game cards with official media-library images when available.
     *
     * @param string $theme_uri Theme directory URI.
     * @return array<int, array<string, string>>
     */
    function et_home_get_fun_egg_app_games( $theme_uri ) {
        $wp_images = et_home_get_games_category_images();

        $cards = array(
            array(
                'key'   => 'maze',
                'label' => 'Maze Time',
                'image' => $theme_uri . '/images/inside_image.jpg',
                'tone'  => 'blue',
                'url'   => 'http://eggstime.com/upload/mazes/index.html',
            ),
            array(
                'key'   => 'coloring',
                'label' => 'Coloring Time',
                'image' => $theme_uri . '/images/game_2.jpg',
                'tone'  => 'pink',
                'url'   => 'http://eggstime.com/upload/index.html',
            ),
            array(
                'key'   => 'puzzle',
                'label' => 'Puzzle Time',
                'image' => $theme_uri . '/images/game_1.jpg',
                'tone'  => 'green',
                'url'   => 'http://eggstime.com/upload/puzzles/index.html',
            ),
            array(
                'key'   => 'difference',
                'label' => 'Difference Time',
                'image' => $theme_uri . '/images/game_1.jpg',
                'tone'  => 'purple',
                'url'   => 'http://eggstime.com/upload/diff/index.html',
            ),
        );

        foreach ( $cards as &$card ) {
            if ( ! empty( $wp_images[ $card['key'] ] ) ) {
                $card['image'] = $wp_images[ $card['key'] ];
            }

            unset( $card['key'] );
        }
        unset( $card );

        return $cards;
    }
}
