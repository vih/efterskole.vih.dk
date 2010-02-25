<?php
        $pics = array(
            url('/gfx/images/widepics/frontpage-piger.jpg'),
            url('/gfx/images/widepics/frontpage-jumping.jpg'),
            url('/gfx/images/widepics/frontpage-hip.jpg')
        );
        $color = array(
            'body' => '#213408',
            'caption' => '#ddd',
            'container' => '#213408',
            'navigation_main' => '#A5B24A'
        );


$frontpage_pic = $pics[array_rand($pics)];

header('Content-type: text/css');
?>

/* www.vih.dk @ lars@vih.dk */

@import "lightbox.css";

html {
    font-size: 100%;
}

body {
    margin: 0;
    padding: 0;
    /*font: 85%/1.6em "Trebuchet MS", arial, sans-serif;*/
    font: 85%/1.6em "Trebuchet MS", arial, sans-serif;
    /*line-height: 1.6em;*/
    background: <?php echo $color['body']; ?>;

}

h1 {
    font-size:2em;
}
h2 {
    font-size:1.5em;
}
h3 {
    font-size:1.25em;
}
h4 {
    font-size:1em;
}

table {
    width: 90%;
    font-size: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 0.3em;
    text-align: left;
    vertical-align: top;
}


caption {
    font-weight: bold;
    background: <?php echo $color['caption']; ?>;
    padding: 0.4em;
}

th {
    white-space:nowrap;
}

form table td, form table th {
    padding: 0.3em;
}
form table {
    width: 98%;
}

fieldset {
    padding: 0.5em;
}

input, select, textarea {
    font-size:1em;
}

label {
    /* display: block; */
}

#content-main  a {
    text-decoration: none;
    color: blue;
    background-color: white;
}

#content-main  a:hover {
    text-decoration: underline;
}

#content-main a:visited {
    color: blue;
    background-color: white;
}

li {
    list-style: square;
}

#container {
    background: <?php echo $color['container']; ?>;
    margin: 0 0 0 <?php echo $margin['left']; ?>;
    overflow: hidden;
}

#branding {
    width: 95%;
    /*background: <?php echo $color['container']; ?> url(/gfx/logo/vih75x151.gif) no-repeat <?php echo intval($margin['default']) - 5; ?>px 0.3em;*/
    height: 75px;
    border-left: 1px solid white;

}

#branding h1 {
    visibility: hidden;
    margin: 0;
    padding: 0;

}
#branding #branding-logo {
    margin: 0 20px;
}
#branding #branding-logo a img  {
    border: none;
}

#navigation-skip {
    display: none;
}

#navigation-main {
    margin-top: 0.5em;
}

#navigation-main {
    width: 99.9%;
    float: left;
    font-size: small; /* could be specified at a higher level */
    margin: 0;
    padding: 0;
    background:  <?php echo $color['navigation_main']; ?>;
    border-left: 1px solid white;
}

#navigation-main ul {
    margin: 0 0 0 <?php echo $margin['default']; ?>;
    padding: 0;
}

#navigation-main ul li {
    float: left;
    margin: 0;
    padding: 0;
    display: inline;
    list-style: none;
}

#navigation-main a {
    float: left;
    color: white;
    line-height: 20px;
    font-weight: bold;
    margin: 0 2em 0 0;
    text-decoration: none;
    padding: 3em 0 0.3em 0;
    border-bottom: 4px solid <?php echo $color['navigation_main']; ?>;
}

#navigation-main a:hover, #navigation-main li#current a:hover {
    border-bottom: 4px solid <?php echo $color['navigation_main']; ?>;
    color: white;
    text-decoration: underline;
    /* background: #a5003D; */
}

#navigation-main li#current a {
    border-bottom: 4px solid <?php echo $color['navigation_main']; ?>;
    color: white;
    text-decoration: underline;
    /* background: #a5003D; */

}

#navigation-section {
    position: absolute;
    top: 40px;
    right: 60px;
}

#navigation-section li {
    display: inline;
    padding-right: 1em;
}

