<div style="padding-top:20px;" class="navbar">
    <div style="padding-top:10px; padding-bottom:5px;" class="navbar-inner">
        <!-- start _header.php -->
        <div class="container">
        <!--
            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
		-->
            <div>
                <?php if ($navs): ?>
                    <ul class="<?php echo $type; ?> nav">
                        <?php foreach ($navs as $nav): ?>

                            <?php if (isset($navId)): ?>
                                <?php $uri = $nav->uri.'?id='.$navId; ?>
                            <?php else: ?>
                                <?php $uri = $nav->uri; ?>
                            <?php endif; ?>

                            <?php if (op_is_accessible_url($uri)): ?>
                                <li id="<?php echo $nav->type ?>_<?php echo op_url_to_id($nav->uri) ?>"><?php echo link_to($nav->caption, $uri); ?></li>
                            <?php endif; ?>

                        <?php endforeach; ?>
                         <?php if($culture == 'en'): ?>
                            <li><?php echo link_to('Invite', '@member_invite') ?></li>
                            <li><?php echo link_to('Settings', '@member_config') ?></li>
                            <li><?php echo link_to('Search Members', '@member_search') ?></li>
                            <li><?php echo link_to('Search Communities', '@community_search') ?></li>
                            <li><?php echo link_to('Logout', '@member_logout') ?></li>
                         <?php else: ?>
                            <li><?php echo link_to('友人を招待する', '@member_invite') ?></li>
                            <li><?php echo link_to('設定変更', '@member_config') ?></li>
                            <li><?php echo link_to('メンバー検索', '@member_search') ?></li>
                            <li><?php echo link_to('コミュニティ検索', '@community_search') ?></li>
                            <li><?php echo link_to('ログアウト', '@member_logout') ?></li>


                         <?php endif; ?>

                    </ul>
                <?php endif; ?>
            </div>
            <!-- /.nav-collapse -->
        </div>
        <!-- end _header.php -->
    </div>
    <!-- /navbar-inner -->
</div>
