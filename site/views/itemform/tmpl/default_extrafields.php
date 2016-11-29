<?php
/**
 * @version    SVN: <svn_id>
 * @package    Your_extension_name
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;
?>

<?php
	if ($this->form_extra):
		//~ echo $this->form_extra->getFieldsets(0)->name;
		//echo JHtml::_('bootstrap.startTabSet', 'tjucm_myTab', array('active' => 'personal-information'));
	endif;
?>

<?php if ($this->form_extra): ?>
	<!-- Iterate through the normal form fieldsets and display each one. -->
	<?php foreach ($this->form_extra as $fieldKey => $fieldArray): ?>
		<?php foreach ($fieldArray->getFieldsets() as $fieldName => $fieldset): ?>
			<!-- Fields go here -->
				<?php
				$tabName = JFilterOutput::stringURLUnicodeSlug(trim($fieldset->name));
				echo JHtml::_("bootstrap.addTab", "tjucm_myTab", $tabName, $fieldset->name);
				?>
					<div class="form-horizontal">
						<!-- Iterate through the fields and display them. -->
						<?php foreach($this->form_extra as $fieldKeyArray): ?>
							<?php foreach($fieldKeyArray->getFieldset($fieldset->name) as $field): ?>
								<!-- If the field is hidden, only use the input. -->
								<?php if ($field->hidden): ?>
									<?php echo $field->input; ?>
								<?php else: ?>
										<div class="form-group">
											<div class="col-sm-3 control-label">
												<?php echo $field->label; ?>
											</div>
											<div class="col-sm-6 control-label">
												<?php echo $field->input; ?>
											</div>
										</div>
								<?php endif; ?>
							<?php endforeach;?>
						<?php endforeach;?>
					</div>
				<?php
				echo JHtml::_("bootstrap.endTab");
				?>
		<?php endforeach; ?>
	<?php endforeach; ?>
<?php else: ?>
	<div class="alert alert-info">
		<?php echo JText::_('COM_TJLMS_NO_EXTRA_FIELDS_FOUND');?>
	</div>
<?php endif; ?>
