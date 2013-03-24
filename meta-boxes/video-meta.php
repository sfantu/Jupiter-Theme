<?php

/*-----------------------------------------------------------------------------------*/
/*	Video Fields
/*-----------------------------------------------------------------------------------*/

$meta_box_video = array(
	'id' => 'video-urls-meta-box',
	'title' => 'Video Urls',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
				
		array(
				'name' => 'HD Video',
				'id' => 'video_url_1',
				'type' => 'text',
				'std' => ''
			),
			
		array(
				'name' => 'Mobile Video',
				'id' => 'video_url_2',
				'type' => 'text',
				'std' => ''
			),	
			
		array(
				'name' => 'Ogg Video',
				'id' => 'video_url_3',
				'type' => 'text',
				'std' => ''
			),
		array(
				'name' => 'Mp3 Audio',
				'id' => 'video_url_4',
				'type' => 'text',
				'std' => ''
			),
		array(
				'name' => 'Ogg Audio',
				'id' => 'video_url_5',
				'type' => 'text',
				'std' => ''
			),
		array(
				'name' => 'Torrent',
				'id' => 'video_url_6',
				'type' => 'text',
				'std' => ''
			),
		array(
				'name' => 'Youtube',
				'id' => 'video_url_7',
				'type' => 'text',
				'std' => ''
			)
	),
	
);

add_action('admin_menu', 'add_box');





/*	Add These Fields to the Post Editor*/
 
function add_box() {
	global $meta_box_video;
	add_meta_box($meta_box_video['id'], $meta_box_video['title'], 'show_box', $meta_box_video['page'], $meta_box_video['context'], $meta_box_video['priority']);
}





/*	Show the Box*/

function show_box() {
	global $meta_box_video, $post;
 	
	echo '<p>'.('Use the options below to add a video to this post.').'</p>';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_video['fields'] as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'text':
			
			echo '<tr>',
				'<th><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'.'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;

		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'save_data');


/*	Save Everything*/
 
function save_data($post_id) {
	global $meta_box, $meta_box_video;
 
 
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($meta_box_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}



/*	The Video Function*/

function video_1($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_1', true);
	
		echo ($video_url);
	
}

function video_2($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_2', true);
	
		echo ($video_url);

}

function video_3($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_3', true);
	
		echo ($video_url);
	
}

function video_4($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_4', true);
	
		echo ($video_url);
	
}

function video_5($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_5', true);
	
		echo ($video_url);
		
}		
		
function video_6($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_6', true);
	
		echo ($video_url);
		
}

function video_7($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_7', true);
	
		echo ($video_url);
		
}	

function video_8($postid) {
	
	$video_url = get_post_meta($postid, 'video_url_2', true);
	
		echo substr($video_url, 0, -3). 'webm' ;

	
}