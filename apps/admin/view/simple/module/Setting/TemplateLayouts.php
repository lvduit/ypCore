<?php echo $Header ?>

	<div id="page-title" class="page-title-setting">
		<span class="title"><img src="<?php echo $template_url ?>/img/icon/Configure alt 2.png" width="50" border="0" title="" alt=""> <?php echo $text_pagetitle ?></span>
		<span class="subtitle"><?php echo $text_pagetitle_subtite ?></span>
	</div>


<div class="">

	<br />
	<div class="row">
		<div class="span1"></div>
		<div class="span6"><h3><?php echo $text_layout_setting_for_all_module ?></h3></div>
		<div class="span3"><a href="<?php echo $return_module_manager_link ?>" class="btn "><?php echo $text_return_module_manager_link ?></a></div>
	</div>
	<br />

	<div class="tabbable tabs-left">

		<div class="tab-content">
			<div class="row">

		<?php if (!empty($error)) { ?><div class="alert alert-error"><?php echo $error ?></div><?php } ?>
		<?php if (!empty($success)) { ?><div class="alert alert-success"><strong>Success</strong> <?php echo $success ?></div><?php } ?>

				<form action="<?php echo $form_action ?>" method="POST" class="">
					<div class="row">

						<?php foreach ($layouts as $layout_name => $layout) { ?><div class="span2"></div>
						<div class="span4">
							<div><label><a href="<?php echo $setting_layout_link[$layout_name] ?>"><?php echo $layout_name ?></a></label>
								<select name="layout[<?php echo $layout_name ?>]">
									<option value="1" <?php echo $layout == 1 ? 'selected="selected"' : '' ?>>content</option>
									<option value="2" <?php echo $layout == 2 ? 'selected="selected"' : '' ?>>left-content</option>
									<option value="3" <?php echo $layout == 3 ? 'selected="selected"' : '' ?>>content-right</option>
									<option value="4" <?php echo $layout == 4 ? 'selected="selected"' : '' ?>>left-content-right</option>
								</select>
							</div>
						</div>
						<?php } ?>
						<div class="span2">
						</div>
					</div>
					<div class="row">
						<div class="span8"></div>
						<div class="span2">
							<input type="submit" value="<?php echo $button_save_setting ?>" name="submit" class="btn btn-info" id="submit" />
						</div>
					</div>
					</div> 
				</form>

			</div>
		</div>
	</div>
</div>

<?php echo $Footer ?>