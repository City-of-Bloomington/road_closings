<div class="nav1">
    <nav class="container">
		<?php
			$a = '<a href="%s">%s</a>';
			echo sprintf($a, BASE_URI.'/events', $this->_(['event', 'events', 2]));
		?>
    </nav>
</div>