#navigation-section a {
    color: #ddd;
    background: <?php echo $color['container']; ?>;
    font-size: 0.9em;
    text-decoration: none;
}

#navigation-section a:hover{
    text-decoration: underline;
}

#content {
    width: 95%;
    /* width: 100%; */
    clear: both;
    overflow: hidden;
    border-left: 1px solid white;
    /* border-bottom: 1px solid <?php echo $color['navigation_main']; ?>;

*/
}

#content-main {
    background: white;
    margin: 0;
    float: left;
    padding-top: 2em;
    padding-bottom: 2em;
    overflow: hidden;
    /*border-bottom: 1px solid <?php echo $color['navigation_main']; ?>;*/
    width: 100%;
}

#content-main *, #content-main ul, #content-main caption, #content-main table {
    margin-left: <?php echo $margin['default']; ?>;
    margin-right: <?php echo $margin['default']; ?>;

}

#content-main * * {
    margin-left: 0;
    margin-right: 0;
}

#content-main .dtend, #content-sub .dtend {
    margin: 0 1em 1em 0;
}

#frontpage #content #content-main {
    background-image: url(<?php echo $frontpage_pic; ?>);
    background-repeat: no-repeat;
    padding-top: 190px;
    /*padding-top: 190px;*/
}

#content-sub {
    margin: 0;
    /*margin-right: 0 0 0 <?php echo $margin['default']; ?>;*/
    padding-top: 2em;
}


#content-sub * {
    margin-left: <?php echo $margin['default']; ?>;
    margin-right: <?php echo $margin['default']; ?>;

}

#content-sub * * {
    margin-left: 0;
    margin-right: 0;

}

/*prev prefixed with sidebar*/
#content-main {
    width: 69%;
    max-width: 690px;
    width:expression(document.body.clientWidth > 1050? "690px": "69%" );
    float: left;
    padding-bottom: 1000em;
    margin-bottom: -998em;
}
#content-main table {
    width: 90%;
}


#content-sub {
    float: left;
    width: 30.89%;

    /*border-left: 1px solid #eee;*/
    padding-bottom: 1000em;
    margin-bottom: -998em;
    background: <?php echo $color['container']; ?>;
    /*background: #333;*/
    color: white;
    /* border-right: 1px solid white; */
    overflow: hidden;
}

#content-sub h2 {
    padding: 0.1em 0;
    border-bottom: 1px solid #ccc;
}
#content-sub a {
    color: white;
}

#content-sub a:hover {
    text-decoration: underline;
}
#content-sub img {
    /* http://www.bloggerforum.com/modules/xoopsfaq/index.php?cat_id=8 */
    max-width: 175px;
    width: expression(this.width > 175 ? 175: true);

}


#content-sub a img:hover {
    border: 2px solid <?php echo $color['navigation_main']; ?>;
}

/*endsidebar*/

#siteinfo {
    width: 95%;
    clear: both;
    /*border-top: 1px solid <?php echo $color['navigation_main']; ?>;*/
    margin: 0;
    padding: 0;
    background: <?php echo $color['container']; ?>;
    color: white;
    border-left: 1px solid white;

}

#siteinfo #siteinfo-legal {
    margin: 0 0 0 <?php echo $margin['default']; ?>;
    padding-top: 0.5em;
    padding-bottom: 1em;
    /*text-align: center;*/
}


#siteinfo a {
    color: white;
    background: <?php echo $color['container']; ?>;
}

/* forside */

#frontpage #teaser {
    /*background-repeat: no-repeat;*/
    margin-bottom: 3em;
    /*background-position: top center;*/
    /*padding-top: 350px;*/
}

#frontpage #teaser h1 {
    /*clear: both;*/
}

#frontpage #teaser p {
    /*font-size: 1.4em;*/
    /*color: #aaa;*/
    /*line-height: 1.5em;*/
    /*padding-right: 1em;*/
    /*clear: both;*/
}

#frontpage div#placeholder {
    clear: both;
    overflow: hidden;
    width: 90%;
    background: #eee;
}

