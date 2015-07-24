<?php

if (!class_exists('EdcUtility')) {
		
	class EdcUtility {
		
		function __construct() {
			add_action('admin_menu', array($this, 'admin_menu'));
		}

		public function admin_menu() {
			add_menu_page('EDC Utilities', 'EDC Utilities', 'edit_pages', 'edc-utilities', array($this, 'utilities'));
			add_submenu_page('edc-utilities', 'Migrate Old Site', 'Migrate Old Site', 'edit_pages', 'edc-migrate', array($this, 'migrate'));
		}

		public function utilities() {
				echo <<<HTML
<script type="text/javascript">
	window.location = "admin.php?page=edc-migrate";
</script>
HTML;
		}

		private function extractText($text, $start, $end) {
			$temp = explode($start, $text, 2);
			if (count($temp) < 2) {
				return '';
			}
			$temp = explode($end, $temp[1], 2);
			return $temp[0];
		}

		public function migrate() {
			if (isset($_POST['migrate'])) {
				foreach ($this->pageMap as $newUrl => $oldUrl) {
					$postId = url_to_postid($newUrl);

					$html = wp_remote_fopen('http://www.edcwc.com'.$oldUrl);
					$content = $this->extractText($html, '<!-- InstanceBeginEditable name="page_content" -->', '<!-- InstanceEndEditable -->');
					$content = trim($content);

					echo "<h3>$oldUrl</h3>";
					echo "<h4>NEW URL: $newUrl</h4>";
					echo "<h4>POST ID: $postId</h4>";
					echo "<textarea style='width: 90%;' readonly='readonly' rows='20'>$content</textarea>";
					echo '<br /><br /><br /><br />';

					try {
						/**
						 * @var WPDB $wpdb
						 */
						global $wpdb;
						$result = $wpdb->query("
							UPDATE $wpdb->posts
							SET post_content = '".stripslashes($content)."'
							WHERE ID = $postId
						");
					} catch (Exception $e) {
						echo "<strong><em>There was an error saving post# $postId!!</em></strong>";
					}
				}

				echo '<strong><em>Done!!</em></strong>';
			}
			else {
				echo <<<HTML
<div class="wrap">
	<h2>Migrate EDC Site</h2>
	<h3>Import HTML content from existing EDC site to Wordpress pages</h3>
	<p>Click below to import content.</p>
	<form method="post">
		<input class="button-primary" type="submit" name="migrate" value="Migrate" />
	</form>
</div>
HTML;

			}
		}


		private $pageMap = array(
			'/site-selection/' => '/site_selection/index.html',
			'/site-selection/data/' => '/site_selection/data.html',
			'/site-selection/data/employers/' => '/site_selection/employers/index.html',
			'/site-selection/data/workforce/' => '/site_selection/workforce/index.html',
			'/site-selection/data/demographics/' => '/site_selection/demographics/index.html',
			'/site-selection/data/location/' => '/site_selection/location/index.html',
			'/site-selection/data/transportation/' => '/site_selection/transportation/index.html',
			'/site-selection/data/education/' => '/site_selection/education/index.html',
			'/site-selection/data/taxes/' => '/site_selection/taxes/index.html',
			'/site-selection/data/utilities/' => '/site_selection/utilities/index.html',
			'/site-selection/data/municipal-services/' => '/site_selection/municipal_serives/index.html',
			'/site-selection/data/living-in-wayne-county/' => '/living_wayne_county/index.html',
			'/site-selection/data/cost-of-living/' => '/site_selection/cost_living/index.html',
			'/site-selection/data/cost-of-doing-business/' => '/site_selection/cost_business/index.html',
			'/site-selection/data/retail-and-services/' => '/site_selection/retail_services/index.html',
			'/site-selection/available-buildings-sites/' => '/site_selection/gis/index.html',
			'/site-selection/industrial-parks/' => '/site_selection/industrial_parks/index.html',
			'/site-selection/wayne-county-incentives-tools/' => '/site_selection/wayne_co_incentives/index.html',
			'/site-selection/indiana-incentives-tools/' => '/site_selection/indiana_incentives/index.html',
			'/site-selection/current-events/' => '/news_media/index.html',
			'/site-selection/initiate-a-project/' => '/site_selection/initiate_project/index.html',
			'/site-selection/target-industry-analysis/' => '/site_selection/industry_analysis/index.html',
			'/expand-and-relocate/' => '/expand_relocate/index.html',
			'/expand-and-relocate/workforce/' => '/workforce/index.html',
			'/expand-and-relocate/wayne-county-incentives-tools/' => '/site_selection/wayne_co_incentives/index.html',
			'/expand-and-relocate/indiana-incentives-tools/' => '/site_selection/indiana_incentives/index.html',
			'/expand-and-relocate/taxes/' => '/site_selection/taxes/index.html',
			'/expand-and-relocate/employers/' => '/site_selection/employers/index.html',
			'/expand-and-relocate/demographics/' => '/site_selection/demographics/index.html',
			'/expand-and-relocate/entrepreneurship/' => '/expand_relocate/entrepreneurship/index.html',
			'/expand-and-relocate/transportation/' => '/site_selection/transportation/index.html',
			'/expand-and-relocate/utilities/' => '/site_selection/utilities/index.html',
			'/expand-and-relocate/municipal-services/' => '/site_selection/municipal_serives/index.html',
			'/expand-and-relocate/cost-of-living/' => '/site_selection/cost_living/index.html',
			'/expand-and-relocate/cost-of-doing-business/' => '/site_selection/cost_business/index.html',
			'/expand-and-relocate/available-building-sites/' => '/site_selection/gis/index.html',
			'/expand-and-relocate/industrial-parks/' => '/site_selection/industrial_parks/index.html',
			'/expand-and-relocate/life-sciences/' => '/expand_relocate/sciences/index.html',
			'/expand-and-relocate/life-sciences/life-science-clusters/' => '/expand_relocate/sciences/clusters/index.html',
			'/expand-and-relocate/life-sciences/health-care/' => '/expand_relocate/sciences/health_care/index.html',
			'/expand-and-relocate/life-sciences/capital-resources/' => '/expand_relocate/sciences/capital_resources/index.html',
			'/expand-and-relocate/life-sciences/state-life-science-links/' => '/expand_relocate/sciences/state_life_science/index.html',
			'/business-clusters/' => '/business-clusters/index.html',
			'/business-clusters/transportation-distribution-logistics/' => '/business-clusters/transportation/index.html',
			'/business-clusters/advanced-manufacturing/' => '/business-clusters/advanced_manufacturing/index.html',
			'/business-clusters/advanced-manufacturing/automotive-components/' => '/business-clusters/advanced_manufacturing/automotive.html',
			'/business-clusters/advanced-manufacturing/caskets-and-funeral-products/' => '/business-clusters/advanced_manufacturing/funeral.html',
			'/business-clusters/advanced-manufacturing/metal-stamping-fabrication/' => '/business-clusters/advanced_manufacturing/metal.html',
			'/business-clusters/advanced-manufacturing/plastics/' => '/business-clusters/advanced_manufacturing/plastics.html',
			'/business-clusters/advanced-manufacturing/machine-tool-die/' => '/business-clusters/advanced_manufacturing/tool-and-die.html',
			'/business-clusters/food-processing-animal-food-production/' => '/business-clusters/food/index.html',
			'/business-clusters/information-technology/' => '/business-clusters/information_technology/index.html',
			'/living-in-wayne-county/' => '/living_wayne_county/index.html',
			'/living-in-wayne-county/cost-of-living/' => '/site_selection/cost_living/index.html',
			'/living-in-wayne-county/housing/' => '/living_wayne_county/housing/index.html',
			'/living-in-wayne-county/education/' => '/site_selection/education/index.html',
			'/living-in-wayne-county/culture-and-recreation/' => '/living_wayne_county/culture_recreation/index.html',
			'/living-in-wayne-county/healthcare/' => '/living_wayne_county/healthcare/index.html',
			'/living-in-wayne-county/transportation/' => '/site_selection/transportation/index.html',
			'/living-in-wayne-county/community-calendar/' => '/living_wayne_county/calendar/index.html',
			'/news-and-media/' => '/news_media/index.html',
			'/news-and-media/news-releases/' => '/news_media/press_releases/',
			'/news-and-media/edcwc-e-news-updates/' => '/news_media/community_updates/index.html',
			'/news-and-media/frequently-asked-questions/' => '/news_media/faq/index.html',
			'/news-and-media/community-projects/' => '/news_media/community_projects/index.html',
			'/local-links/' => '/local_links/index.html',
			'/about-the-edc/' => '/about/index.html',
			'/about-the-edc/edc-staff/' => '/about/staff/index.html',
			'/about-the-edc/board-of-directors/' => '/about/board/index.html',
			'/about-the-edc/meeting-dates-locations/' => '/about/meetings/index.html',
			'/about-the-edc/history/' => '/about/history/index.html',
		);
	} //End Class EdcUtility
}
?>