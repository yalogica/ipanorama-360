<?php
defined('ABSPATH') || exit;

$list_table = new iPanorama_List_Table_Items();
$list_table->prepare_items();
?>
<!-- /begin ipanorama app -->
<div class="ipanorama-root" id="ipanorama-app-items">
	<?php require 'page-info.php'; ?>
	<?php require 'page-feedback.php'; ?>
	<div class="ipanorama-page-header">
		<div class="ipanorama-title"><i class="xfa fa-cubes"></i><?php esc_html_e('iPanorama 360 Items', 'ipanorama'); ?></div>
		<div class="ipanorama-actions">
			<a class="ipanorama-blue" href="?page=ipanorama_item" title="<?php esc_html_e('Create a new item', 'ipanorama'); ?>"><?php esc_html_e('Add Item', 'ipanorama'); ?></a>
		</div>
	</div>
	<div class="ipanorama-messages" id="ipanorama-messages">
	</div>
	<div class="ipanorama-app">
		<?php $list_table->views(); ?>
		<form method="post">
			<?php $list_table->search_box(esc_html__('Search Items', 'ipanorama'),'item'); ?>
			<input type="hidden" name="page" value="<?php echo sanitize_key(filter_var($_REQUEST['page'], FILTER_DEFAULT)) ?>">
			<?php $list_table->display(); ?>
		</form>
	</div>
</div>
<!-- /end ipanorama app -->