#frontpage #search-form {
    /*padding: 1em 1em 30em 1em;*/
    /*margin: 0 0 -29em 0;*/
    /*width: 30%;*/
    /*float: left;*/
    /*background: #eee;*/
    color: white;
}

#frontpage #search-form fieldset {
    border: none;
    padding: 0;
}
/*
#frontpage div#placeholder #nav {
    list-style-type: none;
    margin: 0 0 -29em 0;
    padding: 1em 1em 30em 1em;
    width: 60%;
    float: right;
}

#frontpage div#placeholder #nav li a {
    background: none;
    color: <?php echo $color['container']; ?>;
    padding: 1em;
    border: 6px solid #ddd;
    margin-right: 1em;
    width: 80px;
}
*/

#nav {
    margin: 0;
    padding: 0;
}

#nav li {
    display: inline;
    margin: 0;
    padding: 0;
    font-size: 0.9em;
}


/*#frontpage div#placeholder #nav li a {*/
#nav li a {
    display: block;
    float: left;
    margin: 0.3em;
    padding: 1em 0.5em 1em 0.5em;
    color: white;
    border: 2px solid <?php echo $color['container']; ?>;
    text-decoration: none;
    text-align: center;
    font-size: 0.8em;
    font-weight: bold;
    font-family: verdana, sans-serif;
    padding-top: 102px;
    padding-bottom: 5px;
    width: 90px;
    background-color: black;
}

#nav li a:visited {
    color: white;
    background-color: <?php echo $color['container']; ?>;
}

/*#frontpage div#placeholder #nav li a:hover {*/
#nav li a:hover {
    border: 2px solid <?php echo $color['navigation_main']; ?>;
    text-decoration: underline;
}

#nav li a.rejselinje {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-love.jpg) no-repeat top center;
}

#nav li a.politilinje {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-politi.jpg) no-repeat top center;
}

#nav li a.fodboldakademi {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-fodboldakademi.jpg) no-repeat top center;
}

#nav li a.musiklinje {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-klaver.jpg) no-repeat top center;
}

#nav li a.hojskole {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-hojskole.jpg) no-repeat top center;
}

#nav li a.golf {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-golf.jpg) no-repeat top center;
}

#nav li a.bridge {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-bridge.jpg) no-repeat top center;
}

#nav li a.sommerhojskole {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-sommerhojskole.jpg) no-repeat top center;
}

#nav li a.kortekurser {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-sommerhojskole.jpg) no-repeat top center;
}

#nav li a.langekurser {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-langekurser.jpg) no-repeat top center;
}

#nav li a.elevforeningen {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-hojskole.jpg) no-repeat top right;
}

#nav li a.kursuscenter {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-kursuscenter.jpg) no-repeat top center;
}


/* news */

#content-main .vevent {
    clear: both;
}

#content-main  .vevent span {
    display: block;
    font-size: 10px;
    line-height: 1em;
    text-align: center;
    text-transform: uppercase;
    text-shadow: #fff 1px 1px 1px;
    color: #BDBDBD;
    margin-right: 1em;
    float: left;
    width: 35px;
    padding-top: 5px;
    border: 1px solid #ccc;
    margin-bottom: 1em;
}

#content-main  .vevent span .day {
    display: block;
    font-weight: bold;
    font-size: 20px;
    letter-spacing: -2px;
    text-indent: -3px;
    text-shadow: #bbb 2px 2px 0;
    color: #ddd;
    padding-bottom: 5px;
    margin: 0;
    border: none;
}

#content-main .vevent a  {
    text-decoration:none;
}

#content-main .vevent a:hover  {
    text-decoration: underline;
}

#content-main  .vevent h2.summary { /* h2 bruges ved nyhederne */
    margin-bottom: 0;
    padding: 0;
    font-size: 1em;
}

#content-main  .vevent .description {
    margin-top: 0;
    padding: 0;
}

#content-main  .vevent .dtend {
    background: white;

}

#content-main  table .vevent .dtend {
    background: white;
}


#content-sub .vevent span.dtend {
    text-transform: uppercase;
    font-size: 0.7em;
}

#content-sub .vevent h2.summary {
    border: none;
    background: transparent;
    font-size: 0.9em;
    margin: 0;
    padding: 0;
    margin-bottom: 0;

}

