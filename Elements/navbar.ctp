<header id="header">
    <nav id="main-menu" class="navbar navbar-inverse fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand-urban navbar-brand home" href="<?= $this->Html->url('/') ?>">
					<?php
						if (isset($theme_config['logo']) && $theme_config['logo']) {
							echo '<img src="' . $theme_config['logo'] . '">';
						} else {
							echo '<p>' . $website_name . '</p>';
						}
					?>
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll"><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
					<?php if (!empty($nav)): ?>
						<?php $i = 0; ?>
						<?php foreach ($nav as $key => $value): ?>
							<?php if (empty($value['Navbar']['submenu'])): ?>
                                <li class="scroll">
                                    <a class="hvr-underline-from-center" href="<?= $value['Navbar']['url'] ?>">
										<?php if (!empty($value['Navbar']['icon'])): ?>
                                            <i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
										<?php endif; ?>
										<?= $value['Navbar']['name'] ?>
                                    </a>
                                </li>
							<?php else: ?>
                                <li class="dropdown">
                                    <a href="#" class="hvr-underline-from-center dropdown-toggle" data-toggle="dropdown"
                                       role="button"
                                       aria-expanded="false">
										<?php if (!empty($value['Navbar']['icon'])): ?>
                                            <i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
										<?php endif; ?>
										<?= $value['Navbar']['name'] ?>
                                        <i class="fa fa-angle-down">
                                        </i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
										<?php
											$submenu = json_decode($value['Navbar']['submenu']);
											foreach ($submenu as $k => $v) {
												?>
                                                <li>
                                                    <a class="hvr-underline-from-center"
                                                       href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? 'target="_blank"' : '' ?>><i
                                                                class="fa fa-circle-o"></i>
														<?= rawurldecode(str_replace('+', ' ', $k)) ?>
                                                    </a>
                                                </li>
											
											<?php } ?>
                                    </ul>
                                </li>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
							<?php if (!$isConnected) { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="dropdown"
                                   aria-expanded="false">Espace membre<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
									<?php if($EyPlugin->isInstalled('phpierre.signinup')) { ?>
                                        <li><a href="/login"><span class="text-uppercase"><?= $Lang->get('USER__LOGIN')?></span></a></li>
                                        <li><a href="/register"><span class="text-uppercase"><?= $Lang->get('USER__REGISTER')?></span></a></li>
									<?php } else { ?>
                                        <li><a href="#login" data-toggle="modal"><span class="text-uppercase"><?= $Lang->get('USER__LOGIN')?></span></a></li>
                                        <li><a href="#register" data-toggle="modal"><span class="text-uppercase"><?= $Lang->get('USER__REGISTER')?></span></a></li>
									<?php } ?>
                                </ul>
							<?php } else { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><?= $user['pseudo'] ?> <img
                                            src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false)) ?>/<?= $user['pseudo'] ?>/16"
                                            title="<?= $user['pseudo'] ?>"> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#notifications_modal" onclick="notification.markAllAsSeen(2)"
                                           data-toggle="modal"><i
                                                    class="fa fa-flag"></i> <?= $Lang->get('NOTIFICATIONS__LIST') ?></a><span
                                                class="notification-indicator"></span></li>
                                    <li>
                                        <a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>"
                                           data-toggle="modal"><i
                                                    class="fa fa-user"></i> <?= $Lang->get('USER__PROFILE') ?></a></li>
                                    <li>
                                        <a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"><i
                                                    class="fa fa-power-off"></i> <?= $Lang->get('USER__LOGOUT') ?></a>
                                    </li>
									<?php if ($Permissions->can('ACCESS_DASHBOARD')) { ?>
                                        <li>
                                            <a href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><i
                                                        class="fa fa-cogs"></i> <?= $Lang->get('GLOBAL__ADMIN_PANEL') ?>
                                            </a></li>
									<?php } ?>
                                </ul>
							<?php } ?>
                        </li>
                    </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->
