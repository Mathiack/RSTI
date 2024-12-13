<?php if (!empty($errors) && is_array($errors)) : ?>
	<ul class="slideshow_error">
		<?php foreach ($errors as $err) : ?>
			<li><?php echo wp_unslash($err); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>