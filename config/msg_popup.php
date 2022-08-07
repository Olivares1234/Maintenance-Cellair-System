<?php if(isset($_SESSION['msg1'])): ?>
		toastr.info("<?php echo flash('msg1'); ?>");
		<?php endif ?>

<?php if(isset($_SESSION['msg2'])): ?>
		toastr.error("<?php echo flash('msg2'); ?>");
<?php endif ?>