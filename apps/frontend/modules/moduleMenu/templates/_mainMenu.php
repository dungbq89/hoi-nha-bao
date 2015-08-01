<?php
/**
 * Created by PhpStorm.
 * User: vtsoft
 * Date: 4/25/14
 * Time: 10:27 AM
 */
$rootMenu = array();
foreach ($mainMenu as $menu) {
    if ($menu['level'] == 0) {
        $rootMenu[] = $menu;
    }
}
$i = 0;
?>
<ul>
    <?php
    foreach ($rootMenu as $menu) {
        $subMenu = array();
        foreach ($mainMenu as $item) {
            if ($item['parent_id'] == $menu['id']) {
                $subMenu[] = $item;
            }
        }
        $link1 = url_for2('category_news',array('slug'=>$menu['slug']));
        if ($menu['link'] != '') {
            if (VtHelper::startsWith($menu['link'], '@')) {
                $link1 = url_for($menu['link']);
            } else {
                $link1 = $menu['link'];
            }
        }

        echo '<li>';
        echo '<a href="' . $link1 . '">' . VtHelper::strip_html_tags_and_decode($menu['name']) . '</a>';
        $i++;
        if (count($subMenu) == 0) {
            echo '</li>';
        } else {
            $i = 1;
            echo '<ul>';
            foreach ($subMenu as $sub) {
                $link = url_for2('category_news',array('slug'=>$sub['slug']));
                $parentMenu = array();
                foreach ($mainMenu as $item) {
                    if ($item['parent_id'] == $sub['id']) {
                        $parentMenu[] = $item;
                    }
                }
                if ($sub['link'] != '') {
                    if (VtHelper::startsWith($sub['link'], '@')) {
                        $link = url_for($sub['link']);
                    } else {
                        $link = $sub['link'];
                    }
                }
                echo '    <li>';
                if (count($parentMenu) == 0) {
                    echo '      <a href="' . $link . '">' . VtHelper::strip_html_tags_and_decode($sub['name']) . '</a>';
                } else {
                    echo '      <a href="' . $link . '"><strong>' . VtHelper::strip_html_tags_and_decode($sub['name']) . '</strong></a>';
                }
                echo '    </li>';

                foreach ($parentMenu as $parent) {
                    if ($parent['link'] != '') {
                        if (VtHelper::startsWith($parent['link'], '@')) {
                            $link = url_for($parent['link']);
                        } else {
                            $link = $parent['link'];
                        }
                    }
                    echo '    <li>';
                    echo '      <a href="' . $link . '">' . VtHelper::strip_html_tags_and_decode($parent['name'], ENT_QUOTES) . '</a>';
                    echo '    </li>';
                }
            }
            echo '</ul>';
            echo '</li>';
        }
    }
    ?>
</ul>