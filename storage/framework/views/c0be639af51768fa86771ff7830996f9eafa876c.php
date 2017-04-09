<?php echo '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>'; ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:webfeeds="http://webfeeds.org/rss/1.0" xmlns:media="http://search.yahoo.com/mrss/"<?php foreach($namespaces as $n) echo " ".$n; ?>>
    <channel>
        <title><?php echo $channel['title']; ?></title>
        <link><?php echo e(Request::url()); ?></link>
        <description><![CDATA[<?php echo $channel['description']; ?>]]></description>
        <atom:link href="<?php echo e($channel['link']); ?>" rel="self"></atom:link>
        <?php if(!empty($channel['copyright'])): ?>
        <copyright><?php echo e($channel['copyright']); ?></copyright>
        <?php endif; ?>
        <?php if(!empty($channel['color'])): ?>
        <webfeeds:accentColor><?php echo e($channel['color']); ?></webfeeds:accentColor>
        <?php endif; ?>
        <?php if(!empty($channel['cover'])): ?>
        <webfeeds:cover image="<?php echo e($channel['cover']); ?>">
        <?php endif; ?>
        <?php if(!empty($channel['icon'])): ?>
        <webfeeds:icon><?php echo e($channel['icon']); ?></webfeeds:icon>
        <?php endif; ?>
        <?php if(!empty($channel['logo'])): ?>
        <webfeeds:logo><?php echo e($channel['logo']); ?></webfeeds:logo>
        <image>
            <url><?php echo e($channel['logo']); ?></url>
            <title><?php echo e($channel['title']); ?></title>
            <link><?php echo e(Request::url()); ?></link>
        </image>
        <?php endif; ?>
        <?php if(!empty($channel['related'])): ?>
        <webfeeds:related layout="card" target="browser">
        <?php endif; ?>
        <?php if(!empty($channel['ga'])): ?>
        <webfeeds:analytics id="<?php echo e($channel['ga']); ?>" engine="GoogleAnalytics">
        <?php endif; ?>
        <language><?php echo e($channel['lang']); ?></language>
        <lastBuildDate><?php echo e($channel['pubdate']); ?></lastBuildDate>
        <?php foreach($items as $item): ?>
        <item>
            <title><![CDATA[<?php echo $item['title']; ?>]]></title>
            <?php if(!empty($item['category'])): ?>
            <category><?php echo e($item['category']); ?></category>
            <?php endif; ?>
            <link><?php echo e($item['link']); ?></link>
            <guid isPermaLink="true"><?php echo e($item['link']); ?></guid>
            <description><![CDATA[<?php echo $item['description']; ?>]]></description>
            <?php if(!empty($item['content'])): ?>
            <content:encoded><![CDATA[<?php echo $item['content']; ?>]]></content:encoded>
            <?php endif; ?>
            <dc:creator xmlns:dc="http://purl.org/dc/elements/1.1/"><?php echo e($item['author']); ?></dc:creator>
            <pubDate><?php echo e($item['pubdate']); ?></pubDate>
            <?php if(!empty($item['enclosure'])): ?>
            <enclosure
            <?php foreach($item['enclosure'] as $k => $v): ?>
            <?php echo $k.'="'.$v.'" '; ?>

            <?php endforeach; ?>
            />
            <?php endif; ?>
            <?php if(!empty($item['media:content'])): ?>
            <media:content
            <?php foreach($item['media:content'] as $k => $v): ?>
            <?php echo $k.'="'.$v.'" '; ?>

            <?php endforeach; ?>
            />
            <?php endif; ?>
            <?php if(!empty($item['media:thumbnail'])): ?>
            <media:thumbnail
            <?php foreach($item['media:thumbnail'] as $k => $v): ?>
            <?php echo $k.'="'.$v.'" '; ?>

            <?php endforeach; ?>
            />
            <?php endif; ?>
            <?php if(!empty($item['media:title'])): ?>
            <media:title type="plain"><?php echo e($item['media:title']); ?></media:title>
            <?php endif; ?>
            <?php if(!empty($item['media:description'])): ?>
            <media:description type="plain"><?php echo e($item['media:description']); ?></media:description>
            <?php endif; ?>
            <?php if(!empty($item['media:keywords'])): ?>
            <media:keywords><?php echo e($item['media:title']); ?></media:keywords>
            <?php endif; ?>
            <?php if(!empty($item['media:rating'])): ?>
            <media:rating><?php echo e($item['media:rating']); ?></media:rating>
            <?php endif; ?>
            <?php if(!empty($item['creativeCommons:license'])): ?>
            <creativeCommons:license><?php echo e($item['creativeCommons:license']); ?></creativeCommons:license>
            <?php endif; ?>
        </item>
        <?php endforeach; ?>
    </channel>
</rss>
