<?php
/*
 * Template Name: cutom theme
 */



global $wpdb;

$sql3="SELECT * FROM  wp_terms limit 0,20";
//join wp_posts as p on p.ID=t.object_id
//as s JOIN wp_term_relationships as t ON  s.term_id= t.term_taxonomy_id
$menu_item = $wpdb->get_results($sql3,ARRAY_A);
echo "<pre>";
//print_r($menu_item);

$sql4="SELECT * FROM  wp_term_relationships limit 0,20";
$menu_two = $wpdb->get_results($sql4,ARRAY_A);
echo "<pre>";
print_r($menu_two);


$sql5="SELECT * FROM  wp_term_taxonomy limit 0,20";
$menu_texo = $wpdb->get_results($sql5,ARRAY_A);
echo "<pre>";
//print_r($menu_texo);


$sql2 = "SELECT * FROM wp_terms WHERE term_id IN (SELECT term_id FROM wp_term_taxonomy WHERE taxonomy = 'category')";
$category= $wpdb->get_results($sql2,ARRAY_A);
$news_term = array();
print_r($category);
   die();