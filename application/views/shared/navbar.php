<?php $login = true; ?>
<?php if($login): ?>
    <ul class="menu">
        <li class="item"><a href="<?=base_url('dashboard');?>">Dashboard</a></li>
        <li class="item"><a href="<?=base_url('dashboard/add');?>">Add</a></li>
        <li class="item"><a href="<?=base_url('dashboard/manage');?>">Manage</a></li>
        <li class="item"><a href="<?=base_url('dashboard/view');?>">View</a></li>
    </ul>
<?php endif; ?>