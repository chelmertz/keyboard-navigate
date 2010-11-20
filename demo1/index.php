<?php

$pages = glob('pages/*');

$content = null;
if(isset($_GET['page']) && in_array($_GET['page'], $pages)) {
	ob_start();
	require_once $_GET['page'];
	$content = ob_get_clean();
}

function navigation($current_page = null, $pages) {
	$navigation = '<ul>';
	$next = 'next';
	$previous = 'previous';
	foreach($pages as $page) {
		$element = $page;
		if(!$current_page || $current_page != $page) {
			$class = null;
			if(strpos($page, '1') !== false  && $current_page) {
				$class = $previous;
				$previous = null;
			} else {
				$class = $next;
				$next = null;
			}
			$element = "<a href='?page=$page' class='$class'>$element</a>";
		}
		$navigation .= '<li>'.$element.'</li>';
	}
	return $navigation.'</ul>';
}

$navigation = navigation(isset($_GET['page']) ? $_GET['page']: null, $pages);

?>
<!doctype html>
<html>
	<head>
		<title>keyboard navigation demo</title>
	</head>
	<body>
		<h1>Keyboard navigation demo</h1>
		<p>Check out the links down under</p>
		<p>You can use <kbd>j, n or &lt;right&gt;</kbd> to go forward, or <kbd>k, p or &lt;left&gt;</kbd> to go back</p>

		<?php echo $content ?>

		<?php echo $navigation ?>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript" src="../jquery.keyboardNavigate.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('ul').keyboardNavigate();
		});
		</script>
	</body>
</html>
