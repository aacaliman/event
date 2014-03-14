<div id="page">

    <div id="header">
        <div class="section">
            <?php print render($page['header']); ?>
        </div><!-- /.section-->
    </div><!-- /#header-->

    <div id="main-wrapper">
        <div id="content">
            <?php if ($show_messages && $messages): ?>
                <div class="system-messages"><?php print $messages; ?></div>
            <?php endif; ?>
            <?php print render($page['content']); ?>
        </div><!-- /.#content-->
    </div><!-- /#main-wrapper-->

    <div id="footer-wrapper">
        <?php print render($page['footer']); ?>
    </div><!-- /#footer-wrapper-->

</div><!-- /#page-->

