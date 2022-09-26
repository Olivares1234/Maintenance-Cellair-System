
<?php if(isset($_SESSION['msg3'])): ?>
		toastr.info("<?php echo flash('msg3'); ?>");
		<?php endif ?>

<?php if(isset($_SESSION['msg4'])): ?>
		toastr.error("<?php echo flash('msg4'); ?>");
<?php endif ?>