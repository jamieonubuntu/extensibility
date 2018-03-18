<?php function bloglist($location) {
    $bloglist = json_decode(file_get_contents('blog/object.json', true));

    if($location === "navbar") {
        foreach($bloglist->blog as $year) {
            foreach($year as $post) {
                echo "<a href=\"/blog/" . $post->uri . "/\">" . $post->navtitle . "</a>\n";
            }
        }
    }

    if($location === "blog") {
        foreach($bloglist->blog as $year) {
            echo "\n    <br><div class=\"blog-group\">
        <div class=\"blog-year\"><h1>2018</h1></div>
        <div class=\"blog-brace1\"></div>
        <div class=\"blog-brace2\"></div>
        <div>
            <div class=\"blog-brace3\"></div>
            <div class=\"blog-brace4\"></div>
            <div class=\"blog-brace5\"></div>
        </div>
        <div class=\"blog-list\">\n";
            foreach($year as $post) {
                echo "            <h3 class=\"no-mar-bottom\"><a href=\"/blog/" . $post->uri . "/\">" . $post->title . "</a></h3>
            <p class=\"two-no-mar\"><b>" . $post->longdesc . "</b></p>
            <p class=\"two-mar-top\">" . $post->date . "</p>\n\n";
            }
            echo "        </div>
    </div>";
        }
    }
}

?>
