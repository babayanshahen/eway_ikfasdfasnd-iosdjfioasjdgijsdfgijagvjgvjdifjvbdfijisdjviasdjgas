<?php  $this->load->helper('database_search')?>
<?php foreach ($items as $item): ?>
			<?php loadItemsSettings($item) ?>
<?php endforeach; ?>
