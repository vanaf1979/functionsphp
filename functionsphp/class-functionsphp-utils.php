<?php

class Theme_Utils
{

	public function __construct()
	{

	}


	public function get_title( $post_id = 0 )
	{
		$post = $this->detirmine_post( $post_id );

		return apply_filters( 'the_title', $post->post_title );
	}


	public function get_content( $post_id = 0 )
	{
		$post = $this->detirmine_post( $post_id );

		return apply_filters( 'the_content', $post->post_content ) ;
	}


	public function detirmine_post( $post_id = 0 )
	{
		global $post;
		return ( $post_id != 0 ) ? $post = get_post( $post_id ) : $post;
	}


	public function get_trimmed_content( $text , $chars_limit )
	{
		$text = trim( preg_replace( '/\s\s+/' , ' ' , strip_tags( $text ) ) );
		$remove_character = array( "\n" , "\r\n" , "\r" , '.' , ',' , '-' , "  ");
		$text = str_replace( $remove_character, " " , $text );
		$chars_text = strlen( $text );
		$text = $text . " ";
		$text = substr( $text , 0 , $chars_limit );
		$text = substr( $text , 0 , strrpos( $text , ' ' ) );
		return strtolower( $text );
	}


	public function getChildPages( $post_id )
	{
		$post = $this->detirmine_post( $post_id );

		$args = array( 'post_parent' => $post->ID, 'post_type' => 'page', 'numberposts' => 9999, 'post_status' => 'published' );
		return get_children( $args );
	}


	public function getChildPosts( )
	{
		$post = $this->detirmine_post( $post_id );

		$args = array( 'post_parent' => $post->ID, 'post_type' => 'post', 'numberposts' => 9999, 'post_status' => 'published' );
		return get_children( $args );
	}


	public function getFeaturedImage( $post_id , $size = 'attachment-large' )
	{
		return $this->getThumbnail( get_post_thumbnail_id( $post_id ) , $size = 'attachment-large' );
	}


	public function getThumbnail( $thumbnail_id , $size = 'attachment-large' )
	{
	  $img = wp_get_attachment_image_src( $thumbnail_id , $size );
		return "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"{$this->getThumbnailAlt($thumbnail_id)}\" />";
	}


	public function getThumbnailUrl( $thumbnail_id , $size = 'attachment-large' )
	{
	  $img = wp_get_attachment_image_src( $thumbnail_id , $size );
		return $img[0];
	}


	private function getThumbnailAlt( $attachment_id )
	{
		$image_alt = get_post_meta( $attachment_id , '_wp_attachment_image_alt' , true );
		return ( trim( $image_alt ) > '' ) ? $image_alt : $this->get_title();
	}


	function writeBreadcrumb()
	{
    global $post;
    echo '<ul class="breadcrumbs">';
    if ( ! is_home() and ! is_front_page() ) {
				//echo '<li>';
        echo '<a href="';
        echo home_url();
        echo '" title="Homepage">';
        echo 'Home';
        echo '</a>';
				//echo '</li>';
        if ( is_category() || is_single() ) {
            echo '';
            the_category(' > ');
            if ( is_single() ) {
                echo ' > ';
                the_title();
                echo '';
            }
        } elseif ( is_page() ) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a> >';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<strong> '.get_the_title().'</strong>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
		echo '</ul>';
  }

}
