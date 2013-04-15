<h2>Index Controller</h2>
<p>This is what you can do for now.</p>

<?php foreach($menu as $val): ?>
<li><a href='<?=create_url($val)?>'><?=$val?></a>
<?php endforeach; ?>