#content-sub a  {
    text-decoration: none;

}

#siteinfo-legal a  {
    text-decoration: none;

}

#siteinfo-legal a:hover  {
    text-decoration: underline;

}


#content-sub  a:hover  {
    text-decoration: underline;
}

#content-sub .vevent .description {
    font-size: 0.9em;
    margin: 0 0 1em 0;
    padding: 0;
}

li.rss {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

a.rss, li.rss a {
    font-size: small;
    font-variant: small-caps;
    background: url(/gfx/icons/feed-icon-12x12.png)

no-repeat 0px 5px;
    padding-left: 18px;
}

a.rss:hover, li.rss a:hover {
    background: url(/gfx/icons/feed-icon-12x12.png)

no-repeat 0px 5px;
}

.rss-big {
    background: url(/gfx/icons/rss96px.png) no-repeat

1em 1em;
    padding: 3em 1em 1em 130px;
    height: 70px;
    border: 1px solid #ddd;
}

/*
.spot {
    background: #00518c;
    color: white;
    padding: 1em;
    margin-bottom: 1em;
}
.spot h3 {
    text-align: center;
    margin-bottom: 0;
}

.spot p {
    text-align: center;
    margin: 0;
    padding: 0;
    margin-bottom: 0.5em;
}

.spot a {
    color: white;
    text-decoration: none;
}

.spot a:hover {
    text-decoration: underline;
}
*/
/* bruges på tilmeldingssiderne */

#tilmelding #statuslink {
    float: right;
    width: 10em;
    border: 1px solid black;
    padding: 1em 2em;
    list-style-type: none;
}

#tilmelding .current a {
    font-weight: bold;
}

#tilmelding div {
    float: left;
    width: 70%;
}

#content-sub img {
    display: block;
    margin: auto;
    /*
    border: 1px solid #ccc;
    padding: 5px;
    */
    margin-bottom: 0.5em;

    border: 2px solid white;
    padding: 0;

}



#content-sub dl#undervisere a {
    display: block;
    margin-bottom: 1em;
}

#content-sub  dl#undervisere a.url img {
    margin: 0;
    padding: 0;
}
#content-sub  dl#undervisere br {
    display: none;
}

#content-main img {
    /*
    border: 1px solid #ccc;
    padding: 5px;
    */
    border: 2px solid black;
    padding: 0;

}



.dankort {
    background: url(/gfx/icons/dankort.jpg) no-repeat

right;
    padding-right: 30px;
}

/* hvad bruges denne til? */
span.caps {
    float: none;
    display: inline;
    margin: 0;
    padding: 0;
    border: none;
    color: black;
}

.notice {
    background: #ddd;
    padding: 0.5em;
}

.alert {
    background: #33B3CC;
    padding: 0.5em;
}

/* news featured */

#news-featured {
    clear: both;
    width: 100%;
    margin-bottom: 1em;
    overflow: hidden;
}

#news-featured .news-item {
    padding: 3%;
    margin-bottom: -37%;
    padding-bottom: 40%;
    color: white;
    font-size: 1.8em;
    width: 43%;
}

#news-featured .left { /* #006EB0 */
    background: #006EB0;
    float: left;
}

#news-featured .right { /* #004D7B */
    background: #004D7B;
    float: right;
}

#news-featured .news-item a {
    background: transparent;
    color: white;
}

#news-featured .news-item a:hover {
    background: transparent;
    color: white;
}

#news-featured .news-item .dtend {
    border: none;
    display: inline;
    float: none;
    color: white;
    width: auto;
    margin: auto;
}

#news-featured .news-item .day {
    display: inline;
    color: white;
    margin: auto;
    letter-spacing: 0;
    text-indent: 0;
}


/* faciliteter */

dl#faciliteter {
    background: transparent url(/gfx/images/oversigtsbillede.jpg) no-repeat 5px 6px;
    display: block;
    width: 510px;
    height: 345px;
    position: relative;
    border: 1px solid #ccc;

}

dl#faciliteter dt {
    display: none;
}

