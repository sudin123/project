<?php
HTML::macro('image_link', function ($url = '', $img = '', $alt = '', $link_name = '', $param = '', $active = true, $ssl = false) {
    $url = $ssl == true ? URL::to_secure($url) : URL::to($url);
    $img = HTML::image($img, $alt);
    $img .= $link_name;
    $link = $active == true ? HTML::link($url, '#', $param) : $img;
    $link = str_replace('#', $img, $link);
    return $link;
});

HTML::macro('icon_link', function ($url = '', $icon = '', $link_name = '', $param = '', $active = true, $ssl = false) {
    $url = $ssl == true ? URL::to_secure($url) : URL::to($url);
    $icon = '<i class="' . $icon . '" aria-hidden="true"></i>' . $link_name;
    $link = $active == true ? HTML::link($url, '#', $param) : $icon;
    $link = str_replace('#', $icon, $link);
    return $link;
});

HTML::macro('icon_btn', function ($url = '', $icon = '', $link_name = '', $param = '', $active = true, $ssl = false) {
    $url = $ssl == true ? URL::to_secure($url) : URL::to($url);
    $icon = $link_name . '<i class="' . $icon . '" aria-hidden="true"></i>';
    $link = $active == true ? HTML::link($url, '#', $param) : $icon;
    $link = str_replace('#', $icon, $link);
    return $link;
});
HTML::macro('show_gravatar', function ($image_url = '', $image_alt = '', $type = '') {

    $attributes = array('image_type' => $type, 'image_alt' => $image_alt, 'image_url' => $image_url, 'user_gravatar' => Auth::user()->gravatar, 'username' => HTML::show_username());
    $image_out = $attributes['image_url'] != '' ? $attributes['image_url'] : $attributes['user_gravatar'];
    $image_alt_out = $attributes['image_alt'] != '' ? $attributes['image_alt'] : $attributes['username'];
    $type_out = $attributes['image_type'] != '' ? $attributes['image_type'] : 'img-circle';
    $image_link = HTML::image($image_out, $image_alt_out, array('class' => $type_out, 'draggable' => 'false'));
    return $image_link;

});

HTML::macro('show_username', function () {
    $the_username = (Auth::user()->name === Auth::user()->email) ? ((is_null(Auth::user()->first_name)) ? (Auth::user()->name) : (Auth::user()->first_name)) : (((is_null(Auth::user()->name)) ? (Auth::user()->email) : (Auth::user()->name)));;
    return $the_username;
});

HTML::macro('condition', function ($condition) {
    switch ($condition) {
        case 1:
            echo "Brand New (not used)";
            break;
        case 2:
            echo "Like New (used few times)";
            break;
        case 3:
            echo "Excellent";
            break;
        case 4:
            echo "Good/Fair";
            break;
        case 5:
            echo "Not Working";
            break;
    }
});
HTML::macro('negotiable', function ($is_negotiable) {
    switch ($is_negotiable) {
        case 0:
            echo "Yes";
            break;
        case 1:
            echo "No";
            break;

    }
});
HTML::macro('warranty', function ($warranty_type) {
    switch ($warranty_type) {
        case 0:
            echo "No Warranty";
            break;
        case 1:
            echo "Manufacturer/Distributor";
            break;
        case 2:
            echo "Dealer/Shop";
            break;

    }
});
HTML::macro('delivary', function ($home_delivary) {
    switch ($home_delivary) {
        case 0:
            echo "No";
            break;
        case 1:
            echo "Yes";
            break;
    }
});
HTML::macro('delivaryarea', function ($home_delivary_area) {
    switch ($home_delivary_area) {
        case 0:
            echo "Within my Area";
            break;
        case 1:
            echo "Within my City";
            break;
        case 2:
            echo "Almost anywhere in Nepal";
            break;
    }
});

HTML::macro('cropimage', function ($img, $w = "", $h = "", $crop = true, $params = array()) {
    $fullPath = public_path() . '/' . $img;
    if (!File::exists($fullPath)) return false;
    $format = '';
    $width = '';
    $htmlWidth = '';
    $height = '';
    $htmlHeight = '';
    $filter = "";
    $method = '';
    $lazyParams = '';
    $ext = File::extension($fullPath);
    if ($ext == 'png') {
        $firstBytes = file_get_contents($fullPath, false, null, 25, 1);
        if (ord($firstBytes) & 4) {
            $format = "f=png"; //for transparent pngs
        }
    }
    if ($w) {
        $width = 'w=' . $w;
        $htmlWidth = 'width="' . $w . '"';
    }
    if ($h) {
        $height = 'h=' . $h;
        $htmlHeight = 'height="' . $h . '"';
    }
    if (count($params) > 0) {
        $filter = implode('&', $params); //eg: fltr[]=gray
    }
    if ($w != "" && $h != "") {
        if ($crop) {
            $method = 'zc=2';
        } else {
            $method = 'far=1';
        }
    }
    $image = 'src=' . $img;
    $optionsSlices = array($method, $width, $height, $filter, $image, $format);
    $options = implode('&', array_filter($optionsSlices));
    $src = url('imgresize/?' . $options);
    $htmlOptionsSlices = array($htmlWidth, $htmlHeight, $lazyParams);
    $htmlOptions = implode(' ', array_filter($htmlOptionsSlices));
        return '<img alt="" src="' . $src . '" ' . $htmlOptions . ' />';


});

HTML::macro('pricesort', function ($price) {
    switch ($price) {
        case 'high':
            echo "Price High to Low";
            break;
        case 'low':
            echo "Price Low to High";
    }
});

HTML::macro('ordersort', function ($order) {
    switch ($order) {
        case 'popular':
            echo "Popular ads";
            break;
        case 'older':
            echo "Older Ads";
    }
});

HTML::macro('content', function ($string, $line_breaks = true, $xml = true) {
    $paragraphs = '';

    foreach (explode("\n", $string) as $line) {
        if (trim($line)) {
            $paragraphs .= '<p>' . $line . '</p>';
        }
    }

    return $paragraphs;
});

HTML::macro('catkey', function ($cat_id) {
    $node = \App\Category::findorFail($cat_id);
    $output = '';
    $output .= 'sellnepal, Buy '. $node->name .' in nepal, ';
    $output .= 'Sell '. $node->name .' in nepal, ';
    $output .= 'Find '. $node->name .' in nepal, ';
    $output .= 'Brand New '. $node->name .' in nepal, ';
    $output .= 'Secondhand '. $node->name .' in nepal, ';
    $output .= 'Best deal '. $node->name .' in nepal, ';
    $output .= 'Price of '. $node->name .' in nepal';
    return strtolower($output);
});

HTML::macro('catdesc', function ($cat_id) {
    $node = \App\Category::findorFail($cat_id);
    $output = 'Buy or Sell or Find ';
    $output .= $node->name;
    $output .= ' in Nepal - sellnepal.com';
    return $output;
});