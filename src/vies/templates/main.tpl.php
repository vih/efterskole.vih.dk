<?php
/**
 * P3P
 * Oplysninger:    http://www.sitepoint.com/article/p3p-cookies-ie6/2
 * Genereret med:  http://www.p3pwiz.com/
 *
 * @author Lars Olesen <lars@legestue.net>
 */
header('P3P: policyref="http://www.vih.dk/w3c/p3p.xml", CP="NID DSP ALL COR"');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="da" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title><?php e($title); ?></title>
        <meta name="description" content="<?php e($this->document->description); ?>" />
        <meta name="keywords" content="<?php e($this->document->keywords);; ?>" />
        <style type="text/css">
            @import "<?php e(url('/stylesheet')); ?>";
        </style>
        <?php if (!empty($rss)): ?>
        <link rel="alternate" type="application/rss+xml" title="<?php echo $rss['title']; ?>" href="<?php echo $rss['link']; ?>" />
        <?php endif; ?>
    </head>

    <body id="frontpage">

        <div id="container">

            <div id="branding">
                <div id="branding-logo">
                    <a href="<?php e(url('/')); ?>"><img src="<?php e(url('/gfx/images/logo.jpg')); ?>" height="75" alt="Vejle Idrætsefterskole" /></a>
                </div>
                <h1>Vejle Idrætsefterskole</h1>
            </div>

            <div id="search">
            </div>

            <div id="navigation-main">
                <a href="#content" id="navigation-skip">Gå til indholdet</a>
                <ul>
                    <?php foreach($this->document->navigation AS $item): ?>
                        <li<?php if (strstr(dirname($_SERVER['PHP_SELF']) . "/", $item['url'])) echo ' id="current"'; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['navigation_name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div id="breadcrumb">
            </div>

            <div id="content">
                <div id="content-main">
                    <?php echo $content; ?>
                </div>
                <div id="content-sub">
                    <?php if (!empty($content_sub)) echo $content_sub; ?>
                </div>
            </div>

            <div id="siteinfo">
                <div id="siteinfo-legal">

                </div>
            </div>

        <div id="navigation-section">
            <ul>
                <?php foreach($this->document->navigation_section AS $item): ?>
                    <li><a href="<?php echo $item['url']; ?>"><?php echo $item['navigation_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>


        </div>

        <?php if (isset($advanced)) echo $advanced; ?>

        <!--
        <script type="text/javascript">
            _uacct = "UA-793671-1";
            urchinTracker();
        </script>
        -->
    </body>

</html>