dl#faciliteter dd a {
    display: none;
}

dl#faciliteter dd a#f20:hover, dl#faciliteter dd a#f9:hover, dl#faciliteter dd

a#f23:hover, dl#faciliteter dd a#f13:hover, dl#faciliteter dd a#f16:hover,

dl#faciliteter dd a#f14:hover, dl#faciliteter dd a#f24:hover, dl#faciliteter dd

a#f11:hover, dl#faciliteter dd a#f15:hover, dl#faciliteter dd a#f17:hover,

dl#faciliteter dd a#f2:hover, dl#faciliteter dd a#f7:hover {
    opacity: 0.8;
    filter: alpha(opacity=80);
}


dl#faciliteter dd a#f20, dl#faciliteter dd a#f9, dl#faciliteter dd a#f23,

dl#faciliteter dd a#f13, dl#faciliteter dd a#f16, dl#faciliteter dd a#f14,

dl#faciliteter dd a#f24, dl#faciliteter dd a#f11, dl#faciliteter dd a#f15,

dl#faciliteter dd a#f17, dl#faciliteter dd a#f2, dl#faciliteter dd a#f7 {
    display: block;
    background-color: white;
    opacity: 0.4;
    filter: alpha(opacity=40);
    position: absolute;
    padding: 0 0.2em;
}

a#f13 { /* fodboldbanen */
    top: 80px;
    left: 250px;
}

a#f16 { /* gymnastiksalen */
    top: 225px;
    left: 320px;
}

a#f14 { /* hallen */
    top: 260px;
    left: 300px;
}

a#f9 { /* kunstgræs */
    top: 130px;
    left: 30px;
}

a#f23 { /* beachvolley */
    top: 65px;
    left: 30px;
}

a#f24 { /* streetbasket */
    top: 200px;
    left: 60px;
}

a#f11 { /* swimmingpool */
    top: 250px;
    left: 200px;
}

a#f17 { /* td-rum */
    top: 275px;
    left: 250px;
}

a#f15 { /* træningssalen */
    top: 290px;
    left: 250px;
}


a#f2 { /* globen */
    top: 230px;
    left: 150px;
}

a#f7 { /* spissalen */
    top: 180px;
    left: 340px;
}

a#f20 { /* skoven */
    top: 310px;
    left: 20px;
}

/* undervisere */

dl#undervisere dt {
    width: 150px;
    float: left;
    text-align: center;
}

dl#underviser dt img {
    margin-bottom: 0;
}


/* kursusoversigter */

#kursusoversigt th {
    border-bottom: 1px solid black;
}

#kursusoversigt tr.aar {
    font-weight: bold;
}
#kursusoversigt tr.aar td {
    border-bottom: 1px solid #ccc;
}
.clear {
    clear:both;
}

blockquote {
    background:url(http://www.mandarindesign.com/images/quote.gif)

no-repeat;
    background-position:top left;
    padding-left:20px;
    text-align:justify;
}

blockquote p {
    background: url(http://www.mandarindesign.com/images/unquote.gif)

no-repeat;
    background-position:bottom right;
    padding-right:5px;
}

/* http://www.cssplay.co.uk/menu/gallery3l.html */
#galleryh {
  padding:0;
  margin:0 auto 5em auto;
  list-style-type:none;
  overflow:hidden;
  width:600px;
  height:300px;
  border:1px solid #888;
  background:#fff

url(/file.php?id=326&type=medium&name=/130713698_bd9d24fc06_o.jpg) no-repeat

right;
  }
#galleryh li {
  float:left;
  }
#galleryh li a {
  display:block;
  height:300px;
  width:30px;
  float:left;
  text-decoration:none;
  border-right:1px solid #fff;
  cursor:default;
  }
#galleryh li a img {
  width:30px;
  height:300px;
  border:0;
  padding: 0;
  margin: 0;
  }
#galleryh li a:hover {
  background:#eee;
  width:400px;
  }
#galleryh li a:hover img {
  width:400px;
  }

#content-main .yui-sldshw-displayer img {
    border: none;
    padding: 0;
}

