<?php
/**
 * Plugin Name: NG Create New Page as Draft
 * Description: Change NextGen Gallery "Create New Page" behavior to create new pages with a Draft status, instead of Published.
 * Version: 0.1
 * Author: Tommy George
 * Author URI: https://www.tommygeorge.com/
 *
 * This plugin is an unnofficial addition to NextGEN Gallery.
 * It adds functionality to the NextGEN Gallery plugin, but *does nothing*
 * unless the NextGEN Gallery plugin is already installed and activated.
 */

if ( function_exists('tcg_ng_create_new_page_as_draft') === false ) {

    /**
     * Filter to change the post_status value inside `$page` to `draft`, instead
     * of its default `publish`.
     *
     * See relevant NextGen hook 'ngg_add_new_page' code for info.
     * Relevant line: `$page = apply_filters('ngg_add_new_page', $page, $this->gid);`
     */
    function tcg_ng_create_new_page_as_draft($page, $gallery_id) {
        if ( is_array($page) === true && isset($page['post_status']) === true ) {
            $page['post_status'] = 'draft';
        }
        return $page;
    }
}

add_filter('ngg_add_new_page', 'tcg_ng_create_new_page_as_draft', 1, 2);
