<div class='admin-box'>

    <div class="row-fluid">
        <div class="span8">
        <h3>
            <?php echo lang('magazines_staff_manage'); ?>
        </h3>
          <table class='table table-striped'>
              <thead>
                  <tr>
                      <th>User</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($records as $record) : ?>
                  <tr>
                      <td><?php e($record->username); ?></td>
                      <td><?php e($record->email); ?></td>
                      <td><?php e($record->role_name); ?></td>
                      <td>
                          <div class="btn-group">
                            <a href="<?php echo site_url(SITE_AREA . '/content/magazines/dismissUser/' . $record->id); ?>" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i> Dismiss</a>
                          </div>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      <div class="span4">
        <h3><?php echo lang('magazines_staff_new'); ?></h3>
          <?php echo form_open($this->uri->uri_string()); ?>
            <fieldset>
              <?php echo form_hidden('magazine_id', $magazine_id); ?>
              <?php echo form_input('email', '', lang('pa_email'), 'class="input-xlarge"'); ?>
              <?php echo form_dropdown('role_id', $roles, '', lang('pa_role'), 'class="input-xlarge"'); ?>
            </fieldset>
            <fieldset class="form-actions">
            <input type="submit" name="save" class="btn btn-primary btn-block" value="<?php echo lang('magazines_staff_add'); ?>" />
        </fieldset>
          <?php echo form_close(); ?>
      </div>
    </div>
</div>