.feature-link {
    text-align: left;
}

#navigation-toplevel {
    padding: 0;
    margin-left: <?php echo $margin['default']; ?>;
    margin-right: <?php echo $margin['default']; ?>;

}
#navigation-toplevel li {
    list-style-type: none;
    padding: 0;
    margin-left: 0;
    margin-bottom: 1em;
}

.feature-link a, #navigation-toplevel a {
    display: block;
    border: 2px solid white;
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-mur.jpg) no-repeat top;
    color: white;
    padding-top: 55px;
    padding-bottom: 5px;
    text-align: center;
    color: white;
    font-family: verdana, sans-serif;
    font-size: 0.9em;
    font-weight: bold;
    width: 175px;
    text-decoration: none;
}

.feature-link a:hover, #navigation-toplevel a:hover {
    border: 2px solid <?php echo $color['navigation_main']; ?>;
    text-decoration: underline;
}

.feature-link a.baenk {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-baenk.jpg) no-repeat top;

}

.feature-link a.mur {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-mur.jpg) no-repeat top;

}

.feature-link a.rundvisning {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-rundvisning.jpg) no-repeat top;

}

.feature-link a.haender {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-haender.jpg) no-repeat top;

}
.feature-link a.dreng {
    background: <?php echo $color['container']; ?> url(/gfx/images/knapper/knap-dreng.jpg) no-repeat top;

}

.questions {
    padding: 0;
    margin: 0;
}

.questions li {
    list-style-type: none;
    padding: 0;
    margin 0;
    display: inline;
}

#frontpage ul.questions li a {
    display: block;
    width: 250px;
    background-color: black;
    font-size: 1.4em;
    background-color: black;
    color: white;
    margin: 0 1em 1em 0em;
    float: left;
    text-align: center;
    padding-bottom: 175px;
    padding-top: 5px;
    background-repeat: no-repeat;
    border: 3px solid white;
    background-position: bottom;
}

#frontpage ul.questions li a:hover {
    border: 3px solid #D61031;
}

#frontpage ul.questions li a.when {
    background-image: url(/gfx/images/forside/thinking-closeup.jpg);
}
#frontpage ul.questions li a.what {
    background-image: url(/gfx/images/forside/colorful-balls.jpg);
}

#fag div.description {
    padding-left: 115px;
    background-repeat: no-repeat;
    min-height: 115px;
}

#fag h3 {
    font-size: 1.2em;
    margin: 0;
    padding: 0;
}
#fag p {
    margin: 0;
    padding: 0;
    margin-bottom: 1em;
}

#fag div.fitnessogsundhed {
    background-image: url(/gfx/images/fag/fitnessogsundhed.jpg);
}
#fag div.musiklinje {
    background-image: url(/gfx/images/fag/musiklinje.jpg);
}
#fag div.politilinje {
    background-image: url(/gfx/images/fag/politilinje.jpg);
}
#fag div.rejselinje {
    background-image: url(/gfx/images/fag/rejselinje.jpg);
}
#fag div.fodboldakademi {
    background-image: url(/gfx/images/fag/fodboldakademi.jpg);
}
#fag div.underviser {
    background-image: url(/gfx/images/fag/underviser.jpg);
}
#fag div.adventure {
    background-image: url(/gfx/images/fag/adventure.jpg);
}
#fag div.fodbold {
    background-image: url(/gfx/images/fag/soccer.jpg);
}
#fag div.haandbold {
    background-image: url(/gfx/images/fag/haandbold.jpg);
}
#fag div.badminton {
    background-image: url(/gfx/images/fag/badminton.jpg);
}
#fag div.volleyball {
    background-image: url(/gfx/images/fag/volleyball.jpg);
}
#fag div.fitness {
    background-image: url(/gfx/images/fag/fitness.jpg);
}
#fag div.aerobic {
    background-image: url(/gfx/images/fag/aerobic.jpg);
}
#fag div.skitur {
    background-image: url(/gfx/images/fag/skitur.jpg);
}
#fag div.adventurerejse {
    background-image: url(/gfx/images/fag/adventuretur.jpg);
}
