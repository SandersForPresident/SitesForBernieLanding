<?php
namespace SandersForPresidentLanding\Wordpress\Services;

class SiteService {
  public function getSites() {
    $sites = array();
    $rawSites = wp_get_sites();
    foreach ($rawSites as $rawSite) {
      $sites[] = array(
        'id' => $rawSite['site_id'],
        'domain' => $rawSite['domain'],
        'url' => get_blog_option($rawSite['blog_id'], 'siteurl'),
        'name' => get_blog_option($rawSite['blog_id'], 'blogname'),
        'state' => get_blog_option($rawSite['blog_id'], 'options_site_state_abbreviation')
      );
    }
    return $sites;
  }

  public function getSiteBySlug($slug) {
    $sites = $this->getSites();
    foreach ($sites as $site) {
      $partitioned = explode('.', $site['domain']);
      if ($slug == $partitioned[0]) {
        return $site;
      }
    }
    return null;
  }
}
