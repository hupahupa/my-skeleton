
<h3>Merge by column</h3>
<?php
    # merge by colum
    $this->widget('application.extensions.groupgridview.GroupGridView', array(
      'id' => 'merge-column',
      'dataProvider' => $dp1,
      'mergeColumns' => array('company'),
      'columns' => array(
        'company',
        'created_at',
        'username',
        'email',
      ),
    ));
