<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?> </li>
<li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Chains'), ['controller' => 'Chains', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Chain'), ['controller' => 'Chains', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cuisines'), ['controller' => 'Cuisines', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cuisine'), ['controller' => 'Cuisines', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?> </li>
<li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Chains'), ['controller' => 'Chains', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Chain'), ['controller' => 'Chains', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cuisines'), ['controller' => 'Cuisines', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cuisine'), ['controller' => 'Cuisines', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Venue Types'), ['controller' => 'VenueTypes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue Type'), ['controller' => 'VenueTypes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($venue->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($venue->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Slug') ?></td>
            <td><?= h($venue->slug) ?></td>
        </tr>
        <tr>
            <td><?= __('Seo Title') ?></td>
            <td><?= h($venue->seo_title) ?></td>
        </tr>
        <tr>
            <td><?= __('City') ?></td>
            <td><?= $venue->has('city') ? $this->Html->link($venue->city->name, ['controller' => 'Cities', 'action' => 'view', $venue->city->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Country') ?></td>
            <td><?= $venue->has('country') ? $this->Html->link($venue->country->name, ['controller' => 'Countries', 'action' => 'view', $venue->country->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Province') ?></td>
            <td><?= $venue->has('province') ? $this->Html->link($venue->province->name, ['controller' => 'Provinces', 'action' => 'view', $venue->province->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('City Region') ?></td>
            <td><?= $venue->has('city_region') ? $this->Html->link($venue->city_region->name, ['controller' => 'CityRegions', 'action' => 'view', $venue->city_region->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Admin Level 2') ?></td>
            <td><?= h($venue->admin_level_2) ?></td>
        </tr>
        <tr>
            <td><?= __('Mall') ?></td>
            <td><?= $venue->has('mall') ? $this->Html->link($venue->mall->name, ['controller' => 'Malls', 'action' => 'view', $venue->mall->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Chain') ?></td>
            <td><?= $venue->has('chain') ? $this->Html->link($venue->chain->name, ['controller' => 'Chains', 'action' => 'view', $venue->chain->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($venue->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Geo Latt') ?></td>
            <td><?= $this->Number->format($venue->geo_latt) ?></td>
        </tr>
        <tr>
            <td><?= __('Geo Long') ?></td>
            <td><?= $this->Number->format($venue->geo_long) ?></td>
        </tr>
        <tr>
            <td><?= __('Rating') ?></td>
            <td><?= $this->Number->format($venue->rating) ?></td>
        </tr>
        <tr>
            <td><?= __('Last Update') ?></td>
            <td><?= h($venue->last_update) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($venue->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($venue->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Mall') ?></td>
            <td><?= $venue->flag_mall ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Featured') ?></td>
            <td><?= $venue->flag_featured ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Published') ?></td>
            <td><?= $venue->flag_published ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Seo Desc') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->seo_desc)); ?></td>
        </tr>
        <tr>
            <td><?= __('Address') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->address)); ?></td>
        </tr>
        <tr>
            <td><?= __('Phones') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->phones)); ?></td>
        </tr>
        <tr>
            <td><?= __('Websites') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->websites)); ?></td>
        </tr>
        <tr>
            <td><?= __('Photos') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->photos)); ?></td>
        </tr>
        <tr>
            <td><?= __('Location Hours') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->location_hours)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Amenities') ?></h3>
    </div>
    <?php if (!empty($venue->amenities)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($venue->amenities as $amenities): ?>
                <tr>
                    <td><?= h($amenities->id) ?></td>
                    <td><?= h($amenities->name) ?></td>
                    <td><?= h($amenities->slug) ?></td>
                    <td><?= h($amenities->created) ?></td>
                    <td><?= h($amenities->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Amenities', 'action' => 'view', $amenities->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Amenities', 'action' => 'edit', $amenities->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Amenities', 'action' => 'delete', $amenities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenities->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Amenities</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Brands') ?></h3>
    </div>
    <?php if (!empty($venue->brands)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($venue->brands as $brands): ?>
                <tr>
                    <td><?= h($brands->id) ?></td>
                    <td><?= h($brands->name) ?></td>
                    <td><?= h($brands->slug) ?></td>
                    <td><?= h($brands->created) ?></td>
                    <td><?= h($brands->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Brands', 'action' => 'view', $brands->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Brands', 'action' => 'edit', $brands->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Brands', 'action' => 'delete', $brands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brands->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Brands</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Cuisines') ?></h3>
    </div>
    <?php if (!empty($venue->cuisines)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($venue->cuisines as $cuisines): ?>
                <tr>
                    <td><?= h($cuisines->id) ?></td>
                    <td><?= h($cuisines->name) ?></td>
                    <td><?= h($cuisines->slug) ?></td>
                    <td><?= h($cuisines->created) ?></td>
                    <td><?= h($cuisines->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Cuisines', 'action' => 'view', $cuisines->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Cuisines', 'action' => 'edit', $cuisines->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Cuisines', 'action' => 'delete', $cuisines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cuisines->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Cuisines</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Products') ?></h3>
    </div>
    <?php if (!empty($venue->products)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($venue->products as $products): ?>
                <tr>
                    <td><?= h($products->id) ?></td>
                    <td><?= h($products->name) ?></td>
                    <td><?= h($products->slug) ?></td>
                    <td><?= h($products->created) ?></td>
                    <td><?= h($products->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Products', 'action' => 'view', $products->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Products', 'action' => 'edit', $products->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Products</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Services') ?></h3>
    </div>
    <?php if (!empty($venue->services)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($venue->services as $services): ?>
                <tr>
                    <td><?= h($services->id) ?></td>
                    <td><?= h($services->name) ?></td>
                    <td><?= h($services->slug) ?></td>
                    <td><?= h($services->created) ?></td>
                    <td><?= h($services->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Services', 'action' => 'view', $services->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Services', 'action' => 'edit', $services->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Services', 'action' => 'delete', $services->id], ['confirm' => __('Are you sure you want to delete # {0}?', $services->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Services</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related VenueTypes') ?></h3>
    </div>
    <?php if (!empty($venue->venue_types)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($venue->venue_types as $venueTypes): ?>
                <tr>
                    <td><?= h($venueTypes->id) ?></td>
                    <td><?= h($venueTypes->name) ?></td>
                    <td><?= h($venueTypes->slug) ?></td>
                    <td><?= h($venueTypes->created) ?></td>
                    <td><?= h($venueTypes->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'VenueTypes', 'action' => 'view', $venueTypes->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'VenueTypes', 'action' => 'edit', $venueTypes->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'VenueTypes', 'action' => 'delete', $venueTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venueTypes->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related VenueTypes</p>
    <?php endif; ?>
</div>
