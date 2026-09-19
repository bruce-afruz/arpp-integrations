<?php
/**
 * Plugin Name: Piruz Agent Receipt Protocol
 * Description: Adds an opt-in PARP manifest endpoint and Link header.
 * Version: 1.0.1
 * Requires PHP: 8.1
 * License: MIT
 */
defined('ABSPATH') || exit;
const PIRUZ_PARP_TYPE = 'application/vnd.piruz.agent-rights';
const PIRUZ_PARP_REL = 'https://github.com/bruce-afruz/piruz-agent-receipt/blob/main/SPEC.md#transport';
add_action('init', function () { add_rewrite_rule('^parp/?$', 'index.php?piruz_parp=1', 'top'); });
add_filter('query_vars', fn($vars) => array_merge($vars, ['piruz_parp']));
register_activation_hook(__FILE__, function () { flush_rewrite_rules(); });
register_deactivation_hook(__FILE__, function () { flush_rewrite_rules(); });
add_action('template_redirect', function () {
  if (!get_query_var('piruz_parp')) return;
  $token = apply_filters('piruz_parp_token', '', home_url(add_query_arg(null, null)));
  if (!$token) { status_header(404); exit; }
  header('Content-Type: ' . PIRUZ_PARP_TYPE); header('Cache-Control: private, no-store'); echo $token; exit;
});
add_action('send_headers', function () {
  if (is_admin() || get_query_var('piruz_parp')) return;
  $token = apply_filters('piruz_parp_token', '', home_url(add_query_arg(null, null)));
  if ($token) header('Link: </parp>; rel="' . PIRUZ_PARP_REL . '"; type="' . PIRUZ_PARP_TYPE . '"', false);
});
