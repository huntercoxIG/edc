<?php

if (!class_exists('EdcMenu')) {

	class EdcMenu {

		function __construct() {
			// Create hooks for custom template actions / tags
			add_action('edc_page_menu', array($this, 'page_menu'));
			add_action('edc_section_nav', array($this, 'section_nav'));
		}

		public function page_menu($args) {
			if (!is_array($args)) {
				$args = array();
			}
			$exclude = EdcMenu::nav_excluded_page_ids();
			if (isset($args['exclude']) && is_array($args['exclude'])) {
				$exclude = array_merge($args['exlude'], $exclude);
				unset($args['exclude']);
			}
			return wp_page_menu(array_merge(
				array(
					'depth' => 3,
					'show_home' => true,
					'sort_column' => 'menu_order',
					'exclude' => $exclude,
					'menu_class' => 'nav'
				),
				$args
			));
		}

		public function section_nav($args = array()) {
			if (!is_array($args)) {
				$args = array();
			}
			$exclude = EdcMenu::nav_excluded_page_ids();
			if (isset($args['exclude']) && is_array($args['exclude'])) {
				$exclude = array_merge($args['exlude'], $exclude);
				unset($args['exclude']);
			}

			$topPage = $this->getSectionID();

			echo '<h2>'.(0==$topPage ? '' : get_the_title($topPage)).'</h2>';
			return wp_page_menu(array_merge(
				array(
					'child_of' => $topPage,
					'depth' => 2,
					'sort_column' => 'menu_order',
					'exclude' => $exclude
				),
				$args
			));
		}

		public function getSectionID() {

			if (is_page()) {
				$post_id = get_the_ID();
			} elseif (is_search()) {
				return 0;
			} else {
				$post_id = get_option('page_for_posts');
				$post_id === 0 && $post_id = get_option('page_on_front');
			}
			if (is_single()) {
				$homepage = get_post($post_id);
				return $homepage->post_parent;
			} else {
				$pageAncestors = get_post_ancestors($post_id);
				if ($pageAncestors) {
					return array_pop($pageAncestors);
				} else {
					return $post_id;
				}
			}
			return 0;
		}

		public static function getSectionSlug() {
			$id = EdcMenu::getSectionID();
			$post = get_post($id);
			return $post->post_name;
		}

		public static function nav_excluded_page_ids($return_array = false) {
			/**
			 * @var WPDB $wpdb
			 */
			global $wpdb;

			$excluded = $wpdb->get_col("
				SELECT ID
				FROM $wpdb->posts as p
				INNER JOIN $wpdb->postmeta as pm
					on pm.post_id = p.ID
				WHERE
					pm.meta_key = 'edc_hide_from_menu'
					AND pm.meta_value = 1
			");
			return $return_array ? $excluded : implode($excluded, ',');
		}
	} //End Class EdcMenu
}
?>